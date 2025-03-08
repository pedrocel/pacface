@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
            <div class="flex items-center">
                <span class="mr-4 text-gray-600">Admin</span>
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                    alt="Profile" 
                    class="w-10 h-10 rounded-full border-2 border-green-500">
            </div>
        </div>
        <h1 class="text-2xl font-bold mb-4">Classes</h1>
    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Class</a>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        @foreach ($classes as $class)
            <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold">{{ $class->name }}</h2>
                <p><strong>Status:</strong> {{ $class->status }}</p>
                <p><strong>Qtd Students:</strong> {{ $class->qtd_students }}</p>
                <p><strong>Turn:</strong> {{ $class->turn }}</p>
                <p><strong>Year:</strong> {{ $class->year }}</p>
                <div class="mt-2">
                    <a href="{{ route('classes.edit', $class) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    </div>

       
 
@endsection
