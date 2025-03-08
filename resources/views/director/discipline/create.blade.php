@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Criar disciplina</h2>
            
        </div>


    <form action="{{ route('director.discipline.store') }}" method="POST">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block font-medium">Nome da disciplina</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="border border-gray-300 rounded w-full px-4 py-2 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                value="{{ old('name') }}" 
                required>
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-4">
    <label for="status" class="block font-medium">Status</label>
    <select 
        name="status" 
        id="status" 
        class="border border-gray-300 rounded w-full px-4 py-2 focus:ring focus:ring-blue-500 focus:border-blue-500" 
        required>
        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inativo</option>
    </select>
    @error('status')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>


        {{-- Year --}}
        <div class="mb-4">
            <label for="year" class="block font-medium">Ano</label>
            <input 
                type="number" 
                name="year" 
                id="year" 
                class="border border-gray-300 rounded w-full px-4 py-2 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                value="{{ old('year') }}">
            @error('year')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg">
                Salvar
            </button>
            <a href="{{ route('director.class.index') }}" class="ml-4 text-gray-600 hover:underline">
                Cancelar
   

    </div>
    </form>

       
 
@endsection
