<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\FrequencyInputEventModel;
use App\Models\RoomModel;
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

        $link_image = $this->storeImageFromBase64($request->file('image_file'));

        UserFaceModel::create([
            'user_id' => Auth::user()->id,
            'facial_image_base64' => $request['facial_image_base64'],
            'status' => 1,
            'organization_id' => $org->organization->id,
            'name' => $user->name,
            'access_group_id' => RoomModel::first()->ip_device,
            'link_image' => $link_image
        ]);
    }

    private function storeImageFromBase64($file)
{
    // Gera um nome único para a imagem
    $imageName = Str::random(10) . '.' . $file->getClientOriginalExtension();

    // Caminho onde a imagem será salva no diretório storage/app/public/images
    $storagePath = storage_path('app/public/images');

    // Verifica se a pasta existe e cria, se não existir
    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0777, true);
    }

    // Move o arquivo para o local correto
    $file->move($storagePath, $imageName);

    // Link público da imagem (usando a URL configurada no filesystem)
    $publicPath = asset("storage/images/$imageName");

    return  $publicPath;
    
}
}
