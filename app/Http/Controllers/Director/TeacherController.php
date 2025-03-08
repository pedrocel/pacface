<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $teachers = UserOrganizationModel::where('organization_id', $org->organization_id)->get();perPage: 

        return view('director.teachers.index', data: compact('teachers', 'org'));
    }

    public function create()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.teachers.create');
    }

    public function store(Request $request){
        
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->cpf),
            'whatsapp'       => $request->whatsapp,
            'cpf'            => $request->cpf,
            'birthdate'     => $request->birthdate,
            'is_emancipated' => false, // Retorna true se o checkbox estiver marcado
        ]);

        $user->perfis()->attach(5, ['is_atual' => true, 'status' => 1]);

        $user->save();

        UserOrganizationModel::create([
            'user_id' => $user->id,
            'organization_id' => $org->organization_id, 
            'status' => 1
        ]);

        return redirect()->route('director.teacher.index');
    }
}
