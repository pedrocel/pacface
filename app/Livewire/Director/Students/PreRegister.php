<?php

namespace App\Livewire\Director\Students;

use App\Models\StudentInputsModel;
use App\Models\UserOrganizationModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PreRegister extends Component
{
    use WithPagination;

    public $cpf;
    public $user;
    public $org;

    protected $rules = [
        'cpf' => 'required|string|size:14',
    ];

    protected $messages = [
        'cpf.required' => 'O CPF é obrigatório.',
        'cpf.size' => 'O CPF deve ter 14 caracteres (formato: XXX.XXX.XXX-XX).',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->org = UserOrganizationModel::where('user_id', $this->user->id)->first();
    }

    public function save()
    {
        $this->validate();

        // Remove pontos e traços antes da validação
        $cpfLimpo = preg_replace('/\D/', '', $this->cpf);

        // Verifica se o CPF já existe no banco
        if (StudentInputsModel::where('cpf', $cpfLimpo)->exists()) {
            $this->addError('cpf', 'Este CPF já está cadastrado.');
            return;
        }

        StudentInputsModel::create([
            'cpf' => $cpfLimpo,
            'password' => bcrypt($cpfLimpo), // Senha usando CPF sem pontuação (agora criptografado)
            'status' => 1,
            'organization_id' => $this->org->organization_id,
            'user_id' => $this->user->id
        ]);

        session()->flash('success', 'CPF registrado com sucesso!');

        // Limpa o campo após o cadastro
        $this->reset('cpf');
    }

    public function render()
    {
        $students = StudentInputsModel::orderBy('id', 'desc')->paginate(7);
        return view('livewire.director.students.pre-register', compact('students'));
    }
}
