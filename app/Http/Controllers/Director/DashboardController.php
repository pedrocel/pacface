<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\PerfilModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $profiles = PerfilModel::all();
        $userOrganization = UserOrganizationModel::where('organization_id', $org->organization_id)
        ->whereHas('user', function ($query) {
            // Filtro para obter apenas os usuários com perfilAtual igual a 7
            $query->whereHas('perfis', function ($subQuery) {
                $subQuery->where('is_atual', true)
                         ->where('perfil_id', 7); // Ajuste para o perfil desejado
            });
        })
        ->with('user')
        ->get();

        $biometrias = UserOrganizationModel::where('organization_id', $org->organization_id)
        ->whereHas('user', function ($query) {
            // Filtro para obter apenas os usuários com perfilAtual igual a 7
            $query->whereHas('perfis', function ($subQuery) {
                $subQuery->where('is_atual', true)
                        ->where('perfil_id', 7); // Ajuste para o perfil desejado
            })
            ->whereNotNull('facial_image_base64'); // Filtra usuários com facial_image_base64 diferente de null
        })
        ->with('user')
        ->get();

        // Calcula a porcentagem de usuários com biometria cadastrada
        $totalUsuarios = $userOrganization->count();
        $totalBiometria = $biometrias->count();
        
        $percentualBiometria = $totalUsuarios > 0 ? ($totalBiometria / $totalUsuarios) * 100 : 0;

        

        return view('director.dashboard', compact('user', 'userOrganization', 'profiles', 'org', 'biometrias', 'percentualBiometria'));   
    }
}