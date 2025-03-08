@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
    <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Frequencias: {{ $room->name }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        @foreach ($frequencies as $frequency)

        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $frequency}}</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            Ativo
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
 
@endsection
