<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PacTime - Sistema de Ponto Digital Empresarial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <!-- Header/Navigation -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 relative">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <nav class="container mx-auto px-6 py-4 relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span class="ml-2 text-2xl font-bold text-white">PacTime</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#recursos" class="text-white hover:text-blue-200">Recursos</a>
                    <a href="#planos" class="text-white hover:text-blue-200">Planos</a>
                    <a href="#app" class="text-white hover:text-blue-200">App</a>
                    <a href="#contato" class="text-white hover:text-blue-200">Contato</a>
                    <a href="landing" class="text-white hover:text-blue-200">PACSAFE EDU</a>
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition">Entrar</a>
                </div>  
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-6 py-20 relative">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                        Transformamos seu controle de ponto em algo simples
                    </h1>
                    <p class="text-blue-100 text-xl mb-8">
                        Junte-se a milhares de empresas que já simplificaram sua gestão de ponto em menos de 5 minutos 😉
                    </p>
                    <div class="bg-white p-6 rounded-lg shadow-xl max-w-md">
                        <h3 class="text-gray-800 font-semibold mb-4">Comece Gratuitamente</h3>
                        <form class="space-y-4">
                            <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <input type="tel" placeholder="Telefone" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <input type="text" placeholder="Nome da Empresa" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <input type="text" placeholder="CNPJ" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <button class="w-full bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300">
                                Acessar Gratuitamente
                            </button>
                        </form>
                    </div>
                </div>
                <div class="md:w-1/2 mt-10 md:mt-0">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80" 
                         alt="Dashboard PacTime" 
                         class="rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </header>

    <!-- Rating Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <div class="flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <p class="text-xl text-gray-600">Somos uma plataforma avaliada com 5 estrelas pelos clientes no Google.</p>
        </div>
    </section>

    <!-- Features Grid -->
    <section id="recursos" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">
                Recursos Principais
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 p-4 rounded-full mb-6 w-16 h-16 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Acompanhamento em tempo real</h3>
                    <p class="text-gray-600">Monitore a presença dos colaboradores instantaneamente.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 p-4 rounded-full mb-6 w-16 h-16 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Painel com gráficos</h3>
                    <p class="text-gray-600">Visualize dados importantes em gráficos intuitivos.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 p-4 rounded-full mb-6 w-16 h-16 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Geolocalização</h3>
                    <p class="text-gray-600">Registre pontos com localização precisa.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 p-4 rounded-full mb-6 w-16 h-16 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Alertas inteligentes</h3>
                    <p class="text-gray-600">Receba notificações sobre divergências.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="planos" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">
                Planos do PacTime
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Premium Plan -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold mb-4">Premium</h3>
                    <p class="text-4xl font-bold mb-6">R$89<span class="text-lg text-gray-600">/mês</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Sem limite de funcionários
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Geolocalização
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Banco de horas
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white rounded-lg py-3 font-semibold hover:bg-blue-700 transition">
                        Começar Grátis
                    </button>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white rounded-2xl shadow-xl p-8 transform scale-105 border-2 border-blue-500">
                    <div class="absolute top-0 right-0 bg-blue-500 text-white px-4 py-1 rounded-bl-lg rounded-tr-lg">
                        Popular
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <p class="text-4xl font-bold mb-6">R$159<span class="text-lg text-gray-600">/mês</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Tudo do Premium
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Implantação personalizada
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Suporte prioritário
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white rounded-lg py-3 font-semibold hover:bg-blue-700 transition">
                        Começar Grátis
                    </button>
                </div>

                <!-- Corporate Plan -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold mb-4">Corporate</h3>
                    <p class="text-2xl font-bold mb-6">Personalizado</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Tudo do Enterprise
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Suporte ao funcionário
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Implantação completa
                        </li>
                    </ul>
                    <button class="w-full bg-gray-800 text-white rounded-lg py-3 font-semibold hover:bg-gray-900 transition">
                        Solicitar Orçamento
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- App Section -->
    <section id="app" class="py-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6">App disponível para seus colaboradores</h2>
                    <p class="text-gray-600 text-lg mb-8">
                        Permita que seus funcionários registrem o ponto e acompanhem a jornada de trabalho diretamente pelo celular.
                    </p>
                    <div class="flex space-x-4">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&q=80" 
                             alt="App Store" 
                             class="h-12 w-auto">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&q=80" 
                             alt="Google Play" 
                             class="h-12 w-auto">
                    </div>
                </div>
                <div class="md:w-1/2 mt-10 md:mt-0">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&q=80" 
                         alt="PacTime App" 
                         class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features List -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">
                Funcionalidades disponíveis em todos os planos
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Registro de ponto por app ou web</span>
                </div>
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Registro de Ponto Off-line</span>
                </div>
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Ausentes/Presentes em tempo real</span>
                </div>
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Cadastro de Escalas</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contato" class="py-20">
        <div class="container mx-auto px-6">
            <div class="bg-blue-600 rounded-xl p-8 md:p-12 shadow-xl">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white mb-8">
                        Comece a usar o PacTime hoje mesmo
                    </h2>
                    <p class="text-blue-100 mb-8 text-lg">
                        Entre em contato para uma demonstração gratuita
                    </p>
                    <button class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300">
                        Solicitar Demo
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span class="ml-2 text-2xl font-bold">PacTime</span>
                    </div>
                    <p class="text-gray-400">
                        Sua solução completa para controle de ponto digital.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Links Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#recursos" class="text-gray-400 hover:text-white">Recursos</a></li>
                        <li><a href="#planos" class="text-gray-400 hover:text-white">Planos</a></li>
                        <li><a href="#app" class="text-gray-400 hover:text-white">Baixar App</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Suporte</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Central de Ajuda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contato</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Termos de Uso</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Privacidade</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Compliance</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; © 2025 PACTIME. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>