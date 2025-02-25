@extends('director.layout')

@section('title', 'Dashboard')

@section('content')

<div class="p-8">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Ponto Digital</h2>
            <div class="flex items-center">
            </div>
        </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6 border border-emerald-100">
                    <div class="text-sm font-medium text-gray-600 mb-1">Presentes Hoje</div>
                    <div class="text-2xl font-bold text-emerald-600">45/50</div>
                    <div class="text-sm text-emerald-500 mt-2">90% presença</div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 border border-red-100">
                    <div class="text-sm font-medium text-gray-600 mb-1">Ausentes</div>
                    <div class="text-2xl font-bold text-gray-900">5</div>
                    <div class="text-sm text-red-500 mt-2">10% ausência</div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 border border-yellow-100">
                    <div class="text-sm font-medium text-gray-600 mb-1">Atrasos</div>
                    <div class="text-2xl font-bold text-gray-900">3</div>
                    <div class="text-sm text-yellow-500 mt-2">6% atrasados</div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 border border-emerald-100">
                    <div class="text-sm font-medium text-gray-600 mb-1">Horas Extras</div>
                    <div class="text-2xl font-bold text-emerald-600">12h</div>
                    <div class="text-sm text-emerald-500 mt-2">Esta semana</div>
                </div>
            </div>

            <!-- Departmental Stats -->
            <div class="bg-white rounded-lg shadow-lg mb-8 border border-emerald-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Estatísticas por Setor</h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- TI -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="font-semibold text-emerald-600 mb-3">TI</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Presença</span>
                                <span class="text-sm font-medium text-emerald-600">95%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Atrasos</span>
                                <span class="text-sm font-medium text-yellow-500">2%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Horas Extras</span>
                                <span class="text-sm font-medium text-emerald-600">8h</span>
                            </div>
                        </div>
                    </div>
                    <!-- RH -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="font-semibold text-emerald-600 mb-3">RH</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Presença</span>
                                <span class="text-sm font-medium text-emerald-600">92%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Atrasos</span>
                                <span class="text-sm font-medium text-yellow-500">5%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Horas Extras</span>
                                <span class="text-sm font-medium text-emerald-600">2h</span>
                            </div>
                        </div>
                    </div>
                    <!-- Comercial -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="font-semibold text-emerald-600 mb-3">Comercial</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Presença</span>
                                <span class="text-sm font-medium text-emerald-600">88%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Atrasos</span>
                                <span class="text-sm font-medium text-yellow-500">8%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Horas Extras</span>
                                <span class="text-sm font-medium text-emerald-600">4h</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Rankings -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Mais Horas Extras -->
                <div class="bg-white rounded-lg shadow-lg border border-emerald-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Top Horas Extras</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">
                                        MS
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Maria Silva</div>
                                        <div class="text-sm text-gray-500">TI</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-emerald-600">15h</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">
                                        JP
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">João Paulo</div>
                                        <div class="text-sm text-gray-500">Comercial</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-emerald-600">12h</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">
                                        AR
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Ana Rodrigues</div>
                                        <div class="text-sm text-gray-500">RH</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-emerald-600">10h</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mais Faltas -->
                <div class="bg-white rounded-lg shadow-lg border border-red-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Mais Faltas (Mês)</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-semibold">
                                        CS
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Carlos Santos</div>
                                        <div class="text-sm text-gray-500">Comercial</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-red-600">4 faltas</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-semibold">
                                        LM
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Lucia Mendes</div>
                                        <div class="text-sm text-gray-500">RH</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-red-600">3 faltas</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-semibold">
                                        RF
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Roberto Ferreira</div>
                                        <div class="text-sm text-gray-500">RH</div>
                                    </div>
                                </div>
                                <div class="text-sm font-semibold text-red-600">2 faltas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Horário de Pico -->
            <div class="bg-white rounded-lg shadow-lg mb-8 border border-emerald-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Horários de Pico</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900 mb-4">Entrada</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="w-20 text-sm text-gray-600">07:30-08:00</div>
                                    <div class="flex-1 h-4 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="w-3/4 h-full bg-emerald-500"></div>
                                    </div>
                                    <div class="w-12 text-sm text-gray-600 text-right">75%</div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-20 text-sm text-gray-600">08:00-08:30</div>
                                    <div class="flex-1 h-4 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="w-1/4 h-full bg-emerald-500"></div>
                                    </div>
                                    <div class="w-12 text-sm text-gray-600 text-right">25%</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900 mb-4">Saída</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="w-20 text-sm text-gray-600">17:30-18:00</div>
                                    <div class="flex-1 h-4 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="w-2/3 h-full bg-emerald-500"></div>
                                    </div>
                                    <div class="w-12 text-sm text-gray-600 text-right">66%</div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-20 text-sm text-gray-600">18:00-18:30</div>
                                    <div class="flex-1 h-4 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="w-1/3 h-full bg-emerald-500"></div>
                                    </div>
                                    <div class="w-12 text-sm text-gray-600 text-right">33%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-lg mb-8 border border-emerald-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Registros Recentes</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colaborador</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horário</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">A</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Ana Silva</div>
                                            <div class="text-sm text-gray-500">ID: 1234</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Entrada</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">08:00</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                        No horário
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">J</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">João Santos</div>
                                            <div class="text-sm text-gray-500">ID: 1235</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Entrada</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">08:15</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Atrasado
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Biometric Reader Status -->
            <div class="bg-white rounded-lg shadow-lg border border-emerald-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Status do Leitor Biométrico</h2>
                </div>
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="h-3 w-3 rounded-full bg-emerald-500"></div>
                        <span class="ml-2 text-sm text-gray-600">Dispositivo ativo e funcionando</span>
                    </div>
                    <div class="mt-4">
                        <div class="text-sm text-gray-500">Último registro:</div>
                        <div class="text-sm font-medium text-emerald-600">Há 2 minutos</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


@endsection
