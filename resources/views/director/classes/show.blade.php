@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Turma: {{ $class->name }}</h1>
            <p class="text-gray-600">Código: {{ $class->id }} • Período: 2025</p>
        </div>
        </div>
   
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8">
                <button 
                    onclick="switchTab('students')"
                    data-tab-button="students"
                    class="border-b-2 border-blue-500 text-blue-600 py-4 px-1 font-medium">
                    Alunos
                </button>
                <!-- <button 
                    onclick="switchTab('teachers')"
                    data-tab-button="teachers"
                    class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 py-4 px-1 font-medium">
                    Professores
                </button> -->
                <button 
                    onclick="switchTab('attendance')"
                    data-tab-button="attendance"
                    class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 py-4 px-1 font-medium">
                    Frequência
                </button>
                <button 
                    onclick="switchTab('schedule')"
                    data-tab-button="schedule"
                    class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 py-4 px-1 font-medium">
                    Horários
                </button>
            </nav>
        </div>

        <div data-tab-content="students" class="py-6">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-4">
                    <h2 class="text-xl font-semibold">Lista de Alunos</h2>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"> {{ count($students) }}</span>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('director.students.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Adicionar Aluno
                    </a>
                </div>
            </div>

            <!-- Students Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if ($student->user->status == 1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pendente de Envio
                                    </span>
                                @elseif ($student->user->status == 2)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Enviado para Análise
                                    </span>
                                @elseif ($student->user->status == 3)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Biometria Facial Recusada
                                    </span>
                                @elseif ($student->user->status == 4)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Biometria Facial Verificada
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Status Desconhecido
                                    </span>
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-800">Editar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Teachers Tab -->
        <!-- <div data-tab-content="teachers" class="py-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-4">
                    <h2 class="text-xl font-semibold">Professores da Turma</h2>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">2 professores</span>
                </div>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Adicionar Professor
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                             alt="Professor" 
                             class="h-16 w-16 rounded-full">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Dr. Carlos Santos</h3>
                            <p class="text-gray-600">Professor Titular</p>
                            <p class="text-sm text-gray-500">carlos.santos@email.com</p>
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                            Editar
                        </button>
                        <button class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Attendance Tab -->
        <div data-tab-content="attendance" class="py-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Controle de Frequência</h2>
                <div class="flex space-x-3">
                    <input type="date" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Registrar Frequência
                    </button>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aluno</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Presenças</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faltas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequência</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">João Silva</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">88.2%</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Regular
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Schedule Tab -->
        <div data-tab-content="schedule" class="py-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Horários das Aulas</h2>
                <div class="modal-header">
                <button onclick="openModalAula()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                + Cadastrar  aula
                </button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Aula</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Segunda</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Terça</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Quarta</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Quinta</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Sexta</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-500 border-b">Sábado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                    <tr class="bg-white hover:bg-gray-50">
                        <!-- Coluna Aula -->
                        <td class="px-4 py-3 text-sm font-medium text-gray-900 border-b">
                            Aula {{ $aula->aula_number }}: {{ $aula->start_time }} - {{ $aula->end_time }}
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 1)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 2)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 3)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 4)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 5)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 6)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                    <p class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>




    <!-- Modal -->



       
    <script>
        function switchTab(tabId) {
            // Hide all tabs
            document.querySelectorAll('[data-tab-content]').forEach(tab => {
                tab.classList.add('hidden');
            });
            // Show selected tab
            document.querySelector(`[data-tab-content="${tabId}"]`).classList.remove('hidden');
            // Update active tab styling
            document.querySelectorAll('[data-tab-button]').forEach(button => {
                button.classList.remove('border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            document.querySelector(`[data-tab-button="${tabId}"]`).classList.add('border-blue-500', 'text-blue-600');
            document.querySelector(`[data-tab-button="${tabId}"]`).classList.remove('border-transparent', 'text-gray-500');
        }
    </script>

<script>
    function openModalAula() {
        document.getElementById('modalAula').classList.remove('hidden');
        document.getElementById('modalAula').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('modalAula').classList.add('hidden');
        document.getElementById('modalAula').classList.remove('flex');
    }

    document.addEventListener('click', function(event) {
        const modal = document.getElementById('modalAula');
        if (event.target === modal) {
            closeModal();
        }
    });
</script>
<div id="modalAula" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">
            &times;
        </button>

        <h2 class="text-xl font-semibold mb-4">Cadastrar Aula</h2>

        <!-- Formulário de Cadastro -->
        <form id="classRoomForm" action="{{ route('director.class-room.store', $class->id) }}" method="POST">
            @csrf

            <!-- Sala -->
            <div class="mb-4">
                <label for="id_room" class="block text-sm font-medium text-gray-700">Sala</label>
                <select id="id_room" name="id_room" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                    <option value="">Selecione a sala</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Professor -->
            <div class="mb-4">
                <label for="id_teacher" class="block text-sm font-medium text-gray-700">Professor</label>
                <select id="id_teacher" name="id_teacher" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                    <option value="">Selecione o professor</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->user->id }}">{{ $teacher->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Disciplina -->
            <div class="mb-4">
                <label for="id_discipline" class="block text-sm font-medium text-gray-700">Disciplina</label>
                <select id="id_discipline" name="id_discipline" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                    <option value="">Selecione a disciplina</option>
                    @foreach ($disciplines as $discipline)
                        <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Data</label>
                <input type="date" class="form-control mt-1 p-2 border rounded-lg w-full" id="date" name="date" required>
            </div>

            <!-- Número da Aula -->
            <div class="mb-4">
                <label for="aula_number" class="block text-sm font-medium text-gray-700">Número da Aula</label>
                <select id="aula_number" name="aula_number" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                    <option value="">Selecione o número da aula</option>
                    <option value="1">Aula 01: 07:00 às 07:50</option>
                    <option value="2">Aula 02: 07:50 às 08:40</option>
                    <option value="3">Aula 03: 08:40 às 09:30</option>
                    <option value="4">Aula 04: 09:50 às 10:40</option>
                    <option value="5">Aula 05: 10:40 às 11:30</option>
                    <option value="6">Aula 06: 11:30 às 12:20</option>
                </select>
            </div>

            <!-- Botões -->
            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Cancelar</button>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar Aula</button>
            </div>
        </form>
    </div>
</div>

@endsection
