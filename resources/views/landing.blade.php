<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACSAFE EDU - Sistema de Presença Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-emerald-900 to-green-700 text-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-emerald-900/30 backdrop-blur-lg border-b border-emerald-600/30">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span class="text-xl font-bold">PACSAFE EDU</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#inicio" class="hover:text-emerald-400 transition-colors">Início</a>
                    <a href="#presenca" class="hover:text-emerald-400 transition-colors">Presença</a>
                    <a href="#notificacoes" class="hover:text-emerald-400 transition-colors">Notificações</a>
                    <a href="#merenda" class="hover:text-emerald-400 transition-colors">Merenda</a>
                    <a href="#perfis" class="hover:text-emerald-400 transition-colors">Perfis</a>
                    <a href="#ponto" class="hover:text-emerald-400 transition-colors">Ponto Digital</a>
                </div>
                <a href="/login" class="bg-emerald-600 hover:bg-emerald-700 px-6 py-2 rounded-full transition-colors">
                    Portal Docente
                </a>
                <a href="/login" class="bg-emerald-600 hover:bg-emerald-700 px-6 py-2 rounded-full transition-colors">
                    Portal Aluno
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                        Controle Inteligente de Presença Escolar
                    </h1>
                    <p class="text-lg text-emerald-200">
                        Sistema avançado de reconhecimento facial para otimizar a gestão da merenda escolar e 
                        acompanhamento da frequência dos alunos, garantindo melhor aproveitamento dos recursos e 
                        comunicação efetiva com as famílias.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#recursos" class="bg-emerald-600 hover:bg-emerald-700 px-8 py-3 rounded-full transition-colors inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                            Conhecer Recursos
                        </a>
                        <a href="#contato" class="bg-white/10 hover:bg-white/20 px-8 py-3 rounded-full transition-colors backdrop-blur-sm inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                            </svg>
                            Fale Conosco
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <img src="https://i.ibb.co/5WGC4Vr6/265114fb-a541-4d9d-ab76-9f0f82248167.webp" 
                         alt="Escola com tecnologia" 
                         class="relative rounded-3xl shadow-2xl border border-emerald-600/30 backdrop-blur-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- Controle de Presença Section -->
    <section id="presenca" class="py-20 bg-emerald-900/30">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Controle de Presença Inteligente</h2>
                <p class="text-emerald-200 max-w-2xl mx-auto">
                    Sistema avançado de reconhecimento facial para controle preciso da frequência escolar.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Reconhecimento Facial</h3>
                    <p class="text-emerald-200">
                        Tecnologia de ponta para identificação rápida e precisa dos alunos na entrada da escola.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Registro Automático</h3>
                    <p class="text-emerald-200">
                        Registro automático de presença com hora exata de entrada e saída dos alunos.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Relatórios Detalhados</h3>
                    <p class="text-emerald-200">
                        Geração de relatórios completos de frequência para acompanhamento pedagógico.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notificações Automáticas Section -->
    <section id="notificacoes" class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h2 class="text-3xl md:text-4xl font-bold">Notificações Automáticas</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Alerta de Faltas Consecutivas</h3>
                                <p class="text-emerald-200">Notificação automática após 3 faltas consecutivas para responsáveis e agentes sociais.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"/>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Monitoramento Mensal</h3>
                                <p class="text-emerald-200">Aviso automático quando o aluno atinge 20% de faltas no mês.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Comunicação Integrada</h3>
                                <p class="text-emerald-200">Integração com serviços sociais e programa Bolsa Família para acompanhamento efetivo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <img src="https://i.ibb.co/ynrBZMDG/8914df38-4081-47e6-9a57-0228380316a1.webp" 
                         alt="Notificações" 
                         class="relative rounded-3xl shadow-2xl border border-emerald-600/30 backdrop-blur-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- Gestão de Merenda Section -->
    <section id="merenda" class="py-20 bg-emerald-900/30">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Gestão Inteligente da Merenda</h2>
                <p class="text-emerald-200 max-w-2xl mx-auto">
                    Otimização do preparo e distribuição da merenda escolar com base na presença real dos alunos.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 2h16a2 2 0 0 1 2 2v2H1V4a2 2 0 0 1 2-2z"/>
                            <path d="M1 9h20v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9z"/>
                            <path d="M8 13h8"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Planejamento Preciso</h3>
                    <p class="text-emerald-200">
                        Cálculo automático da quantidade de alimentos necessária com base na presença real.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Controle de Estoque</h3>
                    <p class="text-emerald-200">
                        Gestão eficiente do estoque de alimentos e previsão de compras.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Relatórios de Consumo</h3>
                    <p class="text-emerald-200">
                        Acompanhamento detalhado do consumo e redução do desperdício.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Perfis do Sistema Section -->
    <section id="perfis" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Perfis do Sistema</h2>
                <p class="text-emerald-200 max-w-2xl mx-auto">
                    Acesso personalizado para cada tipo de usuário do sistema.
                </p>
            </div>
            <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-8">
                <!-- Servidores Públicos -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Servidores Públicos</h3>
                    <p class="text-emerald-200 text-sm">Gestão administrativa e relatórios gerais</p>
                </div>

                <!-- Professores -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Professores</h3>
                    <p class="text-emerald-200 text-sm">Acompanhamento de frequência e desempenho</p>
                </div>

                <!-- Agentes Sociais -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/>
                            <path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Agentes Sociais</h3>
                    <p class="text-emerald-200 text-sm">Monitoramento e intervenção social</p>
                </div>

                <!-- Servidores Bolsa Família -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="3" rx="2"/>
                            <line x1="2" x2="22" y1="9" y2="9"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Bolsa Família</h3>
                    <p class="text-emerald-200 text-sm">Acompanhamento de beneficiários</p>
                </div>

                <!-- Responsáveis -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Responsáveis</h3>
                    <p class="text-emerald-200 text-sm">Acompanhamento dos alunos</p>
                </div>

                <!-- Nutricionistas -->
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-emerald-600/30 text-center">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 2h16a2 2 0 0 1 2 2v2H1V4a2 2 0 0 1 2-2z"/>
                            <path d="M1 9h20v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9z"/>
                            <path d="M8 13h8"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Nutricionistas</h3>
                    <p class="text-emerald-200 text-sm">Gestão da merenda escolar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ponto Digital Section -->
    <section id="ponto" class="py-20 bg-emerald-900/30">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&q=80" 
                         alt="Ponto Digital" 
                         class="relative rounded-3xl shadow-2xl border border-emerald-600/30 backdrop-blur-sm">
                </div>
                <div class="space-y-8">
                    <h2 class="text-3xl md:text-4xl font-bold">Ponto Digital Facial</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="m9 12 2 2 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Registro Automático</h3>
                                <p class="text-emerald-200">Registro de ponto através de reconhecimento facial, eliminando fraudes.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M3 9h18"/>
                                    <path d="M9 21V9"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Gestão de Horários </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"/>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Relatórios Completos</h3>
                                <p class="text-emerald-200">Geração automática de relatórios de ponto, horas extras e compensações.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Notificações</h3>
                                <p class="text-emerald-200">Avisos automáticos sobre irregularidades e ajustes necessários.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contato" class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Entre em Contato</h2>
                <p class="text-emerald-200 mb-8">
                    Solicite uma demonstração do PACSAFE EDU para sua escola.
                </p>
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-emerald-600/30">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-emerald-200 mb-2">Nome da Escola</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-emerald-900/30 border border-emerald-600/30 text-white placeholder-emerald-400/70 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-emerald-200 mb-2">E-mail</label>
                                <input type="email" class="w-full px-4 py-2 rounded-lg bg-emerald-900/30 border border-emerald-600/30 text-white placeholder-emerald-400/70 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-emerald-200 mb-2">Mensagem</label>
                            <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-emerald-900/30 border border-emerald-600/30 text-white placeholder-emerald-400/70 focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 px-8 py-3 rounded-full transition-colors">
                            Solicitar Demonstração
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 border-t border-emerald-600/30">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span class="text-xl font-bold">PACSAFE EDU</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-emerald-400 hover:text-emerald-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-emerald-400 hover:text-emerald-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                        </svg>
                    </a>
                    <a href="#" class="text-emerald-400 hover:text-emerald-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="text-emerald-200">&copy; 2025 PACSAFE EDU. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>