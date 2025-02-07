<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Gradient Sidebar Layout</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Gradient background utility */
    .bg-gradient-custom {
      background: linear-gradient(to bottom, #58c5ed, #61e3e8);
    }
  </style>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h1 class="text-xl font-bold text-center mb-6">Menu</h1>
      <nav class="flex flex-col gap-4">
        <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Responsáveis
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
      <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500">Bem-vindo!</h1>
        <div class="flex items-center gap-4">
          <!-- Notification Icon -->
          <div class="relative">
            <button id="notificationButton" class="relative p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
              </svg>
            </button>
            <div id="notificationModal" class="absolute right-0 mt-2 w-64 bg-white shadow-xl rounded-xl p-4 hidden">
              <h2 class="text-lg font-semibold mb-2">Notificações</h2>
              <ul>
                <li class="py-1 border-b">Lorem Ipsum</li>
              </ul>
            </div>
          </div>

          <!-- Profile Icon -->
          <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
              <ul>
              <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Responsáveis
        </a>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <div id="createResponsibleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Cadastrar Responsável</h2>
        <p>Formulário aqui...</p>
        <button onclick="closeModal()" class="mt-4 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
    </div>
</div>

<!-- Lista de Responsáveis -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card de Criar Novo Responsável -->
    <div onclick="openModal()" class="bg-blue-100 rounded-2xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-blue-200 transition cursor-pointer">
        <div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m-8-8h16" />
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-blue-700 mt-4">Criar Responsável</h3>
    </div>

    @forelse ($responsibles as $responsavel)
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
            <div class="w-24 h-24 mb-4">
                <img src="data:image/png;base64,<?= htmlspecialchars($responsavel->responsible->facial_image_base64) ?>" class="rounded-full object-cover w-full h-full">
            </div>
            <h3 class="text-lg font-semibold text-gray-900">{{ $responsavel->responsible->name }}</h3>
            <p class="text-gray-700 mb-4">{{ $responsavel->responsible->email }}</p>
            <div class="flex space-x-3">
                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Editar</button>
                <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Excluir</button>
            </div>
        </div>
    @empty
        <p class="text-gray-700 text-center col-span-full">Nenhum responsável encontrado.</p>
    @endforelse
</div>
    </main>
  </div>

  <script>
    // Toggle notification modal
    document.getElementById('notificationButton').addEventListener('click', function () {
      const modal = document.getElementById('notificationModal');
      modal.classList.toggle('hidden');
    });

    // Toggle profile dropdown
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
  </script>
  <script>
    function openModal() {
        document.getElementById('createResponsibleModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }
</script>
</body>
</html>