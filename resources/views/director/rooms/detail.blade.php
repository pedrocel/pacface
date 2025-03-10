@extends('director.layout')

@section('title', 'Dashboard')
<style> 
.timeline-item:last-child .timeline-line {
            display: none;
        }
</style>
@section('content')
    
<div class="max-w-4xl mx-auto px-4 py-8">
        @foreach($frequencies as $frequency)
        <div class="mb-8 last:mb-0">
            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ \Carbon\Carbon::parse($frequency->date)->format('d/m/Y') }}</h3>
            
            <div class="timeline-item flex gap-4 mb-4 last:mb-0">
                <div class="flex-none relative">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                    <div class="timeline-line absolute top-3 left-1.5 w-0.5 h-full -ml-px bg-gray-200"></div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-sm p-4">

                    <div class="flex items-center justify-between mb-2">
                        <time class="text-sm font-medium text-gray-900">Registro feito em: {{ \Carbon\Carbon::parse($frequency->date)->format('H:i') }}</time>
                        <span class="text-lg text-gray-500">IP: {{$frequency->ip}}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-emerald-600">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                        <span class="text-sm text-gray-700">Presença registrada via reconhecimento facial</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection