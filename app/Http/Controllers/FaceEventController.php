<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaceEvent;
use App\Models\FrequencyInputEventModel;
use App\Models\RoomModel;
use App\Models\User;
use App\Models\UserFaceModel;
use App\Models\UserFacial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FaceEventController extends Controller
{
    public function createFrequency(Request $request){
        
        FrequencyInputEventModel::create([
            'ip' => $request->ip,
            'personId' => $request->personID,
            'date' => $request->date,
        ]);

        try {
            $client = new Client();
            $user = User::where('id', $request->personID)->first();
            $sala = RoomModel::where('ip_device',  $request->ip)->first();

            // Configurações da API do ChatPro
            $instanceId = 'chatpro-1aors879o7';
            $token = '66rvryi9wasim03a63ljr8cmyloby8';
            $url = "https://v5.chatpro.com.br/{$instanceId}/api/v1/send_message";

            // Faz a requisição para a API do ChatPro
            $response = $client->request('POST', $url, [
                'json' => [
                    'number' => '5582988291668', // Número do usuário no formato internacional
                    'message' => 'O Aluno '. $user->name.' foi identificado na: '.$sala->name. '. Data do registro: '. $request->date, // Mensagem da notificação
                ],
                'headers' => [
                    'Authorization' => $token, // Adiciona o prefixo Bearer
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);
        } catch (RequestException $e) {
            // Captura erros de requisição
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $errorMessage = "Erro ao enviar WhatsApp para  " . $response->getStatusCode() . " - " . $response->getBody();
            } else {
                $errorMessage = "Erro ao enviar WhatsApp para  " . $e->getMessage();
            }
           
        }

        return response()->json(['message' => 'Face event created successfully'], 201);
    }

    public function handleWebhook(Request $request)
    {
        FaceEvent::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'event' => $request->input('event'),
            'timestamp' => $request->input('timestamp'),
            'user_id' => $request->input('user_id'),
            'external_id' => $request->input('external_id'),
            'organization_id' => $request->input('organization_id'),
            'group_id' => $request->input('group_id'),
            'data' => $request->input('data')
        ]);

        return response()->json(['message' => 'Face event created successfully'], 201);
    }

    public function getUsers(){
        return response()->json(UserFaceModel::all());
    }

    public function getUsersFromId($id)
    {
        $users = UserFaceModel::where('organization_id', $id)
            ->select('name','user_id', 'status', 'organization_id', 'link_image', 'ip_device')
            ->get();

        return response()->json($users);
    }


    public function createFaltas(Request $request)
    {
        // Obtém o horário atual
        $today = Carbon::today();
        
        // Busca todos os usuários
        $users = User::all();

        // Loop para verificar os usuários
        foreach ($users as $user) {
            // Verifica se o usuário já tem um registro no dia de hoje na FaceEvent
            $hasRecordToday = FaceEvent::where('user_id', $user->id)
                ->whereDate('timestamp', $today)
                ->exists();

            // Se não tiver registro, cria um novo com evento 'falta'
            if (!$hasRecordToday) {
                FaceEvent::create([
                    'id' => (string) Str::uuid(), // Gera um UUID
                    'name' => $user->name, // Nome do usuário
                    'event' => 'falta', // Define o evento como 'falta'
                    'timestamp' => now(), // Horário atual
                    'user_id' => $user->id, // ID do usuário
                    'external_id' => null, // External ID pode ser null
                    'organization_id' => $user->organization_id, // Supondo que você tenha essa relação
                    'group_id' => $user->group_id, // ID do grupo
                    'data' => json_encode(['info' => 'Falta registrada no sistema por:']), // Dados extras
                ]);
            }
        }

        return response()->json(['message' => 'Faltas registradas para usuários ausentes no dia de hoje.'], 200);
    }
}