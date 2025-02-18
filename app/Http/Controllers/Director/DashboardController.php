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
        

        return view('director.dashboard', compact('user', 'userOrganization', 'profiles'));   
    }
}