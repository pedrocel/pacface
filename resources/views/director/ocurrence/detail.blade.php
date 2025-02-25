@extends('director.layout')

@section('title', 'Dashboard')

@section('content')

<div class="p-8">
    <!-- Cabeçalho -->
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Dashboard de ocorrências</h2>
        <div class="flex items-center">
            <!-- Botão de Filtro -->
            <button onclick="openFilterModal()" class="flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                Filtros
            </button>
        </div>
    </div>

    <!-- Grade de Estatísticas -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
      <div class="flex justify-between items-start">
        <div>
          <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
            Em Andamento
          </span>
          <h2 class="text-2xl font-bold text-gray-900 mt-2">Faltas Consecutivas</h2>
          <p class="text-gray-600">Criado em 15/02/2024</p>
        </div>
        <div class="flex space-x-3">
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors">
            Editar
          </button>
          <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors">
            Encerrar
          </button>
        </div>
      </div>
    </div>

    <!-- Grid de Informações -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
      <!-- Informações do Aluno -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações do Aluno</h3>
        <div class="flex items-center mb-4">
          <img class="h-16 w-16 rounded-full" src="https://ui-avatars.com/api/?name=João+Silva" alt="João Silva">
          <div class="ml-4">
            <p class="text-xl font-semibold text-gray-900">João Silva</p>
            <p class="text-gray-600">8º Ano A</p>
            <p class="text-gray-600">Matrícula: 2024001</p>
          </div>
        </div>
        <div class="border-t pt-4">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-600">Responsável</p>
              <p class="font-medium">Maria Silva</p>
            </div>
            <div>
              <p class="text-sm text-gray-600">Contato</p>
              <p class="font-medium">(11) 98765-4321</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Detalhes da Ocorrência</h3>
        <div class="space-y-4">
          <div>
            <p class="text-sm text-gray-600">Descrição</p>
            <p class="text-gray-900">O aluno está ausente há 3 dias consecutivos sem justificativa prévia ou contato dos responsáveis.</p>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-600">Responsável</p>
              <p class="font-medium">Maria Oliveira</p>
              <p class="text-sm text-gray-600">Coordenadora</p>
            </div>
            <div>
              <p class="text-sm text-gray-600">Duração</p>
              <p class="font-medium">5 dias</p>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-600">Secretário(a)</p>
              <p class="font-medium">Paulo Santos</p>
            </div>
            <div>
              <p class="text-sm text-gray-600">Assistente Social</p>
              <p class="font-medium">Fernanda Costa</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Timeline de Movimentações -->
    <div class="bg-white rounded-lg shadow-md p-6">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Histórico de Movimentações</h3>
        <button onclick="toggleModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nova Movimentação
        </button>
      </div>
      
      <div class="flow-root">
        <ul role="list" class="-mb-8">
          <li>
            <div class="relative pb-8">
              <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
              <div class="relative flex space-x-3">
                <div>
                  <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </span>
                </div>
                <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                  <div>
                    <p class="text-sm text-gray-900">Contato realizado com os responsáveis</p>
                    <p class="text-sm text-gray-600">Mãe do aluno informou que ele está com sintomas gripais e ficará em repouso por mais 2 dias.</p>
                  </div>
                  <div class="whitespace-nowrap text-right text-sm text-gray-500">
                    <time datetime="2024-02-15">15/02 às 14:30</time>
                    <p class="text-sm text-gray-600">por Maria Oliveira</p>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="relative pb-8">
              <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
              <div class="relative flex space-x-3">
                <div>
                  <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                  </span>
                </div>
                <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                  <div>
                    <p class="text-sm text-gray-900">Ocorrência aberta automaticamente</p>
                    <p class="text-sm text-gray-600">Sistema detectou 3 faltas consecutivas sem justificativa.</p>
                  </div>
                  <div class="whitespace-nowrap text-right text-sm text-gray-500">
                    <time datetime="2024-02-15">15/02 às 08:00</time>
                    <p class="text-sm text-gray-600">Sistema</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
</div>

<!-- Modal de Filtros -->
<div id="filterModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black bg-opacity-50" onclick="closeFilterModal()"></div>
        <div class="absolute right-0 top-0 h-full w-1/3 bg-white shadow-lg transform transition-transform duration-300 ease-in-out translate-x-full">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Filtrar Notificações</h3>
                    <button onclick="closeFilterModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
            </div>
        </div>
</div>

<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-md bg-white">
      <div class="flex justify-between items-center pb-3">
        <h3 class="text-xl font-semibold text-gray-900">Nova Movimentação</h3>
        <button onclick="toggleModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nova Ocorrência
        </button>
      </div>
      <form>
        <div class="mt-4">
          <label class="block text-sm font-medium text-gray-700">Descrição</label>
          <textarea rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="toggleModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancelar
          </button>
          <button type="submit" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
          </button>
        </div>
      </form>
    </div>
  </div>

        <!-- Script para controlar o modal -->
    <script>
        function openFilterModal() {
            const modal = document.getElementById('filterModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('.transform').classList.remove('translate-x-full');
            }, 20);
        }

        function closeFilterModal() {
            const modal = document.getElementById('filterModal');
            modal.querySelector('.transform').classList.add('translate-x-full');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
    
  <script>
    function toggleModal() {
      const modal = document.getElementById('modal');
      modal.classList.toggle('hidden');
    }
  </script>
    <script>
    function toggleModal() {
      const modal = document.getElementById('modal');
      modal.classList.toggle('hidden');
    }
  </script>
@endsection
