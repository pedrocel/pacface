<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACSAFE - SISTEMA DE RECONHECIMENTO FACIAL ACADÊMICO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .modal-backdrop {
            backdrop-filter: blur(8px);
        }
        .modal-content {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }
        .modal-content.active {
            transform: scale(1);
            opacity: 1;
        }
        .sidebar-menu {
            height: calc(100vh - 180px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
        }
        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }

        /* Neon effect for menu items */
        .menu-item {
            animation: slideIn 0.3s ease-out forwards;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }
        
        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            transition: 0.5s;
        }
        
        .menu-item:hover::before {
            left: 100%;
        }
        
        .menu-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            transition: 0.5s;
        }
        
        .menu-item:hover::after {
            right: 100%;
        }

        .menu-item.active {
            background: linear-gradient(45deg, rgba(0, 135, 90, 0.8), rgba(0, 175, 120, 0.8));
            box-shadow: 0 0 15px rgba(0, 255, 170, 0.3);
        }

        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.2s; }
        .menu-item:nth-child(3) { animation-delay: 0.3s; }
        .menu-item:nth-child(4) { animation-delay: 0.4s; }
        .menu-item:nth-child(5) { animation-delay: 0.5s; }
        .menu-item:nth-child(6) { animation-delay: 0.6s; }

        /* Profile image upload styles */
        .profile-upload {
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .profile-upload::after {
            content: 'Alterar foto';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 8px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 12px;
            text-align: center;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .profile-upload:hover::after {
            transform: translateY(0);
        }

        /* Camera preview styles */
        .camera-preview {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .camera-controls {
            position: absolute;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 16px;
            z-index: 10;
        }

        /* Mobile Menu Animations */
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 40;
                height: 100vh;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sidebar-overlay {
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease-in-out;
            }
            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }

        /* Custom Radio Button Styles */
        .status-radio {
            position: relative;
            padding: 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .status-radio input {
            position: absolute;
            opacity: 0;
        }

        .status-radio.active {
            background-color: rgb(16 185 129 / 0.1);
            border: 2px solid rgb(16 185 129);
        }

        .status-radio.inactive {
            background-color: rgb(239 68 68 / 0.1);
            border: 2px solid rgb(239 68 68);
        }

        .status-radio input:checked + .radio-content {
            opacity: 1;
        }

        /* Shift Schedule Card Styles */
        .shift-card {
            border: 2px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .shift-card input:checked + .shift-content {
            border-color: rgb(16 185 129);
            background-color: rgb(16 185 129 / 0.1);
        }

        @keyframes slideIn {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .loader {
            animation: spin 1s linear infinite;
        }
        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
            pointer-events: none;
        }
        .fade-in {
            opacity: 1;
            transition: opacity 0.5s ease-in;
            pointer-events: auto;
        }
        .dragging {
        opacity: 0.5;
        border: 2px dashed #4f46e5;
        }
        
        .drop-zone {
        min-height: 200px;
        }

        .drop-zone.drag-over {
        background-color: #eef2ff;
        border: 2px dashed #4f46e5;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button onclick="toggleSidebar()" class="p-2 bg-emerald-600 rounded-lg text-white shadow-lg hover:bg-emerald-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
    </div>
    @php
        use App\Models\UserOrganizationModel;
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
    @endphp
    <!-- Mobile Menu Overlay -->
    <div id="sidebarOverlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 sidebar-overlay z-30" onclick="toggleSidebar()"></div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-[#00875A] text-white flex flex-col">
            <div class="p-4 border-b border-emerald-700">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-white/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="m9 12 2 2 4-4"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">PACSAFE</h1>
                        <p class="text-xs text-emerald-100">Sistema de reconhecimento oficial acadêmico</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="sidebar-menu p-4">
                <div class="space-y-2">
                    <a href="{{ route('director.dashboard') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                        </div>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('director.class.index') }}" class="menu-item flex items-center gap-2 p-2 rounded bg-emerald-700 group">
                        <div class="p-1.5 bg-white/20 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span>Turmas</span>
                    </a>
                    <a href="{{ route('director.frequency.dashboard.get') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                        </div>
                        <span>Frequência Escolar</span>
                    </a>
                    <a href="{{ route('director.discipline.index') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox=" 0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                        </div>
                        <span>Disciplinas</span>
                    </a>
                    <a href="{{ route('director.ocurrence.dashboard.get') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                        </div>
                        <span>Ocorrências</span>
                    </a>
                    <a href="{{ route('director.point-digital.dashboard.get') }}"  class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M12 11c0 1.66-1.34 3-3 3s-3-1.34-3-3 1.34-3 3-3 3 1.34 3 3z"></path><path d="M12 11c0-1.66 1.34-3 3-3s3 1.34 3 3-1.34 3-3 3-3-1.34-3-3z"></path><path d="M13.47 14.28c-.79.29-1.64.44-2.47.44s-1.68-.15-2.47-.44"></path><path d="M9 17.5c0 .53-.21 1.04-.59 1.42C7.84 19.5 6.93 20 6 20s-1.84-.5-2.41-1.08C3.21 18.54 3 18.03 3 17.5c0-1.1 1.34-2 3-2s3 .9 3 2z"></path><path d="M15 17.5c0 .53.21 1.04.59 1.42.57.58 1.48 1.08 2.41 1.08s1.84-.5 2.41-1.08c.38-.38.59-.89.59-1.42 0-1.1-1.34-2-3-2s-3 .9-3 2z"></path></svg>
                        </div>
                        <span>Ponto Digital</span>
                    </a>
                </div>

                <div class="mt-8 space-y-2">
                    <h3 class="px-2 text-xs font-semibold text-emerald-200 uppercase tracking-wider">Gestão</h3>
                    <a href="{{ route('director.students.index') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span>Alunos</span>
                    </a>
                    <a href="{{ route('director.teacher.index') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span>Professores</span>
                    </a>
                    <a href="{{ route('director.room.index') }}"  class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                        </div>
                        <span>Salas de aula</span>
                    </a>
                    <a href="{{ route('director.pre-register.get') }}" class="menu-item flex items-center gap-2 p-2 rounded hover:bg-emerald-700 group transition-colors">
                        <div class="p-1.5 bg-white/10 rounded group-hover:bg-white/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" x2="19" y1="8" y2="14"></line><line x1="22" x2="16" y1="11" y2="11"></line></svg>
                        </div>
                        <span>Pré-cadastro</span>
                    </a>
                </div>
            </nav>

            <!-- Fixed User Profile Section -->
            <div class="mt-auto p-4 border-t border-emerald-700 bg-[#00875A]">
                <button onclick="openModal('settingsModal')" class="w-full bg-emerald-700 hover:bg-emerald-600 rounded-lg p-3 transition-all hover:shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Profile" 
                                 class="w-10 h-10 rounded-full border-2 border-emerald-400">
                            <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-emerald-700"></div>
                        </div>
                        <div class="flex-1 text-left">
                            <h3 class="font-medium text-sm">{{$user->name}}</h3>
                            <p class="text-xs text-emerald-200">{{$org->organization->name}}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-emerald-200"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                </button>
            </div>
        </aside>

        <div id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900">
            <div class="text-center">
                <div class="inline-block p-8 rounded-full bg-emerald-600 shadow-lg">
                    <svg class="w-16 h-16 text-gray-100 loader" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h2 class="mt-4 text-xl font-semibold text-gray-100">Carregando...</h2>
            </div>
        </div>
        <!-- Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
        
    </div>
    <div id="settingsModal" class="fixed inset-0 bg-black bg-opacity-30 modal-backdrop hidden z-50 flex items-center justify-center">
        <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Configurações do Perfil</h2>
                <button onclick="closeModal('settingsModal')" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x2="18" y1="6" y2="18"></line></svg>
                </button>
            </div>

            <div class="p-6">
                <div class="flex items-center gap-6 mb-8">
                    <div class="relative">
                        <div class="profile-upload" onclick="openCamera()">
                            <img id="profileImage" 
                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Profile" 
                                 class="w-24 h-24 rounded-full border-4 border-emerald-400 cursor-pointer">
                        </div>
                    </div>
                    <div>
                        
                        <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->profissao ?? 'Profissão não informada' }}</p>
                        <p class="text-sm text-emerald-600">Online há 2 horas</p>
                    </div>
                </div>

                <!-- Camera Modal -->
                <div id="cameraModal" class="hidden">
                    <div class="camera-preview mb-4">
                        <video id="cameraFeed" autoplay playsinline class="w-full"></video>
                        <div class="camera-controls">
                            <button onclick="capturePhoto()" class="p-3 bg-emerald-600 text-white rounded-full hover:bg-emerald-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                            </button>
                            <button onclick="closeCamera()" class="p-3 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x2="18" y1="6" y2="18"></line></svg>
                            </button>
                        </div>
                        <canvas id="photoCanvas" class="hidden"></canvas>
                    </div>
                </div>

                <!-- School Info -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h4 class="font-medium mb-2">Informações da Escola</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-600">Escola</p>
                            <p class="font-medium">Escola Municipal São José</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Departamento</p>
                            <p class="font-medium">Ensino Fundamental II</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Matrícula</p>
                            <p class="font-medium">2024001</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Cargo</p>
                            <p class="font-medium">Professor Efetivo</p>
                        </div>
                    </div>
                </div>

                <!-- Latest Notifications -->
                <div class="mb-6">
                    <h4 class="font-medium mb-4">Últimas Notificações</h4>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-blue-600 mt-1"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                            <div>
                                <p class="text-sm font-medium">Nova turma atribuída</p>
                                <p class="text-xs text-gray-600">Você foi designado para a turma 2º Ano B</p>
                                <p class="text-xs text-gray-500 mt-1">Há 2 horas</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-emerald-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-emerald-600 mt-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <div>
                                <p class="text-sm font-medium">Frequência registrada</p>
                                <p class="text-xs text-gray-600">Registro de presença confirmado para 1º Ano A</p>
                                <p class="text-xs text-gray-500 mt-1">Há 5 horas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Settings -->
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center gap-2 p-3 rounded-lg border hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-600"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                        <span class="text-sm">Notificações</span>
                    </button>
                    <button class="flex items-center gap-2 p-3 rounded-lg border hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-600"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <span class="text-sm">Privacidade</span>
                    </button>
                    <button class="flex items-center gap-2 p-3 rounded-lg border hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-600"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><path d="M12 17h.01"></path></svg>
                        <span class="text-sm">Ajuda</span>
                    </button>
                    <button class="flex items-center gap-2 p-3 rounded-lg border hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-600"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                        <span class="text-sm">Sair</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        let isSidebarOpen = false;

        mobileMenuButton.addEventListener('click', () => {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
    <script>
        window.addEventListener('load', () => {
            const loadingScreen = document.getElementById('loading-screen');
            const mainContent = document.getElementById('main-content');
            
            setTimeout(() => {
                loadingScreen.classList.add('fade-out');
                mainContent.classList.add('fade-in');
                
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 1200);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script>
        // Initialize Lucide icons
        window.openModal = function(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modal.querySelector('.modal-content').classList.add('active');
            }, 10);
        };

        window.closeModal = function(modalId) {
            const modal = document.getElementById(modalId);
            modal.querySelector('.modal-content').classList.remove('active');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        };

        // Sidebar toggle function
        window.toggleSidebar = function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        };

        // Status radio button function
        window.updateStatusStyle = function(radio) {
            const labels = document.querySelectorAll('.status-radio');
            labels.forEach(label => {
                label.classList.remove('active', 'inactive');
                if (radio.checked && label.contains(radio)) {
                    label.classList.add(radio.value === 'active' ? 'active' : 'inactive');
                }
            });
        };

        // Camera functions
        let stream = null;

        window.openCamera = async function() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                const video = document.getElementById('cameraFeed');
                video.srcObject = stream;
                document.getElementById('cameraModal').classList.remove('hidden');
            } catch (err) {
                console.error('Error accessing camera:', err);
                alert('Erro ao acessar a câmera. Por favor, verifique as permissões.');
            }
        };

        window.closeCamera = function() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            document.getElementById('cameraModal').classList.add('hidden');
        };

        window.capturePhoto = function() {
            const video = document.getElementById('cameraFeed');
            const canvas = document.getElementById('photoCanvas');
            const context = canvas.getContext('2d');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = canvas.toDataURL('image/jpeg');
            document.getElementById('profileImage').src = imageData;

            const formData = {
                image: imageData,
                file: dataURLtoFile(imageData, 'profile.jpg')
            };

            console.log('Ready to send:', formData);
            closeCamera();
        };

        function dataURLtoFile(dataurl, filename) {
            let arr = dataurl.split(','),
                mime = arr[0].match(/:(.*?);/)[1],
                bstr = atob(arr[1]),
                n = bstr.length,
                u8arr = new Uint8Array(n);

            while(n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }

            return new File([u8arr], filename, {type:mime});
        }
    </script>
</body>
</html>