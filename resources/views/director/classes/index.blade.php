@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
    <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Módulo de Turmas</h1>
                    <button onclick="openModal('createClassModal')" class="bg-[#00875A] hover:bg-emerald-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-all hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg>
                        <span class="hidden sm:inline">Criar nova turma</span>
                    </button>
                </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Students -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Total de turmas</h3>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">2025</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ count($classes) }}</span>
                </div>
            </div>

            <!-- Face Recognition -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Turmas ativas</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">2025</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ count($classes) }}</span>
                </div>
            </div>

            <!-- Today's Attendance -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Total de alunos</h3>
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atual</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">1</span>
                </div>
            </div>
        </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        @foreach ($classes as $class)

        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $class->name }}</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            Ativo
                        </span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            <span>{{ $class->qtd_students }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <span>2025</span>
                        </div>
                    </div>
                    <div class="mt-6 flex space-x-3">
                        <a href="{{ route('director.class.show', $class->id) }}" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 text-center">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    </div>
<!-- Create Class Modal -->
<div id="createClassModal" class="fixed inset-0 bg-black bg-opacity-30 modal-backdrop hidden z-50 flex items-center justify-center">
        <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Criar Nova Turma</h2>
                <button onclick="closeModal('createClassModal')" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x 2="18" y1="6" y2="18"></line></svg>
                </button>
            </div>

            <div class="p-6">
            <form action="{{ route('director.class.store') }}" method="POST" class="space-y-6">
            @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Turma</label>
                            <input name="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                   placeholder="Ex: Primeiro Ano A">
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

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quantidade de Alunos</label>
                            <div class="relative">
                                <input type="number" name="qtd_students" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="Ex: 30">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Turno</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="shift-card rounded-lg cursor-pointer">
                                    <input type="radio" name="turn" value="1" class="hidden">
                                    <div class="shift-content p-3 rounded-lg border-2 flex flex-col items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-orange-500"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
                                        <span class="text-sm font-medium">Matutino</span>
                                    </div>
                                </label>
                                <label class="shift-card rounded-lg cursor-pointer">
                                    <input type="radio" name="turn" value="2" class="hidden">
                                    <div class="shift-content p-3 rounded-lg border-2 flex flex-col items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-500"><path d="M12 2v8"></path><path d="m4.93 10.93 1.41 1.41"></path><path d="M2 18h2"></path><path d="M20 18h2"></path><path d="m19.07 10.93-1.41 1.41"></path><path d="M12 10v2"></path><path d="M2 18a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2H2v-2z"></path></svg>
                                        <span class="text-sm font-medium">Vespertino</span>
                                    </div>
                                </label>
                                <label class="shift-card rounded-lg cursor-pointer">
                                    <input type="radio" name="turn" value="3" class="hidden">
                                    <div class="shift-content p-3 rounded-lg border-2 flex flex-col items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-indigo-500"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg>
                                        <span class="text-sm font-medium">Noturno</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ano</label>
                            <div class="relative">
                                <input type="number" name="year" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="Ex: 2025">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeModal('createClassModal')" 
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
       
 
@endsection
