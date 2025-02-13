<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacsafe - Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="bg-[url('https://wallpapers.com/images/hd/green-gradient-background-1080-x-1920-1d34ljvp9yi0en92.jpg')] w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h2 class="text-xl text-white font-bold mb-8">Escola Municipal Zumbi dos Palmares</h2>
      <nav>

        <ul>
          <li class="mb-4">
            <a href="{{ route('student.dashboard') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.dashboard'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.dashboard'))
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
            <a href="{{ route('student.profile.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.profile.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.profile.index'))
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
            <a href="{{ route('student.responsible.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.responsible.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.responsible.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Responsaveis
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
        <section class="relative pt-8  pb-24">
        <img src="https://pagedone.io/asset/uploads/1705473908.png" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
        <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500 "></h1>
        <div class="flex items-center gap-4 ">
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
      </header>
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-center sm:justify-start relative mb-5">
              @if ($user->facial_image_base64)
              <img src="{{ $user->facial_image_base64 ? 'data:image/png;base64,' . $user->facial_image_base64 : 'https://via.placeholder.com/128' }}" alt="Imagem Facial"
                    class="border-4 border-solid border-white rounded-full object-cover rounded-full w-40 h-40">
              @else
              <img src="https://cdn-icons-png.flaticon.com/512/8489/8489214.png" alt="Imagem Facial"
                    class="border-4 border-solid border-white rounded-full object-cover rounded-full w-40 h-40">
              @endif
              
            </div>
            <div class="flex items-center justify-center flex-col sm:flex-row max-sm:gap-5 sm:justify-between mb-5">
              
            <div class="grid grid-cols-1 gap-3 text-sm">
                <h3 class="font-manrope font-bold text-4xl text-gray-900 mb-1 max-sm:text-center">{{$user->name}}</h3>


                @if (!$user->facial_image_base64)
                <button id="openModal" 
                    class="py-3.5 px-5 flex rounded-full bg-orange-500 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-orange-600">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Biometria Facial - Pendente de envio</span>
                </button>
                <button id="openModal" 
                    class="py-3.5 px-5 flex rounded-full bg-red-500 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-red-600">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Biometria Facial - Imagem recusada</span>
                </button>
                @elseif($user->facial_image_base64)
                <button id="openModal" 
                    class="py-3.5 px-5 flex rounded-full bg-green-500 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-green-600">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Biometria Facial - Verificada</span>
                </button>
                @endif
                <!-- WhatsApp -->
                <div class="flex items-center justify-between bg-green-50 p-2 rounded-lg border border-green-300">
                      <div class="flex items-center">
                          <i class="fab fa-whatsapp text-green-500 text-lg mr-2"></i>
                          <div>
                              <label class="text-gray-600 text-xs">WhatsApp</label>
                              <p class="text-gray-900 font-medium">{{ $user->whatsapp ?? 'Não informado' }}</p>
                          </div>
                      </div>
                      <i class="fas fa-pencil-alt text-gray-500 cursor-pointer" onclick="openEditModal('whatsapp')"></i>
                  </div>

                  <!-- CPF -->
                  <div class="flex items-center justify-between bg-gray-50 p-2 rounded-lg border border-gray-300">
                      <div class="flex items-center">
                          <i class="fas fa-id-card text-gray-500 text-lg mr-2"></i>
                          <div>
                              <label class="text-gray-600 text-xs">CPF</label>
                              <p class="text-gray-900 font-medium">{{ $user->cpf ?? 'Não informado' }}</p>
                          </div>
                      </div>
                      <i class="fas fa-pencil-alt text-gray-500 cursor-pointer" onclick="openEditModal('cpf')"></i>
                  </div>

                  <!-- Data de Nascimento -->
                  <div class="flex items-center justify-between bg-blue-50 p-2 rounded-lg border border-blue-300">
                      <div class="flex items-center">
                          <i class="fas fa-birthday-cake text-blue-500 text-lg mr-2"></i>
                          <div>
                              <label class="text-gray-600 text-xs">Data de Nascimento</label>
                              <p class="text-gray-900 font-medium">
                                  {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : 'Não informado' }}
                              </p>
                          </div>
                      </div>
                      <i class="fas fa-pencil-alt text-gray-500 cursor-pointer" onclick="openEditModal('birth_date')"></i>
                  </div>

                  <!-- Emancipado -->
                  <div class="flex items-center justify-between bg-yellow-50 p-2 rounded-lg border border-yellow-300">
                      <div class="flex items-center">
                          <i class="fas fa-user-shield text-yellow-500 text-lg mr-2"></i>
                          <div>
                              <label class="text-gray-600 text-xs">Emancipado</label>
                              <p class="text-gray-900 font-medium">
                                  {{ $user->is_emancipated ? 'Sim' : 'Não' }}
                              </p>
                          </div>
                      </div>
                      <i class="fas fa-pencil-alt text-gray-500 cursor-pointer" onclick="openEditModal('is_emancipated')"></i>
                  </div>
                 
              </div>
            </div>
            <div class="flex max-sm:flex-wrap max-sm:justify-center items-center gap-4">
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">Ux Research</a>
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">CX Strategy</a>
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">Project Manager</a>
            </div>
        </div>
    </section>

    </main>

    <!-- Modal Principal -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-lg font-bold">&times;</button>
            <h1 class="text-2xl text-center font-bold text-blue-600 mb-4">Atualizar Biometria Facial</h1>
            <h3 class="text-lg font-medium text-gray-900 text-center">Biometria Facial</h3>
            <p id="statusMessage" class="text-gray-700 mb-4">
                -
            </p>
            <button id="captureButton" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                Tirar Foto com a Câmera
            </button>
        </div>
    </div>

<!-- Modal de captura de imagem -->
<div id="captureModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-4 rounded-md w-96">
        <div class="relative">
            <!-- Vídeo de captura -->
            <video id="video" class="rounded w-full mb-4" autoplay></video>
            <!-- Canvas para exibir a imagem capturada -->
            <canvas id="canvas" class="hidden rounded w-full mb-4"></canvas>
            
            <!-- Botões de controle -->
            <div class="flex justify-center space-x-4">
                <button id="snap" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Tirar Foto
                </button>
                <button id="retake" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-yellow-300 hidden">
                    Tirar Outra Foto
                </button>
                <button id="save" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300 hidden">
                    Salvar
                </button>
            </div>
        </div>

        <!-- Formulário de envio -->
        <form id="uploadForm" action="{{ route('student.updateImage') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" id="facialImageFile" name="facial_image_file" class="mb-2 hidden">
            <input type="hidden" id="facialImageBase64" name="facial_image_base64">
            <button type="submit" id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 hidden">
                Enviar para Análise
            </button>
        </form>

        <!-- Fechar Modal -->
        <button id="closeModal" class="absolute top-2 right-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Pré-visualização da imagem capturada -->
<!-- <img id="facialImagePreview" class="mt-4 w-32 h-32 object-cover rounded-full border" src="" alt="Imagem Capturada"> -->


  </div>
   <script>
    // Toggle profile dropdown
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
    </script>
    <script>
 // Abrir modal de captura
document.getElementById('captureButton').addEventListener('click', () => {
    const captureModal = document.getElementById('captureModal');
    const video = document.getElementById('video');

    // Remover controles e configurar autoplay
    video.removeAttribute('controls');
    video.setAttribute('autoplay', true);
    video.setAttribute('playsinline', true); // Evita tela cheia em dispositivos móveis

    captureModal.classList.remove('hidden');

    // Ativar a câmera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Erro ao acessar a câmera:', error);
            Swal.fire('Erro!', 'Não foi possível acessar a câmera. Verifique as permissões.', 'error');
        });
});

// Capturar imagem da câmera
document.getElementById('snap').addEventListener('click', () => {
    const canvas = document.getElementById('canvas');
    const video = document.getElementById('video');
    const saveButton = document.getElementById('save');
    const snapButton = document.getElementById('snap');
    const retakeButton = document.getElementById('retake');

    // Captura a imagem do vídeo e desenha no canvas
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

    // Ocultar o vídeo (desativar câmera)
    const stream = video.srcObject;
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    video.classList.add('hidden');

    // Exibir o botão "Salvar" e "Tirar outra foto"
    saveButton.classList.remove('hidden');
    retakeButton.classList.remove('hidden');
    snapButton.classList.add('hidden');

    canvas.classList.remove('hidden');
});

// Reativar câmera para tirar outra foto
document.getElementById('retake').addEventListener('click', () => {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const saveButton = document.getElementById('save');
    const snapButton = document.getElementById('snap');
    const retakeButton = document.getElementById('retake');

    // Limpar canvas e ocultar novamente
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
    canvas.classList.add('hidden');

    // Ocultar botões de salvar e refazer, exibir "Tirar foto"
    saveButton.classList.add('hidden');
    retakeButton.classList.add('hidden');
    snapButton.classList.remove('hidden');

    // Reativar câmera
    video.classList.remove('hidden');
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Erro ao acessar a câmera:', error);
            Swal.fire('Erro!', 'Não foi possível acessar a câmera. Verifique as permissões.', 'error');
        });
});

// Salvar a imagem capturada em Base64 e enviar o formulário
document.getElementById('save').addEventListener('click', () => {
    const canvas = document.getElementById('canvas');
    const base64Image = canvas.toDataURL('image/png').split(',')[1];

    // Preencher o campo hidden com a imagem em Base64
    const facialImageBase64Input = document.getElementById('facialImageBase64');
    facialImageBase64Input.value = base64Image;

    // Atualizar a visualização da imagem
    const facialImagePreview = document.getElementById('facialImagePreview');
    facialImagePreview.src = `data:image/png;base64,${base64Image}`;

    // Enviar o formulário de upload
    const uploadForm = document.getElementById('uploadForm');
    uploadForm.submit();

    // Fechar modal
    const captureModal = document.getElementById('captureModal');
    captureModal.classList.add('hidden');

    Swal.fire('Sucesso!', 'Imagem capturada e enviada com sucesso!', 'success');
});

// Fechar o modal de captura
document.getElementById('closeModal').addEventListener('click', () => {
    const captureModal = document.getElementById('captureModal');
    const video = document.getElementById('video');
    const stream = video.srcObject;

    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    captureModal.classList.add('hidden');
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
// Referências dos elementos
const facialImageInput = document.getElementById('facialImage');
const facialPreview = document.getElementById('facialPreview');
const facialImageForm = document.getElementById('facialImageForm');
const facialImageBase64Input = document.createElement('input');

// Configurar campo oculto para armazenar Base64
facialImageBase64Input.type = 'hidden';
facialImageBase64Input.name = 'facial_image_base64';
facialImageForm.appendChild(facialImageBase64Input);

// Função para pré-visualizar a imagem e definir valor Base64
facialImageInput.addEventListener('change', function (event) {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      facialPreview.src = e.target.result;

      // Armazena o Base64 sem o prefixo "data:image/png;base64,"
      facialImageBase64Input.value = e.target.result.split(',')[1];
    };

    reader.readAsDataURL(file);
  }
});

// Substituir o envio padrão do formulário
facialImageForm.addEventListener('submit', function (event) {
  event.preventDefault();

  if (!facialImageBase64Input.value) {
    Swal.fire({
      icon: 'warning',
      title: 'Atenção',
      text: 'Por favor, selecione uma imagem válida antes de enviar!'
    });
    return;
  }

  // Simulação de envio
  fetch(facialImageForm.action, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      facial_image_base64: facialImageBase64Input.value
    })
  })
  .then(response => response.json())
  .then(data => {
    Swal.fire({
      icon: 'success',
      title: 'Sucesso',
      text: 'Imagem enviada com sucesso!'
    });
  })
  .catch(error => {
    alert(error);
    Swal.fire({
      icon: 'error',
      title: 'Erro',
      text: 'Falha ao enviar a imagem!'
    });
  });
});


  </script>
  
  <script>
        // Exibir Upload Section
        document.getElementById('uploadButton').addEventListener('click', () => {
            document.getElementById('uploadSection').classList.toggle('hidden');
        });

        // Capturar Imagem com Câmera
        const captureModal = document.getElementById('captureModal');
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snapButton = document.getElementById('snap');
        const saveButton = document.getElementById('save');

        document.getElementById('captureButton').addEventListener('click', () => {
            captureModal.classList.remove('hidden');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    video.srcObject = stream;
                    video.play();
                });
        });

        // Captura a imagem
        snapButton.addEventListener('click', () => {
            canvas.classList.remove('hidden');
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            saveButton.classList.remove('hidden');
        });

        // Salva a imagem capturada em base64
        function saveImage() {
            const base64Image = canvas.toDataURL('image/png').split(',')[1];
            document.getElementById('facialImageBase64').value = base64Image;
            document.getElementById('facialImagePreview').src = `data:image/png;base64,${base64Image}`;
            captureModal.classList.add('hidden');
            Swal.fire('Sucesso!', 'Imagem capturada com sucesso!', 'success');
        }

        // Fecha o modal
        document.getElementById('closeModal').addEventListener('click', () => {
            captureModal.classList.add('hidden');
        });

        // Função para fazer upload e converter em base
        
    </script>
        <script>
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('facialImageFile');
    const base64Input = document.getElementById('facialImageBase64');

    uploadForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const file = fileInput.files[0];
        if (!file) {
            Swal.fire('Erro!', 'Selecione uma imagem primeiro!', 'error');
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const base64Image = e.target.result.split(',')[1];
            base64Input.value = base64Image;

            // Envia o formulário após a conversão
            uploadForm.submit();
        };
        reader.readAsDataURL(file);
    });
</script>
    <script>
    document.getElementById("openModal").addEventListener("click", function() {
        document.getElementById("modal").classList.remove("hidden");
    });

    document.getElementById("closeModal").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
    });

    window.addEventListener("click", function(event) {
        let modal = document.getElementById("modal");
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
</script>
</body>
</html>
