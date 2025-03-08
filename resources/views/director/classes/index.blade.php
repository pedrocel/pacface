@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
    <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Módulo de turmas</h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('director.class.create') }}" class="flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    + Criar nova turma 
                </a>
            </div>
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

       
 
@endsection
