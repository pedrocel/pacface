<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\OrganizationModel;
use App\Models\PerfilModel;
use App\Models\StudentResponsible;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
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
        
        return view('director.students.index', compact('user', 'userOrganization', 'profiles'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('director.students.create', compact('user'));
    }



    public function store(Request $request)
    {
        $user = Auth::user();

        $organization = UserOrganizationModel::where('user_id', $user->id)->first();

        $student = User::create([
            'name' => $request->student_name,
            'email' => $request->student_email,
            'password' => bcrypt(123456789),
            'whatsapp' => $request->student_whatsapp,
            'cpf' => $request->cpf,
            'birthdate' => $request->student_birthdate,
            // 'cep' => $request->student_cep,
            // 'address' => $request->student_address,
            // 'city' => $request->student_city,
            // 'state' => $request->student_state,
            // 'number' => $request->student_number,
            'is_emancipated' => $request->emancipated == 'yes' ? true : false,
        ]);

        $student->perfis()->attach(7, ['is_atual' => true, 'status' => 1]);

        $student->organizations()->attach($organization->organization->id);

        $responsible = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make(123456789),
            'whatsapp'       => $request->whatsapp,
        ]);

        $responsible->organizations()->attach($organization->organization->id);

        $responsible->perfis()->attach(6, ['is_atual' => true, 'status' => 1]);

        StudentResponsible::create([
            'id_student' => $student->id,
            'id_responsible' => $responsible->id,
            'responsible_type_id' => 1,
            'status' => true,
        ]);
       
        return redirect()->route('director.students.index')->with('success', 'Aluno adicionado com sucesso!');
    }

}