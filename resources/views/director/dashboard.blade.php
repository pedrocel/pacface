<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacsafe - Diretor Escolar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          <h2 class="text-2xl font-bold text-[#2C3E50]">Dashboard</h2>
          <div class="flex items-center">
            <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
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

      <main class="p-6 flex-1">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Card: Quantidade de Alunos -->
          <div class="card">
            <div class="flex justify-between items-center">
              <h3 class="text-lg font-semibold text-[#2C3E50]">Alunos Cadastrados</h3>
              <svg class="w-8 h-8 text-[#2ECC71]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <p class="text-3xl font-bold text-[#2ECC71]">{{ count($userOrganization) }}</p>
            <div class="mt-4 progress-container">  <div class="progress-bar" id="progress-bar"></div> </div>
          </div>
          <div class="card">
            <div class="flex justify-between items-center">
              <h3 class="text-lg font-semibold text-[#2C3E50]">Biometrias Faciais Coletadas</h3>
            </div>
            <p class="text-3xl font-bold text-[#2ECC71]">{{ count($userOrganization) }}</p>
            <!-- <div class="mt-4 progress-container">  
              <div class="progress-bar" id="progress-bar">

              </div> 
            </div> -->
          </div>
        </div>

        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
          <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#2C3E50]">Entradas Faciais - Turno Matutino</h3>
            <div class="mt-4">
              <canvas id="entradasChart"></canvas>
            </div>
          </div>
          <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#2C3E50]">Entradas Faciais - Turno Vespetino</h3>
            <div class="mt-4">
              <canvas id="entradasChartVespetino"></canvas>
            </div>
          </div>
        </div> -->
          <!-- Gráfico de Entradas Faciais -->
          
      </main>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const progressBar = document.getElementById('progress-bar');
      const targetWidth = 80; // Largura final da barra (80% no seu exemplo)
  
      let currentWidth = 0;
      const interval = setInterval(() => {
        currentWidth++;
        progressBar.style.width = currentWidth + '%';
        if (currentWidth >= targetWidth) {
          clearInterval(interval);
        }
      }, 15); // Ajuste o valor 15 para controlar a velocidade da animação
    });
  </script>
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
    // Gráfico de Entradas Faciais
    const ctx = document.getElementById('entradasChart').getContext('2d');
    const entradasChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        datasets: [{
          label: 'Entradas Faciais - Turno Matutino',
          data: [150, 250, 350, 200, 450, 800],
          borderColor: '#2ECC71',
          backgroundColor: 'rgba(46, 204, 113, 0.2)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const ctx1 = document.getElementById('entradasChartVespetino').getContext('2d');
    const entradasChartVespetino = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        datasets: [{
          label: 'Entradas Faciais - Turno Matutino',
          data: [150, 250, 350, 200, 450, 800],
          borderColor: '#0097FF',
          backgroundColor: 'rgba(46, 204, 113, 0.2)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    
  </script>
  <script>
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
</script>
</body>
</html>
