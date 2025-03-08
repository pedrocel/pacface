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
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        @foreach ($classes as $class)
            <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold">{{ $class->name }}</h2>
                <p><strong>Status:</strong> {{ $class->status }}</p>
                <p><strong>Qtd Students:</strong> {{ $class->qtd_students }}</p>
                <p><strong>Turn:</strong> {{ $class->turn }}</p>
                <p><strong>Year:</strong> {{ $class->year }}</p>
                <div class="mt-2">
                    <a href="#" class="text-blue-500">Edit</a>
                    <form action="#" method="POST" class="inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    </div>

       
 
@endsection
