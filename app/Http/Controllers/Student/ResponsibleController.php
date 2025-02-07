<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentResponsible;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResponsibleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $responsibles = StudentResponsible::where('id_student', Auth::id())
            ->with('responsible:id,name,email,facial_image_base64') // Carrega apenas os campos necessários
            ->get();

        return view('student.responsible.index', compact('responsibles', 'user'));
    }

    public function store(Request $request)
    {
        // Criação do responsável
        $responsible = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Relacionamento com o perfil de responsável
        $responsible->perfis()->attach(6, ['is_atual' => true, 'status' => 1]);
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $organization = $user->organizations()->first();
        $responsible->organizations()->attach($organization->id);

        // Relacionamento com o usuário
        StudentResponsible::create([
            'id_student' => Auth::user()->id,
            'id_responsible' => $responsible->id,
            'responsible_type_id' => $request->responsible_type_id,
            'status' => true,
        ]);

        return redirect()->route('student.responsible.index')->with('success', 'Responsável adicionado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $responsible = User::findOrFail($id);

        $responsible->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $responsible->password,
        ]);

        // Atualiza o tipo de responsável
        $studentResponsible = StudentResponsible::where('id_responsible', $id)->first();
        if ($studentResponsible) {
            $studentResponsible->update([
                'responsible_type_id' => $request->responsible_type_id,
            ]);
        }

        return redirect()->route('student.responsible.index')->with('success', 'Responsável atualizado com sucesso!');
}


}
