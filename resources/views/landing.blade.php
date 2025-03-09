<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PACSAFE EDU - Controle Inteligente de Presença Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#059669',
              secondary: '#0284c7',
            },
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
          }
        }
      }
    </script>
    <style type="text/tailwindcss">
      body {
        font-family: 'Inter', sans-serif;
      }
      .hero-gradient {
        background: linear-gradient(rgba(5, 150, 105, 0.9), rgba(5, 150, 105, 0.8)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
      }
      .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      }
      .testimonial-gradient {
        background: linear-gradient(90deg, #f0fdf4 0%, #dcfce7 100%);
      }
      .stats-gradient {
        background: linear-gradient(rgba(5, 150, 105, 0.05), rgba(5, 150, 105, 0.1));
      }
      .scroll-animation {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
      }
      .scroll-animation.active {
        opacity: 1;
        transform: translateY(0);
      }
      .blob-animation {
        animation: blob 7s infinite;
      }
      @keyframes blob {
        0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
      }
    </style>
  </head>
  <body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0 flex items-center">
              <span class="text-primary font-bold text-2xl">PACSAFE EDU</span>
            </div>
          </div>
          <div class="hidden md:flex items-center space-x-8">
            <a href="#inicio" class="text-gray-700 hover:text-primary font-medium">Início</a>
            <a href="#presenca" class="text-gray-700 hover:text-primary font-medium">Presença</a>
            <a href="#notificacoes" class="text-gray-700 hover:text-primary font-medium">Notificações</a>
            <a href="#merenda" class="text-gray-700 hover:text-primary font-medium">Merenda</a>
            <a href="#perfis" class="text-gray-700 hover:text-primary font-medium">Perfis</a>
            <a href="pactime" class="text-gray-700 hover:text-primary font-medium">Ponto Digital</a>
            <a href="#depoimentos" class="text-gray-700 hover:text-primary font-medium">Depoimentos</a>
            <a href="#faq" class="text-gray-700 hover:text-primary font-medium">FAQ</a>
            <a href="#contato" class="text-gray-700 hover:text-primary font-medium">Contato</a>
            <a href="{{ route('login') }}" class="text-primary hover:text-gray-700 font-medium">Entrar</a>
          </div>
          <div class="md:hidden flex items-center">
            <button class="text-gray-700 hover:text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="hero-gradient pt-24 pb-16 md:pt-32 md:pb-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <div class="md:w-1/2 text-white">
            <div class="inline-block px-3 py-1 bg-white/20 rounded-full text-white text-sm font-semibold mb-4 backdrop-blur-sm">
              Tecnologia de ponta para escolas
            </div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">Controle Inteligente de Presença Escolar</h1>
            <p class="text-lg md:text-xl mb-8">Sistema avançado de reconhecimento facial para otimizar a gestão da merenda escolar e acompanhamento da frequência dos alunos, garantindo melhor aproveitamento dos recursos e comunicação efetiva com as famílias.</p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
              <a href="#recursos" class="bg-white text-primary font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-100 transition duration-300 text-center">Conhecer Recursos</a>
              <a href="#contato" class="border-2 border-white text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-primary transition duration-300 text-center">Fale Conosco</a>
            </div>
          </div>
          <div class="md:w-1/2 mt-10 md:mt-0">
            <div class="relative">
              <div class="absolute -top-4 -left-4 w-24 h-24 bg-secondary/30 rounded-full blur-xl"></div>
              <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-primary/30 rounded-full blur-xl"></div>
              <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Escola com tecnologia" class="rounded-lg shadow-xl relative z-10">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-8 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
          <div class="stats-gradient p-6 rounded-xl text-center">
            <div class="text-3xl md:text-4xl font-bold text-primary mb-2">98%</div>
            <p class="text-gray-600">Redução de faltas não reportadas</p>
          </div>
          <div class="stats-gradient p-6 rounded-xl text-center">
            <div class="text-3xl md:text-4xl font-bold text-primary mb-2">85%</div>
            <p class="text-gray-600">Menos desperdício de merenda</p>
          </div>
          <div class="stats-gradient p-6 rounded-xl text-center">
            <div class="text-3xl md:text-4xl font-bold text-primary mb-2">+500</div>
            <p class="text-gray-600">Escolas utilizando</p>
          </div>
          <div class="stats-gradient p-6 rounded-xl text-center">
            <div class="text-3xl md:text-4xl font-bold text-primary mb-2">+1M</div>
            <p class="text-gray-600">Alunos beneficiados</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Presença Section -->
    <section id="presenca" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Controle de Presença</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Controle de Presença Inteligente</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Sistema avançado de reconhecimento facial para controle preciso da frequência escolar.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Reconhecimento Facial</h3>
            <p class="text-gray-600">Tecnologia de ponta para identificação rápida e precisa dos alunos na entrada da escola.</p>
          </div>
          
          <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Registro Automático</h3>
            <p class="text-gray-600">Registro automático de presença com hora exata de entrada e saída dos alunos.</p>
          </div>
          
          <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Relatórios Detalhados</h3>
            <p class="text-gray-600">Geração de relatórios completos de frequência para acompanhamento pedagógico.</p>
          </div>
          
          <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Notificações Automáticas</h3>
            <p class="text-gray-600">Envio de alertas para responsáveis sobre ausências e atrasos dos alunos.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Como Funciona Section -->
    <section class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Processo Simplificado</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Como Funciona</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Entenda como o PACSAFE EDU transforma a gestão escolar em poucos passos.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-xl shadow-md relative">
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl">1</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4 mt-4 text-center">Instalação do Sistema</h3>
            <p class="text-gray-600">Instalamos câmeras com tecnologia de reconhecimento facial nos pontos de entrada da escola.</p>
          </div>
          
          <div class="bg-white p-8 rounded-xl shadow-md relative">
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl">2</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4 mt-4 text-center">Cadastro dos Alunos</h3>
            <p class="text-gray-600">Realizamos o cadastro dos alunos no sistema, incluindo dados biométricos e informações de contato dos responsáveis.</p>
          </div>
          
          <div class="bg-white p-8 rounded-xl shadow-md relative">
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl">3</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4 mt-4 text-center">Monitoramento Automático</h3>
            <p class="text-gray-600">O sistema passa a registrar automaticamente a presença dos alunos e enviar notificações conforme configurado.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Notificações Section -->
    <section id="notificacoes" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <div class="md:w-1/2 pr-8">
            <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Comunicação Eficiente</div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Notificações Automáticas</h2>
            <p class="text-lg text-gray-600 mb-8">Sistema inteligente de alertas para garantir o acompanhamento efetivo da frequência escolar.</p>
            
            <div class="space-y-6">
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Alerta de Faltas Consecutivas</h3>
                  <p class="mt-2 text-gray-600">Notificação automática após 3 faltas consecutivas para responsáveis e agentes sociais.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Monitoramento Mensal</h3>
                  <p class="mt-2 text-gray-600">Aviso automático quando o aluno atinge 20% de faltas no mês.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Comunicação Integrada</h3>
                  <p class="mt-2 text-gray-600">Integração com serviços sociais e programa Bolsa Família para acompanhamento efetivo.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Múltiplos Canais</h3>
                  <p class="mt-2 text-gray-600">Notificações via SMS, e-mail e aplicativo para garantir que a informação chegue aos responsáveis.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="md:w-1/2 mt-10 md:mt-0">
            <div class="relative">
              <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/20 rounded-full blur-xl"></div>
              <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Notificações" class="rounded-lg shadow-xl relative z-10">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- App Preview Section -->
    <section class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Aplicativo Mobile</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Acompanhamento em Tempo Real</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Acesse todas as informações do seu filho diretamente pelo seu smartphone.</p>
        </div>
        
        <div class="md:flex md:items-center md:justify-between">
          <div class="md:w-1/2 md:order-2 md:pl-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Aplicativo PACSAFE para Responsáveis</h3>
            <p class="text-lg text-gray-600 mb-6">Tenha acesso a todas as informações sobre a presença do seu filho na escola, diretamente no seu celular.</p>
            
            <div class="space-y-6">
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h4 class="text-lg font-semibold text-gray-900">Registro de Entrada e Saída</h4>
                  <p class="mt-1 text-gray-600">Receba notificações em tempo real quando seu filho entrar ou sair da escola.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h4 class="text-lg font-semibold text-gray-900">Histórico de Frequência</h4>
                  <p class="mt-1 text-gray-600">Visualize o histórico completo de presença, faltas e atrasos.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h4 class="text-lg font-semibold text-gray-900">Calendário Escolar</h4>
                  <p class="mt-1 text-gray-600">Acesse o calendário escolar com eventos, feriados e datas importantes.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h4 class="text-lg font-semibold text-gray-900">Comunicação Direta</h4>
                  <p class="mt-1 text-gray-600">Comunique-se diretamente com a escola através do aplicativo.</p>
                </div>
              </div>
            </div>
            
            <div class="mt-8 flex space-x-4">
              <a href="#" class="flex items-center justify-center px-4 py-3 bg-black text-white rounded-lg">
                <svg class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.5,12.5c0-0.9,0.5-1.7,1.3-2.2c-0.5-0.7-1.2-1.3-2.1-1.6c-0.9-0.3-1.7-0.4-2.5-0.4c-1.1,0-2.2,0.3-3.1,0.8c-0.9,0.5-1.6,1.2-2.1,2.1c-0.5,0.9-0.8,1.9-0.8,3c0,1.1,0.3,2.1,0.8,3c0.5,0.9,1.2,1.6,2.1,2.1c0.9,0.5,1.9,0.8,3.1,0.8c1.1,0,2.2-0.3,3.1-0.8c0.9-0.5,1.6-1.2,2.1-2.1c0.5-0.9,0.8-1.9,0.8-3C19.9,14.2,19,12.9,17.5,12.5z M12,19.1c-2.8,0-5.1-2.3-5.1-5.1S9.2,8.9,12,8.9s5.1,2.3,5.1,5.1S14.8,19.1,12,19.1z"></path>
                  <path d="M12,4.9c-5,0-9.1,4.1-9.1,9.1s4.1,9.1,9.1,9.1s9.1-4.1,9.1-9.1S17,4.9,12,4.9z M12,21.1c-3.9,0-7.1-3.2-7.1-7.1s3.2-7.1,7.1-7.1s7.1,3.2,7.1,7.1S15.9,21.1,12,21.1z"></path>
                </svg>
                App Store
              </a>
              <a href="#" class="flex items-center justify-center px-4 py-3 bg-black text-white rounded-lg">
                <svg class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M3.5,20.5c0.2,0.3,0.5,0.5,0.9,0.5h15.2c0.4,0,0.7-0.2,0.9-0.5l3-5.2c0.2-0.3,0.2-0.7,0-1l-3-5.2C20.3,8.7,20,8.5,19.6,8.5H4.4C4,8.5,3.7,8.7,3.5,9L0.5,14.2c-0.2,0.3-0.2,0.7,0,1L3.5,20.5z"></path>
                  <path d="M7.5,15.5L9,18l1.5-2.5L12,18l1.5-2.5L15,18l1.5-2.5"></path>
                </svg>
                Google Play
              </a>
            </div>
          </div>
          
          <div class="md:w-1/2 md:order-1 mt-10 md:mt-0">
            <div class="relative">
              <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
              <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="App Preview" class="relative z-10 rounded-lg shadow-xl mx-auto md:mx-0">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Merenda Section -->
    <section id="merenda" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <div class="md:w-1/2 md:order-2 md:pl-8">
            <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Otimização de Recursos</div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Gestão Inteligente da Merenda</h2>
            <p class="text-lg text-gray-600 mb-8">Otimização do preparo e distribuição da merenda escolar com base na presença real dos alunos.</p>
            
            <div class="space-y-6">
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Planejamento Preciso</h3>
                  <p class="mt-2 text-gray-600">Cálculo automático da quantidade de alimentos necessária com base na presença real.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Controle de Estoque</h3>
                  <p class="mt-2 text-gray-600">Gestão eficiente do estoque de alimentos e previsão de compras.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Relatórios de Consumo</h3>
                  <p class="mt-2 text-gray-600">Acompanhamento detalhado do consumo e redução do desperdício.</p>
                </div>
              </div>
              
              <div class="flex">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-semibold text-gray-900">Redução de Custos</h3>
                  <p class="mt-2 text-gray-600">Economia significativa de recursos com planejamento baseado em dados reais.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="md:w-1/2 md:order-1 mt-10 md:mt-0">
            <div class="relative">
              <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/20 rounded-full blur-xl"></div>
              <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Merenda Escolar" class="rounded-lg shadow-xl relative z-10">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Perfis Section -->
    <section id="perfis" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Acesso Personalizado</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Perfis do Sistema</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Acesso personalizado para cada tipo de usuário do sistema.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Servidores</h3>
            <p class="text-gray-600 text-center">Gestão administrativa e relatórios gerais</p>
          </div>
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Professores</h3>
            <p class="text-gray-600 text-center">Acompanhamento de frequência e desempenho</p>
          </div>
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Agentes Sociais</h3>
            <p class="text-gray-600 text-center">Monitoramento e intervenção social</p>
          </div>
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Estudantes</h3>
            <p class="text-gray-600 text-center">Acompanhamento de aulas, faltas e atividades</p>
          </div>
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Responsáveis</h3>
            <p class="text-gray-600 text-center">Acompanhamento dos alunos</p>
          </div>
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Nutricionistas</h3>
            <p class="text-gray-600 text-center">Gestão da merenda escolar</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Depoimentos Section -->
    <section id="depoimentos" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Casos de Sucesso</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">O que Dizem Nossos Clientes</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Veja como o PACSAFE EDU está transformando a gestão escolar em todo o Brasil.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="testimonial-gradient p-8 rounded-xl shadow-md">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">M</div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">Maria Silva</h3>
                <p class="text-gray-600">Diretora Escolar</p>
              </div>
            </div>
            <p class="text-gray-700">"O PACSAFE EDU revolucionou nossa gestão escolar. Reduzimos o desperdício de merenda em 80% e melhoramos significativamente a comunicação com os pais."</p>
          </div>
          
          <div class="testimonial-gradient p-8 rounded-xl shadow-md">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">J</div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">João Pereira</h3>
                <p class="text-gray-600">Secretário de Educação</p>
              </div>
            </div>
            <p class="text-gray-700">"Implementamos o PACSAFE EDU em toda a rede municipal e os resultados são impressionantes. A evasão escolar reduziu 45% em apenas um semestre."</p>
          </div>
          
          <div class="testimonial-gradient p-8 rounded-xl shadow-md">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">A</div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">Ana Oliveira</h3>
                <p class="text-gray-600">Mãe de Aluno</p>
              </div>
            </div>
            <p class="text-gray-700">"Como mãe, me sinto muito mais segura sabendo exatamente quando meu filho chega e sai da escola. O aplicativo é intuitivo e as notificações são instantâneas."</p>
          </div>
        </div>
      </div>
    </section>

    <section id="ponto" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">
            Gestão de Pessoal
          </div>
          <br>
          <a href="pactime" class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Ponto Digital Facial
          </a>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-6">
            Sistema avançado de registro de ponto através de reconhecimento facial.
          </p>
          <a href="pactime" class="px-6 py-3 bg-primary text-white rounded-lg shadow-md hover:bg-primary/90 transition duration-300">
            Experimente Agora
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Registro Automático</h3>
            <p class="text-gray-600 text-center">Registro de ponto através de reconhecimento facial, eliminando fraudes.</p>
          </div>
          
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Relatórios Completos</h3>
            <p class="text-gray-600 text-center">Geração automática de relatórios de ponto, horas extras e compensações.</p>
          </div>
          
          <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">Notificações</h3>
            <p class="text-gray-600 text-center">Avisos automáticos sobre irregularidades e ajustes necessários.</p>
          </div>
        </div>
      </div>
    </section>
    

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-block px-3 py-1 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-4">Dúvidas Frequentes</div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Perguntas Frequentes</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Encontre respostas para as dúvidas mais comuns sobre o PACSAFE EDU.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Como é feito o reconhecimento facial?</h3>
            <p class="text-gray-600">Utilizamos tecnologia avançada de reconhecimento facial que identifica os alunos com precisão superior a 99,5%, mesmo com mudanças de aparência como cortes de cabelo ou uso de óculos.</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Quanto tempo leva para implementar o sistema?</h3>
            <p class="text-gray-600">A implementação completa leva em média 2 semanas, incluindo instalação dos equipamentos, treinamento da equipe e cadastro dos alunos no sistema.</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">O sistema funciona sem internet?</h3>
            <p class="text-gray-600">Sim, o sistema pode funcionar offline e sincronizar os dados quando a conexão for restabelecida, garantindo que nenhuma informação seja perdida.</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Como é garantida a segurança dos dados?</h3>
            <p class="text-gray-600">Todos os dados são criptografados e armazenados em servidores seguros, em conformidade com a LGPD e outras regulamentações de proteção de dados.</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">O sistema é compatível com outros softwares escolares?</h3>
            <p class="text-gray-600">Sim, o PACSAFE EDU possui APIs que permitem integração com os principais sistemas de gestão escolar do mercado.</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Qual o custo de implementação?</h3>
            <p class="text-gray-600">O custo varia de acordo com o tamanho da escola e os módulos contratados. Entre em contato conosco para uma avaliação personalizada e proposta comercial.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contato" class="py-16 bg-primary">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <div class="md:w-1/2 text-white">
            <div class="inline-block px-3 py-1 bg-white/20 rounded-full text-white text-sm font-semibold mb-4 backdrop-blur-sm">Fale Conosco</div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Entre em Contato</h2>
            <p class="text-lg mb-8">Solicite uma demonstração do PACSAFE EDU para sua escola.</p>
            
            <div class="space-y-4 mb-8">
              <div class="flex items-center">
                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <span>(11) 4321-1234</span>
              </div>
              
              <div class="flex items-center">
                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <span>contato@pacsafeedu.com.br</span>
              </div>
              
              <div class="flex items-center">
                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <span>Av. Paulista, 1000 - São Paulo, SP</span>
              </div>
            </div>
          </div>
          
          <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <form>
              <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
              </div>
              
              <div class="mb-4">
                <label for="school" class="block text-sm font-medium text-gray-700 mb-1">Nome da Escola</label>
                <input type="text" id="school" name="school" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
              </div>
              
              <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
              </div>
              
              <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
              </div>
              
              <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensagem</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
              </div>
              
              <button type="submit" class="w-full bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-primary/90 transition duration-300">Solicitar Demonstração</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          <div>
            <span class="text-2xl font-bold">PACSAFE EDU</span>
            <p class="text-gray-400 mt-2">Sistema avançado de reconhecimento facial para gestão escolar.</p>
            <div class="flex space-x-4 mt-4">
              <a href="#" class="text-gray-400 hover:text-white">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Recursos</h3>
            <ul class="space-y-2">
              <li><a href="#presenca" class="text-gray-400 hover:text-white">Controle de Presença</a></li>
              <li><a href="#notificacoes" class="text-gray-400 hover:text-white">Notificações</a></li>
              <li><a href="#merenda" class="text-gray-400 hover:text-white">Gestão de Merenda</a></li>
              <li><a href="#ponto" class="text-gray-400 hover:text-white">Ponto Digital</a></li>
            </ul>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Empresa</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white">Sobre Nós</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Carreiras</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Parceiros</a></li>
            </ul>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Suporte</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white">Central de Ajuda</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Documentação</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Status do Sistema</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Contato</a></li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400">© 2025 PACSAFE EDU. Todos os direitos reservados.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
              <a href="#" class="text-gray-400 hover:text-white">Termos de Uso</a>
              <a href="#" class="text-gray-400 hover:text-white">Política de Privacidade</a>
              <a href="#" class="text-gray-400 hover:text-white">Cookies</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll Animation Script -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const scrollElements = document.querySelectorAll('.scroll-animation');
        
        const elementInView = (el, dividend = 1) => {
          const elementTop = el.getBoundingClientRect().top;
          return (
            elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
          );
        };
        
        const displayScrollElement = (element) => {
          element.classList.add('active');
        };
        
        const handleScrollAnimation = () => {
          scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
              displayScrollElement(el);
            }
          });
        };
        
        window.addEventListener('scroll', () => {
          handleScrollAnimation();
        });
        
        // Initialize on page load
        handleScrollAnimation();
      });
    </script>
  </body>
</html>