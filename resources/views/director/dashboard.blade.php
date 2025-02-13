<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacsafe - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .card {
  background-color: white;
  padding: 1.5rem; /* Equivalente a p-6 do Tailwind */
  border-radius: 0.5rem; /* Equivalente a rounded-lg do Tailwind */
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -1px rgb(0 0 0 / 0.06); /* Equivalente a shadow-md do Tailwind */
}

.progress-container {
  width: 100%; /* Ocupa toda a largura do container pai */
  height: 1rem; /* Ajuste a altura conforme necessário */
  border-radius: 0.25rem; /* Equivalente a rounded do Tailwind */
  overflow: hidden;
  position: relative;
}

.progress-bar {
  height: 100%;
  width: 0%; /* Começa em 0% */
  background: linear-gradient(to right, #a0f0c5, #00c800); /* Mesmo gradiente do botão */
  border-radius: 0.25rem; /* Mesmo valor de border-radius */
  transition: width 0.5s ease-in-out; /* Animação suave */
  position: absolute; /* Para animação do carregamento inicial */
}

.progress-container:hover .progress-bar {
  filter: brightness(1.1); /* Efeito de brilho ao passar o mouse */
  cursor: pointer; /* Indica que é clicável */
}
  </style>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen"> 
    <!-- Sidebar -->
    <div class="bg-[url('https://wallpapers.com/images/hd/green-gradient-background-1080-x-1920-1d34ljvp9yi0en92.jpg')] w-64 p-6 text-white border-t-4 border-black relative">
      <h2 class="text-xl font-bold mb-8">Escola Municipal Zumbi dos Palmares</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="#" class="flex items-center p-2 rounded transition-all duration-300 
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                      hover:text-white hover:shadow-lg">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
          </li>
          <li class="mb-4">
            <a href="#" class="flex items-center p-2 rounded transition-all duration-300 
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#6dd5ed] 
                      hover:text-white hover:shadow-lg">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M8 7a4 4 0 118 0m-4 9a6 6 0 016 6H6a6 6 0 016-6z"></path>
                </svg>
                Usuários
            </a>
          </li>
          <li class="mb-4">
            <a href="#" class="flex items-center hover:bg-[#27AE60] p-2 rounded">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l-4-4h8l-4 4zm0 0v6m-8-6a8 8 0 0116 0"></path>
              </svg>
              Estudantes
            </a>
          </li>
        </ul>
      </nav>
    
      <!-- Logo na parte inferior -->
      <div class="absolute bottom-0 left-0 w-full bg-black p-4 flex justify-center">
        <img src="https://api-eventos.pacsafe.com.br/logo-branca-1024x500.png" alt="Logo Pacsafe" class="h-12">
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white p-6 shadow-md">
        <div class="flex justify-between items-center">
          <h2 class="text-2xl font-bold text-[#2C3E50]">Dashboard</h2>
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Buscar..."
              class="border border-gray-300 p-2 rounded-lg mr-4"
            />
            <div class="w-10 h-10 bg-[#58D68D] rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
          </div>
        </div>
      </header>

      <!-- Cards e Métricas -->
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
            <p class="text-3xl font-bold text-[#2ECC71]">1,250/2150</p>
            <div class="mt-4 progress-container">  <div class="progress-bar" id="progress-bar"></div> </div>
          </div>
          <div class="card">
            <div class="flex justify-between items-center">
              <h3 class="text-lg font-semibold text-[#2C3E50]">Alunos Cadastrados</h3>
              <svg class="w-8 h-8 text-[#2ECC71]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <p class="text-3xl font-bold text-[#2ECC71]">1,250</p>
            <div class="mt-4 progress-container">  
              <div class="progress-bar" id="progress-bar">

              </div> 
            </div>
          </div>

         
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
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
        </div>
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
</body>
</html>