<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PacSafe - Sistema Acadêmico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .sidebar-hover {
            transition: all 0.3s ease;
        }
        .sidebar-hover:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }
        @media (max-width: 768px) {
            .sidebar-collapsed {
                width: 0;
                overflow: hidden;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-2 rounded-lg shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed md:relative w-64 h-full bg-[#1a1a1a] text-white transform transition-transform duration-300 ease-in-out md:transform-none -translate-x-full md:translate-x-0 z-40">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="p-6 bg-gradient-to-r from-green-600 to-green-700">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-white rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold tracking-wider">{{ $org->organization->name }}</h1>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('director.dashboard') }}" 
               class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
               {{ request()->routeIs('director.dashboard') ? 'text-gray-100 bg-gradient-to-r from-green-600 to-green-500 shadow-lg' : 'text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="ml-3 font-medium">Dashboard</span>
            </a>

            <a href="{{ route('director.profile.index') }}" 
               class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
               {{ request()->routeIs('director.profile.index') ? 'text-gray-100 bg-gradient-to-r from-green-600 to-green-500 shadow-lg' : 'text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="ml-3 font-medium">Meu Perfil</span>
            </a>

            <a href="{{ route('director.students.index') }}" 
               class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
               {{ request()->routeIs('director.students.index') ? 'text-gray-100 bg-gradient-to-r from-green-600 to-green-500 shadow-lg' : 'text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span class="ml-3 font-medium">Alunos</span>
            </a>

            <a href="{{ route('director.pre-register.get') }}" 
               class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
               {{ request()->routeIs('director.pre-register.get') ? 'text-gray-100 bg-gradient-to-r from-green-600 to-green-500 shadow-lg' : 'text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                <span class="ml-3 font-medium">Pré-cadastro</span>
            </a>
        </nav>
    </div>
</aside>


        <!-- Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>