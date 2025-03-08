@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Criar professor</h2>
            
        </div>


    <form action="{{ route('director.teachers.store') }}" method="POST">
        @csrf

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="whatsapp">WhatsApp:</label>
        <input type="text" id="whatsapp" name="whatsapp" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="birthdate">Data de Nascimento:</label>
        <input type="date" id="birthdate" name="student_birthdate" required>

        {{-- Buttons --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg">
                Salvar
            </button>
            <a href="{{ route('director.teachers.index') }}" class="ml-4 text-gray-600 hover:underline">
                Cancelar
   
    </div>
    </form>

       
 
@endsection
