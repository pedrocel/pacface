<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Gradient Sidebar Layout</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* Gradient background utility */
    .bg-gradient-custom {
      background: linear-gradient(to bottom, #58c5ed, #61e3e8);
    }
  </style>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h1 class="text-xl font-bold text-center mb-6">Menu</h1>
      <nav class="flex flex-col gap-4">
        <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium  hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Responsáveis
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
      <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500">Bem-vindo!</h1>
        <div class="flex items-center gap-4">
          <!-- Notification Icon -->
          <div class="relative">
            <button id="notificationButton" class="relative p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
              </svg>
            </button>
            <div id="notificationModal" class="absolute right-0 mt-2 w-64 bg-white shadow-xl rounded-xl p-4 hidden">
              <h2 class="text-lg font-semibold mb-2">Notificações</h2>
              <ul>
                <li class="py-1 border-b">Nova venda registrada</li>
                <li class="py-1 border-b">Atualização de inventário</li>
                <li class="py-1">Mensagem de cliente</li>
              </ul>
            </div>
          </div>

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
              </ul>
            </div>
          </div>
        </div>
      </header>
      @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
       
        <!-- User Profile Card -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Atualizar Biometria Facial</h1>

    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 text-center">Biometria Facial</h3>

    <!-- Verifica se a imagem facial existe -->
    <div class="text-center mb-4">
        <img id="facialImagePreview" src="{{ $user->facial_image_base64 ? 'data:image/png;base64,' . $user->facial_image_base64 : 'https://via.placeholder.com/128' }}" 
            alt="Imagem Facial" class="mx-auto mb-4 rounded-full w-32 h-32 object-cover">
        
        <p id="statusMessage" class="text-gray-700 dark:text-gray-300 mb-4">
            {{ $user->facial_image_base64 ? 'O usuário já possui uma biometria facial cadastrada.' : 'Nenhuma biometria cadastrada. Faça o upload ou capture uma nova imagem.' }}
        </p>

        <div class="flex justify-center items-center space-x-4">
            <button id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                Fazer Upload da Imagem
            </button>
            <button id="captureButton" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300">
                Tirar Foto com a Câmera
            </button>
        </div>
    </div>

    <!-- Seção de Upload -->
    <div id="uploadSection" class="hidden mt-4">
    <form id="uploadForm" action="{{ route('student.updateImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="facialImageFile" name="facial_image_file" class="mb-2">
        <input type="hidden" id="facialImageBase64" name="facial_image_base64">
        <button type="submit" id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
            Enviar para Análise
        </button>
    </form>
</div>

    <!-- Modal de Captura -->
    <div id="captureModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
            <div class="text-center">
                <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">Capturar Imagem</p>
                <video id="video" width="320" height="240" autoplay></video>
                <button id="snap" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-2">
                    Capturar
                </button>
                <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
                <button id="save" onclick="saveImage()" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300 mt-2 hidden">
                    Salvar
                </button>
                <button id="closeModal" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300 mt-2">
                    Fechar
                </button>
            </div>
        </div>
    </div>
  </div>

        <!-- Address and Phone Cards -->
        <div class="p-6 bg-white rounded-2xl shadow-xl">
          <h2 class="text-xl font-semibold mb-4 text-blue-500">Endereços</h2>
          <ul class="list-disc ml-4">
            @forelse ($user->addresses ?? [] as $address)
              <li>{{ $address->street ?? 'Endereço não disponível' }}</li>
            @empty
              <li>Nenhum endereço encontrado.</li>
            @endforelse
          </ul>
        </div>

        <div class="p-6 bg-white rounded-2xl shadow-xl">
          <h2 class="text-xl font-semibold mb-4 text-blue-500">Telefones</h2>
          <ul class="list-disc ml-4">
            @forelse ($user->phones ?? [] as $phone)
              <li>{{ $phone->number ?? 'Telefone não disponível' }}</li>
            @empty
              <li>Nenhum telefone encontrado.</li>
            @endforelse
          </ul>
        </div>
      </div>
    </main>
  </div>

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
    </script>
</body>

</html>
