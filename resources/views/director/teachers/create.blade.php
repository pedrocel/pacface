@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-gray-800">Criar professor</h2>
            
        </div>
        </div>
        <form action="{{ route('director.teacher.store') }}" method="POST" class="mx-auto bg-white p-6 rounded-lg shadow-lg">
    @csrf
    
    <!-- Nome -->
    <div class="mb-4">
        <label for="name" class="block text-lg font-medium text-gray-700">Nome:</label>
        <input type="text" id="name" name="name" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
    </div>

    <!-- E-mail -->
    <div class="mb-4">
        <label for="email" class="block text-lg font-medium text-gray-700">E-mail:</label>
        <input type="email" id="email" name="email" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
    </div>

    <!-- WhatsApp -->
    <div class="mb-4">
        <label for="whatsapp" class="block text-lg font-medium text-gray-700">WhatsApp:</label>
        <input type="text" id="whatsapp" name="whatsapp" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
    </div>

    <!-- CPF -->
    <div class="mb-4">
        <label for="cpf" class="block text-lg font-medium text-gray-700">CPF:</label>
        <input type="text" id="cpf" name="cpf" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
    </div>

    <!-- Data de Nascimento -->
    <div class="mb-4">
        <label for="birthdate" class="block text-lg font-medium text-gray-700">Data de Nascimento:</label>
        <input type="date" id="birthdate" name="student_birthdate" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
    </div>

    <!-- Buttons -->
    <div class="flex justify-between mt-6">
        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-6 rounded-lg">
            Salvar
        </button>
        <a href="{{ route('director.teacher.index') }}" class="flex items-center text-gray-600 hover:underline font-semibold">
            Cancelar
        </a>
    </div>
</form>

@endsection