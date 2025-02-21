@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Alunos</h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Buscar aluno..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <button onclick="openModal()" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Adicionar Aluno
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white p-4 rounded-lg shadow-sm mb-6 flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">Filtrar por:</span>
                    <select class="border border-gray-300 rounded-md px-3 py-1.5">
                        <option>Todas as Turmas</option>
                        <option>1º Ano A</option>
                        <option>1º Ano B</option>
                        <option>2º Ano A</option>
                    </select>
                    <select class="border border-gray-300 rounded-md px-3 py-1.5">
                        <option>Status Biometria</option>
                        <option>Cadastrada</option>
                        <option>Pendente</option>
                    </select>
                    <select class="border border-gray-300 rounded-md px-3 py-1.5">
                        <option>Status Matrícula</option>
                        <option>Ativo</option>
                        <option>Inativo</option>
                    </select>
                </div>

                <!-- Students Table -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aluno</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Turma</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Biometria</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Última Entrada</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($userOrganization as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <img class="h-10 w-10 rounded-full" src="data:image/jpeg;base64,{{ $student->user->facial_image_base64 }}" alt="Foto do usuário">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $student->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $student->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1º Ano A</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Cadastrada
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hoje, 08:15</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-green-600 hover:text-green-900 mr-3">Editar</button>
                                        <button class="text-red-600 hover:text-red-900">Remover</button>
                                    </td>
                                </tr>
                                @empty
                                <p class="text-gray-700 text-center col-span-full">Nenhum aluno encontrado.</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Anterior
                                </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Próximo
                                </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">97</span> resultados
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Anterior</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            1
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            2
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            3
                                        </a>
                                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-50 text-sm font-medium text-gray-700">
                                            ...
                                        </span>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            10
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Próximo</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

  <!-- modals -->
  <div id="createResponsibleModal" class="z-50 fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 id="modalTitle" class="text-xl font-semibold mb-4">Cadastrar Aluno</h2>

            <form id="responsibleForm" action="{{ route('student.responsible.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="id" id="responsibleId">

                <!-- Etapa 1: Dados do Aluno -->
                <div id="step1">
                    <div class="mb-4">
                        <label for="student_name" class="block text-sm font-medium text-gray-700">Nome do Aluno</label>
                        <input type="text" name="student_name" id="student_name" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="student_email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" name="student_email" id="student_email" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="student_password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input type="password" name="student_password" id="student_password" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="student_whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                        <input type="text" name="student_whatsapp" id="student_whatsapp" required class="mt-1 p-2 border rounded-lg w-full" placeholder="(99) 99999-9999">
                    </div>

                    <div class="mb-4">
                        <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                        <input type="text" name="cpf" id="cpf" required class="mt-1 p-2 border rounded-lg w-full" >
                    </div>

                    <div class="mb-4">
                    <label for="student_birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                    <input type="date" name="student_birthdate" id="student_birthdate" required class="mt-1 p-2 border rounded-lg w-full">
                </div>

                    <div class="mb-4">
                        <label for="student_cep" class="block text-sm font-medium text-gray-700">CEP</label>
                        <input type="text" name="student_cep" id="student_cep" required class="mt-1 p-2 border rounded-lg w-full" placeholder="00000-000" onblur="fetchAddress('student')">
                    </div>
                    
                    <div class="mb-4">
                        <label for="student_address" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" name="student_address" id="student_address" required class="mt-1 p-2 border rounded-lg w-full" placeholder="Logradouro">
                    </div>

                    <div class="flex mb-4">
        <div class="mr-4 w-1/3">
            <label for="student_city" class="block text-sm font-medium text-gray-700">Cidade</label>
            <input type="text" name="student_city" id="student_city" required class="mt-1 p-2 border rounded-lg w-full">
        </div>
        <div class="mr-4 w-1/3">
            <label for="student_state" class="block text-sm font-medium text-gray-700">Estado</label>
            <input type="text" name="student_state" id="student_state" required class="mt-1 p-2 border rounded-lg w-full">
        </div>
        <div class="w-1/3">
            <label for="student_number" class="block text-sm font-medium text-gray-700">Número</label>
            <input type="text" name="student_number" id="student_number" required class="mt-1 p-2 border rounded-lg w-full">
        </div>
    </div>


                    <div class="flex items-center">
                        <label class="mr-2">Emancipado:</label>
                        <label class="flex items-center mr-4">
                            <input type="radio" name="emancipated" id="emancipated" value="yes" class="mr-2"> Sim
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="emancipated" id="emancipated_no" value="no" class="mr-2" checked> Não
                        </label>
                    </div>

                    <div>
                        <button type="button" onclick="nextStep()" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Próximo</button>
                    </div>
                    
                </div>

                <br>
                <!-- Seção de Emancipado e Botões -->
                <div class="mb-4  justify-between items-center ">
        
        
                <!-- Etapa 2: Dados do Responsável -->
                <div id="step2" class="hidden ">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome do Responsável</label>
                        <input type="text" name="name" id="name" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" name="email" id="email" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" required class="mt-1 p-2 border rounded-lg w-full" placeholder="(99) 99999-9999">
                    </div>

                    <div class="mb-4">
                        <label for="responsible_cep" class="block text-sm font-medium text-gray-700">CEP</label>
                        <input type="text" name="responsible_cep" id="responsible_cep" required class="mt-1 p-2 border rounded-lg w-full" placeholder="00000-000" onblur="fetchAddress('responsible')">
                    </div>
                    
                    <div class="mb-4">
                        <label for="responsible_address" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" name="responsible_address" id="responsible_address" required class="mt-1 p-2 border rounded-lg w-full" placeholder="Logradouro">
                    </div>

                    <div class="mb-4">
                        <label for="responsible_city" class="block text-sm font-medium text-gray-700">Cidade</label>
                        <input type="text" name="responsible_city" id="responsible_city" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>

                    <div class="mb-4">
                        <label for="responsible_state" class="block text-sm font-medium text-gray-700">Estado</label>
                        <input type="text" name="responsible_state" id="responsible_state" required class="mt-1 p-2 border rounded-lg w-full">
                    </div>
                    
                    <div class="flex justify-between">
                        <button type="button" onclick="prevStep()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Voltar</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
</div>

  <!-- scripts -->

  <script>
    function openModal(isEdit = false, responsible = null) {
        const modal = document.getElementById('createResponsibleModal');
        const form = document.getElementById('responsibleForm');
        const modalTitle = document.getElementById('modalTitle');
        const formMethod = document.getElementById('formMethod');

        if (isEdit && responsible) {
            modalTitle.textContent = "Editar Aluno";
            form.action = `/student/responsible/${responsible.id}`;
            formMethod.value = "PUT";

            document.getElementById('responsibleId').value = responsible.id;
            document.getElementById('name').value = responsible.name;
            document.getElementById('email').value = responsible.email;
            document.getElementById('responsible_type_id').value = responsible.responsible_type_id;
            document.getElementById('whatsapp').value = responsible.whatsapp;
            document.getElementById('cpf').value = responsible.cpf;
            document.getElementById('birthdate').value = responsible.birthdate;
        } else {
            modalTitle.textContent = "Cadastrar Aluno";
            form.action = "{{ route('director.students.store') }}";
            formMethod.value = "POST";

            form.reset();
            document.getElementById('responsibleId').value = '';
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>


<script>
    document.getElementById('profileButton').addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
    
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>

<script>
    function nextStep() {
        const emancipated = document.getElementById('emancipated').checked;

        if (emancipated) {
            // Se o aluno for emancipado, envia o formulário diretamente
            document.getElementById("responsibleForm").submit();
        } else {
            // Caso contrário, avança para a etapa do responsável
            document.getElementById("step1").classList.add("hidden");
            document.getElementById("step2").classList.remove("hidden");
        }
    }

    function prevStep() {
        document.getElementById("step2").classList.add("hidden");
        document.getElementById("step1").classList.remove("hidden");
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
@endsection




