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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
             <!-- Cards de Indicadores -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Total de Ocorrências</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">157</p>
                    <div class="flex items-center text-green-500 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 01-.707-.293l-4-4a1 1 0 01.707-1.414 1 1 0 011.414 0l4 4a1 1 0 01-.707 1.414A1 1 0 0112 7z" clip-rule="evenodd"/>
                    </svg>
                    <span>12% este mês</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Ocorrências Abertas</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">42</p>
                    <div class="flex items-center text-red-500 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 13a1 1 0 01-.707-.293l-4-4a1 1 0 01.707-1.414 1 1 0 011.414 0l4 4a1 1 0 01-.707 1.414A1 1 0 0112 13z" clip-rule="evenodd"/>
                    </svg>
                    <span>3% esta semana</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Alunos Monitorados</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">89</p>
                    <div class="flex items-center text-green-500 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 01-.707-.293l-4-4a1 1 0 01.707-1.414 1 1 0 011.414 0l4 4a1 1 0 01-.707 1.414A1 1 0 0112 7z" clip-rule="evenodd"/>
                    </svg>
                    <span>8% este mês</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Resolvidas</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">115</p>
                    <div class="flex items-center text-green-500 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 01-.707-.293l-4-4a1 1 0 01.707-1.414 1 1 0 011.414 0l4 4a1 1 0 01-.707 1.414A1 1 0 0112 7z" clip-rule="evenodd"/>
                    </svg>
                    <span>15% este mês</span>
                    </div>
                </div>

                
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="flex-1 min-w-[300px]">
                        <div class="bg-gray-100 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Pendentes</h3>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">3</span>
                        </div>
                        <div class="space-y-4 drop-zone" 
                            data-status="pending"
                            ondrop="drop(event)"
                            ondragover="allowDrop(event)"
                            ondragleave="dragLeave(event)">
                            <!-- Card de Ocorrência -->
                            <div class="bg-white rounded-lg shadow p-4 cursor-move" 
                                draggable="true"
                                ondragstart="drag(event)"
                                ondragend="dragEnd(event)"
                                data-id="003"
                                onclick="showOccurrenceDetails('003', 'Pedro Santos', '6º Ano C', 'Faltas Consecutivas', 'Maria Oliveira', 'Paulo Santos', 'Fernanda Costa', 'O aluno está ausente há 3 dias consecutivos sem justificativa prévia.')">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-medium text-gray-600">#003</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Novo
                                </span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Faltas Consecutivas</h4>
                            <div class="flex items-center mb-3">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=Pedro+Santos" alt="">
                                <span class="ml-2 text-sm text-gray-600">Pedro Santos</span>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>6º Ano C</span>
                                <span>Hoje</span>
                            </div>
                            </div>

                            <!-- Card de Ocorrência -->
                            <div class="bg-white rounded-lg shadow p-4 cursor-move"
                                draggable="true"
                                ondragstart="drag(event)"
                                ondragend="dragEnd(event)"
                                data-id="004"
                                onclick="showOccurrenceDetails('004', 'Maria Costa', '7º Ano A', 'Faltas Consecutivas', 'Carlos Souza', 'Amanda Lima', 'Ricardo Oliveira', 'A aluna está ausente há 4 dias consecutivos sem justificativa.')">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-medium text-gray-600">#004</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Novo
                                </span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Faltas Consecutivas</h4>
                            <div class="flex items-center mb-3">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=Maria+Costa" alt="">
                                <span class="ml-2 text-sm text-gray-600">Maria Costa</span>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>7º Ano A</span>
                                <span>Ontem</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                
                    <div class="flex-1 min-w-[300px]">
                        <div class="bg-gray-100 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Em Andamento</h3>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">2</span>
                        </div>
                        <div class="space-y-4 drop-zone" 
                            data-status="in-progress"
                            ondrop="drop(event)"
                            ondragover="allowDrop(event)"
                            ondragleave="dragLeave(event)">
                            <!-- Card de Ocorrência -->
                            <div class="bg-white rounded-lg shadow p-4 cursor-move"
                                draggable="true"
                                ondragstart="drag(event)"
                                ondragend="dragEnd(event)"
                                data-id="001"
                                onclick="showOccurrenceDetails('001', 'João Silva', '8º Ano A', 'Faltas Consecutivas', 'Maria Oliveira', 'Paulo Santos', 'Fernanda Costa', 'O aluno está ausente há 3 dias consecutivos. Contato realizado com responsáveis.')">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-medium text-gray-600">#001</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                Em Progresso
                                </span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Faltas Consecutivas</h4>
                            <div class="flex items-center mb-3">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=João+Silva" alt="">
                                <span class="ml-2 text-sm text-gray-600">João Silva</span>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>8º Ano A</span>
                                <span>2 dias atrás</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="flex-1 min-w-[300px]">
                        <div class="bg-gray-100 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Concluídas</h3>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">4</span>
                        </div>
                        <div class="space-y-4 drop-zone" 
                            data-status="completed"
                            ondrop="drop(event)"
                            ondragover="allowDrop(event)"
                            ondragleave="dragLeave(event)">
                            <!-- Card de Ocorrência -->
                            <div class="bg-white rounded-lg shadow p-4 cursor-move"
                                draggable="true"
                                ondragstart="drag(event)"
                                ondragend="dragEnd(event)"
                                data-id="002"
                                onclick="showOccurrenceDetails('002', 'Ana Santos', '7º Ano B', 'Faltas Consecutivas', 'Carlos Souza', 'Amanda Lima', 'Ricardo Oliveira', 'Aluna retornou às aulas após justificativa médica.')">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-medium text-gray-600">#002</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Resolvido
                                </span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Faltas Consecutivas</h4>
                            <div class="flex items-center mb-3">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=Ana+Santos" alt="">
                                <span class="ml-2 text-sm text-gray-600">Ana Santos</span>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>7º Ano B</span>
                                <span>3 dias atrás</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>

            <!-- Botão Nova Ocorrência -->
            <div class="flex justify-end mb-6">
            <button onclick="toggleModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nova Ocorrência
            </button>
            </div>

            <!-- Tabela de Ocorrências -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Ocorrências Recentes</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aluno</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Responsável</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#001</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="h-10 w-10 flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=João+Silva" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">João Silva</div>
                            <div class="text-sm text-gray-500">8º Ano A</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">Faltas Consecutivas</div>
                        <div class="text-sm text-gray-500">3 dias sem comparecer às aulas</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Maria Oliveira</div>
                        <div class="text-sm text-gray-500">Coordenadora</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Em Andamento
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        15/02/2024
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</button>
                        <button class="text-red-600 hover:text-red-900">Excluir</button>
                    </td>
                    </tr>
                    <!-- Mais linhas de exemplo -->
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#002</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="h-10 w-10 flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Ana+Santos" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Ana Santos</div>
                            <div class="text-sm text-gray-500">7º Ano B</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">Faltas Consecutivas</div>
                        <div class="text-sm text-gray-500">4 dias sem comparecer às aulas</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Carlos Souza</div>
                        <div class="text-sm text-gray-500">Professor</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Resolvido
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        14/02/2024
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</button>
                        <button class="text-red-600 hover:text-red-900">Excluir</button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Anterior
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Próximo
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                    <p class="text-sm text-gray-700">
                        Mostrando <span class="font-medium">1</span> até <span class="font-medium">10</span> de <span class="font-medium">97</span> resultados
                    </p>
                    </div>
                    <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Anterior</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        1
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        2
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        3
                        </a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-50 text-sm font-medium text-gray-700">
                        ...
                        </span>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        8
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        9
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        10
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Próximo</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        </a>
                    </nav>
                    </div>
                </div>
                </div>
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
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
      <div class="flex justify-between items-center pb-3">
        <h3 class="text-xl font-semibold text-gray-900">Nova Ocorrência</h3>
        <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      <form>
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Aluno</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              <option>Selecione um aluno</option>
              <option>João Silva - 8º Ano A</option>
              <option>Ana Santos - 7º Ano B</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Responsável</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              <option>Selecione um responsável</option>
              <option>Maria Oliveira - Coordenadora</option>
              <option>Carlos Souza - Professor</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Secretário</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              <option>Selecione um secretário</option>
              <option>Paulo Santos - Secretário</option>
              <option>Amanda Lima - Secretária</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Assistente Social</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              <option>Selecione um assistente social</option>
              <option>Fernanda Costa - Assistente Social</option>
              <option>Ricardo Oliveira - Assistente Social</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Duração (dias)</label>
            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="5">
          </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="toggleModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancelar
          </button>
          <button type="submit" class="bg-emerald-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
  <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
      <div class="flex justify-between items-center pb-3">
        <h3 class="text-xl font-semibold text-gray-900">Detalhes da Ocorrência <span id="occurrenceId"></span></h3>
        <button onclick="toggleDetailsModal()" class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      
      <div class="mt-4 space-y-4">
        <div class="flex items-center space-x-4">
          <img id="studentAvatar" class="h-12 w-12 rounded-full" src="" alt="">
          <div>
            <h4 id="studentName" class="text-lg font-medium text-gray-900"></h4>
            <p id="studentClass" class="text-sm text-gray-500"></p>
          </div>
        </div>

        <div>
          <h5 class="text-sm font-medium text-gray-700">Descrição</h5>
          <p id="occurrenceDescription" class="mt-1 text-gray-900"></p>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <h5 class="text-sm font-medium text-gray-700">Responsável</h5>
            <p id="responsibleName" class="mt-1 text-gray-900"></p>
          </div>
          <div>
            <h5 class="text-sm font-medium text-gray-700">Secretário(a)</h5>
            <p id="secretaryName" class="mt-1 text-gray-900"></p>
          </div>
          <div>
            <h5 class="text-sm font-medium text-gray-700">Assistente Social</h5>
            <p id="socialWorkerName" class="mt-1 text-gray-900"></p>
          </div>
        </div>

        <div class="pt-4 flex justify-end space-x-3">
          <button onclick="toggleDetailsModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
            Fechar
          </button>
          <a href="detalhes-ocorrencia.html" class="bg-indigo-600 py-2 px-4 rounded-md text-sm font-medium text-white hover:bg-indigo-700">
            Ver Detalhes Completos
          </a>
        </div>
      </div>
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
    // Funções dos modais
    function toggleNewModal() {
      const modal = document.getElementById('newModal');
      modal.classList.toggle('hidden');
    }

    function toggleDetailsModal() {
      const modal = document.getElementById('detailsModal');
      modal.classList.toggle('hidden');
    }

    function showOccurrenceDetails(id, student, studentClass, title, responsible, secretary, socialWorker, description) {
      document.getElementById('occurrenceId').textContent = '#' + id;
      document.getElementById('studentName').textContent = student;
      document.getElementById('studentClass').textContent = studentClass;
      document.getElementById('studentAvatar').src = `https://ui-avatars.com/api/?name=${student.replace(' ', '+')}`;
      document.getElementById('occurrenceDescription').textContent = description;
      document.getElementById('responsibleName').textContent = responsible;
      document.getElementById('secretaryName').textContent = secretary;
      document.getElementById('socialWorkerName').textContent = socialWorker;
      toggleDetailsModal();
    }

    // Funções de Drag and Drop
    function drag(event) {
      event.dataTransfer.setData("text", event.target.dataset.id);
      event.target.classList.add('dragging');
    }

    function dragEnd(event) {
      event.target.classList.remove('dragging');
    }

    function allowDrop(event) {
      event.preventDefault();
      event.currentTarget.classList.add('drag-over');
    }

    function dragLeave(event) {
      event.currentTarget.classList.remove('drag-over');
    }

    function drop(event) {
      event.preventDefault();
      const dropZone = event.currentTarget;
      dropZone.classList.remove('drag-over');
      
      const cardId = event.dataTransfer.getData("text");
      if (!cardId) return; // Previne erro se não houver ID
      
      const card = document.querySelector(`[data-id="${cardId}"]`);
      if (!card) return; // Previne erro se o card não for encontrado
      
      const newStatus = dropZone.dataset.status;
      
      // Atualiza o status visual do card
      const statusBadge = card.querySelector('.rounded-full');
      updateCardStatus(statusBadge, newStatus);
      
      // Move o card para a nova coluna
      dropZone.appendChild(card);
      
      // Aqui você pode adicionar uma chamada para atualizar o status no backend
      console.log(`Card ${cardId} movido para ${newStatus}`);
    }

    function updateCardStatus(badge, status) {
      // Remove classes existentes
      badge.className = 'px-2 py-1 text-xs font-semibold rounded-full';
      
      // Adiciona novas classes baseadas no status
      switch(status) {
        case 'pending':
          badge.classList.add('bg-yellow-100', 'text-yellow-800');
          badge.textContent = 'Novo';
          break;
        case 'in-progress':
          badge.classList.add('bg-blue-100', 'text-blue-800');
          badge.textContent = 'Em Progresso';
          break;
        case 'completed':
          badge.classList.add('bg-green-100', 'text-green-800');
          badge.textContent = 'Resolvido';
          break;
      }
    }
  </script>
@endsection
