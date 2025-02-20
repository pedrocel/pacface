<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacsafe - Diretor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="bg-[url('https://wallpapers.com/images/hd/green-gradient-background-1080-x-1920-1d34ljvp9yi0en92.jpg')] w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h2 class="text-xl text-white font-bold mb-8">{{ $org->organization->name }}</h2>
      <nav>

        <ul>
          <li class="mb-4">
            <a href="{{ route('director.dashboard') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.dashboard'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.dashboard'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('director.profile.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.profile.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.profile.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Meu Perfil
            </a>
          </li>
         
          <li class="mb-4">
            <a href="{{ route('director.students.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.students.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.students.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Alunos
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('director.pre-register.get') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.pre-register.get'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.pre-register.get'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Pré cadastro
            </a>
          </li>
        </ul>

        <div class="absolute bottom-0 left-0 w-full bg-black p-4 flex justify-center">
        <img src="https://api-eventos.pacsafe.com.br/logo-branca-1024x500.png" alt="Logo Pacsafe" class="h-12">
      </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white p-6 shadow-md">
        <div class="flex justify-between items-center">
          <h2 class="text-2xl font-bold text-[#2C3E50]">Pré cadastros</h2>
          <div class="flex items-center">
            <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden z-50">
              <ul>  
                <a href="{{ route('director.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
                  Dashboard
                </a>
                <a href="{{ route('director.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Meu Perfil
                </a>
                <a href="{{ route('director.students.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Alunos
                </a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                        Sair
                    </button>
                </form>
              </ul>
            </div>
          </div>
          </div>
        </div>
      </header>

      <!-- Cards e Métricas -->
      <main class="p-6 flex-1">
      @if(session('success'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Erro!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div class="flex justify-end space-x-4 mb-4">
    <!-- Botão para abrir modal -->
    <button onclick="openModal()" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-700 focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out transform hover:scale-105">
        + Cadastrar Novo Estudante
    </button>

    <!-- Botão para upload -->
    <form action="{{ route('upload.cpf') }}" method="POST" enctype="multipart/form-data" class="flex items-center">
        @csrf
        <label for="file" class="block text-sm font-medium text-gray-700 mr-2">Escolha a planilha</label>
        <input type="file" name="file" id="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 file:border-0 file:bg-blue-100 file:text-blue-700 file:px-4 file:py-2 file:rounded-l-md hover:file:bg-blue-200 transition duration-300" accept=".xlsx" required>

        <button type="submit" class="ml-2 bg-gradient-to-r from-green-500 to-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:from-green-600 hover:to-teal-700 focus:ring-4 focus:ring-green-300 transition duration-300 ease-in-out transform hover:scale-105">
            Enviar
        </button>
    </form>
</div>

    

<div class="overflow-x-auto"> <!-- Adicionando altura máxima e overflow -->
    <table class="w-full border-collapse bg-white shadow-lg rounded-lg border border-gray-200">
        <thead class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">CPF</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="border-b hover:bg-gray-100 transition duration-300">
                <td class="px-6 py-4 text-sm text-gray-700">{{ $student->cpf }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $student->organization_id }}</td>
                <td class="px-6 py-4">
                    @if($student->status == 1)
                        <button class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition duration-300">Pendente</button>
                    @elseif($student->status == 0)
                        <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">Aluno registrado</button>
                    @else
                        <button class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">Status desconhecido</button>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('director.pre-register.delete', $student->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded-full p-2 transition duration-300">
                            <i class="fas fa-trash"></i> <!-- Ícone de lixeira -->
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Navegação de paginação -->
    <div class="mt-4">
        {{ $students->links('pagination::tailwind') }} <!-- Isso cria a navegação da paginação -->
    </div>
</div>


</main>
<!-- Modal de Cadastro -->
<div id="preRegisterModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">
            &times;
        </button>
        <h2 class="text-xl font-semibold mb-4">Pré Cadastro do Aluno</h2>

        <form id="preRegisterForm" action="{{ route('director.pre-register.post') }}" method="POST">
            @csrf

            <!-- Campo CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" required class="mt-1 p-2 border rounded-lg w-full" placeholder="XXX.XXX.XXX-XX">
            </div>

            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    if (value.length > 3) value = value.replace(/^(\d{3})/, '$1.');
    if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})/, '$1.$2.');
    if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})/, '$1.$2.$3-');
    e.target.value = value;
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os elementos com a classe 'cpf'
    const cpfs = document.querySelectorAll('.cpf');
    
    // Função para aplicar a máscara de CPF
    function formatCPF(cpf) {
        return cpf.replace(/\D/g, '')                     // Remove qualquer caractere não numérico
                  .replace(/(\d{3})(\d)/, '$1.$2')       // Adiciona o ponto após os três primeiros dígitos
                  .replace(/(\d{3})(\d)/, '$1.$2')       // Adiciona o ponto após os três próximos
                  .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen e os dois últimos dígitos
    }

    // Aplica a máscara para cada CPF
    cpfs.forEach(function(cpfElement) {
        cpfElement.textContent = formatCPF(cpfElement.textContent);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
        
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

        let soma = 0, resto;
        
        for (let i = 1; i <= 9; i++) soma += parseInt(cpf[i - 1]) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf[9])) return false;

        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf[i - 1]) * (12 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        
        return resto === parseInt(cpf[10]);
    }

    document.getElementById("cpf").addEventListener("input", function () {
        let cpfInput = this.value;
        let cpfError = document.getElementById("cpfError");

        if (!validarCPF(cpfInput)) {
            cpfError.classList.remove("hidden");
        } else {
            cpfError.classList.add("hidden");
        }
    });
});
</script>

<script>
    function openModal() {
        document.getElementById('preRegisterModal').classList.remove('hidden');
        document.getElementById('preRegisterModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('preRegisterModal').classList.add('hidden');
        document.getElementById('preRegisterModal').classList.remove('flex');
    }

    document.addEventListener('click', function(event) {
        const modal = document.getElementById('preRegisterModal');
        if (event.target === modal) {
            closeModal();
        }
    });
</script>

<script>
    document.getElementById('profileButton').addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
    
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>

    </div>
  </div>
</body>
</html>