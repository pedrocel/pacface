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
                    <button onclick="openModal('vinculeStudent')" class="bg-[#00875A] hover:bg-emerald-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-all hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg>
                        <span class="hidden sm:inline">Vincular alunos</span>
                    </button>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if ($student->status == 1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pendente de Envio
                                    </span>
                                @elseif ($student->status == 4)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Enviado para Análise
                                    </span>
                                @elseif ($student->status == 3)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Biometria Facial Recusada
                                    </span>
                                @elseif ($student->status == 2)
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
                <button onclick="openModal('newClassRoom')" class="bg-[#00875A] hover:bg-emerald-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-all hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg>
                        <span class="hidden sm:inline"> Adicionar Aula</span>
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
                                    <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 2)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 3)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 4)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 5)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 border-b">
                            @if(\Carbon\Carbon::parse($aula->date)->dayOfWeek === 6)
                                <div class="bg-blue-100 rounded p-2 text-sm">
                                <a href="{{ route('director.room.show', $aula->id_room) }}" class="font-medium text-blue-800">{{ $aula->discipline->name}} - {{ $aula->room->name}}</p>
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



    <div id="vinculeStudent" class="fixed inset-0 bg-black bg-opacity-30 modal-backdrop hidden z-50 flex items-center justify-center">
        <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Criar Nova Turma</h2>
                <button onclick="closeModal('vinculeStudent')" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x 2="18" y1="6" y2="18"></line></svg>
                </button>
            </div>

            <div class="p-6">
            <form  action="{{ route('director.class.linkStudent') }}" method="POST" class="space-y-6">
                @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="hidden" name="id_class" value="{{ $class->id }}">

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Selecionar Aluno</label>
                            <select id="student_id" name="id_user" class="form-control select2" required>
                                <option value="">Selecione um aluno...</option>
                                @foreach ($studentsAvailables as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="status-radio active">
                                    <input type="radio" name="status" value="1" class="peer" checked onchange="updateStatusStyle(this)">
                                    <div class="radio-content flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-emerald-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                        <span class="font-medium">Ativo</span>
                                    </div>
                                </label>
                                <label class="status-radio inactive">
                                    <input type="radio" name="status" value="0" class="peer" onchange="updateStatusStyle(this)">
                                    <div class="radio-content flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-red-600"><circle cx="12" cy="12" r="10"></circle><line x1="15" x2="9" y1="9" y2="15"></line><line x1="9" x2="15" y1="9" y2="15"></line></svg>
                                        <span class="font-medium">Inativo</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeModal('vinculeStudent')" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            Criar Turma
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
       
    <div id="newClassRoom" class="fixed inset-0 bg-black bg-opacity-30 modal-backdrop hidden z-50 flex items-center justify-center">
        <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Adicionar aula</h2>
                <button onclick="closeModal('newClassRoom')" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x 2="18" y1="6" y2="18"></line></svg>
                </button>
            </div>
            <div class="p-6">
                <form id="classRoomForm" action="{{ route('director.class-room.store', $class->id) }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="id_room" class="block text-sm font-medium text-gray-700">Sala</label>
                        <select id="id_room" name="id_room" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                            <option value="">Selecione a sala</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }} {{ $room->ip_device }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Professor -->
                    <div class="mb-4">
                        <label for="id_teacher" class="block text-sm font-medium text-gray-700">Professor</label>
                        <select id="id_teacher" name="id_teacher" class="form-control mt-1 p-2 border rounded-lg w-full" required>
                            <option value="">Selecione o professor</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeModal('newClassRoom')" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            Adicionar Aula
                        </button>
                    </div>
                </form>
            </div>
    </div>

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


<div id="newClassRoom" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <button onclick="closeModal('newClassRoom')" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">
            &times;
        </button>

        
    </div>
</div>

@endsection
