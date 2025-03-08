<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\UserFaceModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Image\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $organizacao = UserOrganizationModel::where('user_id', Auth::user()->id)->with('organization')->first();
        $org = UserOrganizationModel::where('user_id', Auth::user()->id)->with('organization')->first();
        $user = Auth::user();
        return view('student.profile.index', compact('user', 'organizacao', 'org'));
    }

    public function updateImage(Request $request){

        // Obtém o usuário autenticado
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        // Atualiza os dados do usuário
        $user->facial_image_base64 = $request['facial_image_base64'];
        $user->status = 2; 

        //Status 1 = Pendente de envio
        //Status 2 = Enviado para análise.
        //Status 3 = Biometria facial recusada.
        //Status 4 = Biometria facial verificada.
        $user->save();

        $this->createUserFace($user, $request);

        return redirect()->route('student.profile.index')->with('success', 'Imagem enviada para análise!');
    }

    private function createUserFace($user, $request)
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $link_image = $this->storeImageFromBase64($request['facial_image_base64']);

        UserFaceModel::create([
            'user_id' => Auth::user()->id,
            'facial_image_base64' => $request['facial_image_base64'],
            'status' => 1,
            'organization_id' => $org->organization->id,
            'name' => $user->name,
            'access_group_id' => $request['access_group_id'],
            'link_image' => $link_image
        ]);
    }

    private function storeImageFromBase64($base64Image)
{
    // Decodifica a imagem
    $content = 'Este é um arquivo de teste para verificar o armazenamento';
    $fileName = 'test-file.txt';

    // Armazena o arquivo na pasta public
    Storage::disk('public')->put($fileName, $content);

    // Verifica se o arquivo foi salvo
    if (Storage::disk('public')->exists($fileName)) {
        dd('Arquivo foi salvo com sucesso!');
    } else {
        dd('Erro ao salvar o arquivo!');
    }

    return true;
}
}
