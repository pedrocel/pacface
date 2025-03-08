<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\UserFaceModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    $image = base64_decode($base64Image);

    // Gera um nome único para a imagem
    $imageName = Str::random(10) . '.jpg';

    // Caminho onde a imagem será salva
    $path = public_path('storage/images/' . $imageName);

    // Cria a imagem no diretório e faz a manipulação
    $img = Image::make($image)
                ->resize(500, 500)  // Redimensiona para 500x500px
                ->encode('jpg', 75); // Ajusta a qualidade da imagem para reduzir o tamanho

    // Salva a imagem
    $img->save($path);

    // Verifica o tamanho da imagem e ajusta se necessário
    if (filesize($path) > 200000) {
        // Reduz a qualidade da imagem para abaixo de 200KB
        $img->encode('jpg', 70);
        $img->save($path);
    }

    // O link público da imagem será armazenado
    $imageLink = Storage::url('images/' . $imageName);

    // Agora, você pode salvar esse link no banco de dados, por exemplo:
    $user = Auth::user() ; // Ou qualquer outro modelo de usuário
    $user->link_image = $imageLink;
    $user->save();

    return $imageLink;
}
}
