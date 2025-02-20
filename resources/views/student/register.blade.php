<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-gray-100 rounded-t-lg py-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">{{$organization->name}} </h2>
                    <h2 class="text-xl font-semibold text-gray-800">{{ __('Cadastro de Aluno') }}</h2>
                </div>

                <div class="card-body p-6 bg-white rounded-b-lg">
                    <form id="responsibleForm" action="{{ route('pre-register-student.register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="id_organization" id="id_organization" value="{{ $organization->id }}">
                        <input type="hidden" name="cpf" id="cpf" value="{{ $student->cpf }}">

                        <div id="step1">
                            <div class="space-y-4">
                                <!-- Nome do Aluno -->
                                <div class="mb-4">
                                    <label for="student_name" class="block text-sm font-medium text-gray-700">Nome do Aluno</label>
                                    <input type="text" name="student_name" id="student_name" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- E-mail -->
                                <div class="mb-4">
                                    <label for="student_email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                    <input type="email" name="student_email" id="student_email" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Senha -->
                                <div class="mb-4">
                                    <label for="student_password" class="block text-sm font-medium text-gray-700">Senha</label>
                                    <input type="password" name="student_password" id="student_password" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- WhatsApp -->
                                <div class="mb-4">
                                    <label for="student_whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                    <input type="text" name="student_whatsapp" id="student_whatsapp" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="(99) 99999-9999">
                                </div>

                                <!-- CPF -->
                                <div class="mb-4">
                                    <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                                    <input type="text" name="cpf" id="cpf" disabled value="{{ old('cpf', $student->cpf) }}" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Data de Nascimento -->
                                <div class="mb-4">
                                    <label for="student_birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                                    <input type="date" name="student_birthdate" id="student_birthdate" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- CEP -->
                                <div class="mb-4">
                                    <label for="student_cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                    <input type="text" name="student_cep" id="student_cep" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="00000-000" onblur="fetchAddress('student')">
                                </div>

                                <!-- Endereço -->
                                <div class="mb-4">
                                    <label for="student_address" class="block text-sm font-medium text-gray-700">Endereço</label>
                                    <input type="text" name="student_address" id="student_address" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Logradouro">
                                </div>

                                <!-- Cidade, Estado e Número -->
                                <div class="flex space-x-4 mb-4">
                                    <div class="w-1/3">
                                        <label for="student_city" class="block text-sm font-medium text-gray-700">Cidade</label>
                                        <input type="text" name="student_city" id="student_city" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="w-1/3">
                                        <label for="student_state" class="block text-sm font-medium text-gray-700">Estado</label>
                                        <input type="text" name="student_state" id="student_state" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="w-1/3">
                                        <label for="student_number" class="block text-sm font-medium text-gray-700">Número</label>
                                        <input type="text" name="student_number" id="student_number" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>

                                <!-- Turno -->
                                <div class="mb-4">
                                    <label for="turno" class="block text-sm font-medium text-gray-700">Turno</label>
                                    <select name="turno" id="turno" required class="mt-1 p-3 border rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="matutino">Matutino</option>
                                        <option value="vespertino">Vespertino</option>
                                    </select>
                                </div>

                                <!-- Emancipado -->
                                <div class="mb-6 flex items-center">
                                    <label class="mr-4">Emancipado:</label>
                                    <label class="flex items-center mr-4">
                                        <input type="radio" name="emancipated" id="emancipated" value="yes" class="mr-2"> Sim
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="emancipated" id="emancipated_no" value="no" class="mr-2" checked> Não
                                    </label>
                                </div>

                                <!-- Botão Próximo -->
                                <div class="text-center">
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-lg shadow-md transition duration-300">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    // Função para passar diretamente ao final
    function nextStep() {
        // Verifica se todos os campos estão preenchidos e submete o formulário diretamente
        const studentName = document.getElementById('student_name').value;
        const studentEmail = document.getElementById('student_email').value;
        const studentPassword = document.getElementById('student_password').value;
        const studentWhatsapp = document.getElementById('student_whatsapp').value;
        const cpf = document.getElementById('cpf').value;
        const studentBirthdate = document.getElementById('student_birthdate').value;
        const studentCep = document.getElementById('student_cep').value;
        const studentAddress = document.getElementById('student_address').value;
        const studentCity = document.getElementById('student_city').value;
        const studentState = document.getElementById('student_state').value;
        const studentNumber = document.getElementById('student_number').value;
        const turno = document.getElementById('turno').value;

        if (studentName && studentEmail && studentPassword && studentWhatsapp && cpf && studentBirthdate && studentCep && studentAddress && studentCity && studentState && studentNumber && turno) {
            document.getElementById("responsibleForm").submit();
        }
    }

    function fetchAddress(type) {
        const cep = document.getElementById(type + "_cep").value.replace(/\D/g, '');
        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById(type + "_address").value = data.logradouro;
                        document.getElementById(type + "_city").value = data.localidade;
                        document.getElementById(type + "_state").value = data.uf;
                    }
                });
        }
    }
</script>
