@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Módulo de professores</h2>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('director.teacher.create') }}" class="flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        + Adicionar professor 
                    </a>
                </div>
            </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            @foreach ($teachers as $teacher)
                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                    <h2 class="text-xl font-semibold">{{ $teacher->user->name }}</h2>
                    <p><strong>Status:</strong> {{ $teacher->user->email }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
