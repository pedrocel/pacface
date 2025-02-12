<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PacFace - Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
        <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Responsáveis
        </a>
        <a href="{{ route('student.document.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Documentos
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Calendário
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Frequência
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Notas
        </a>
        <a href="{{ route('student.courses.index') }}" class="block py-2 px-5 rounded-xl text-lg font-medium bg-red-600 hover:bg-red-500 transition flex items-center justify-center space-x-3 border border-gray-300 shadow-md hover:shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" style="width: 1.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1">
            <path d="M852.727563 392.447107C956.997809 458.473635 956.941389 565.559517 852.727563 631.55032L281.888889 993.019655C177.618644 1059.046186 93.090909 1016.054114 93.090909 897.137364L93.090909 126.860063C93.090909 7.879206 177.675064-35.013033 281.888889 30.977769L852.727563 392.447107 852.727563 392.447107Z"/>
          </svg>
          <!-- Texto do botão -->
          <span class="text-white font-semibold">PacSchool - Play</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
      <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500">Responsáveis</h1>
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
                <li class="py-1 border-b">Lorem Ipsum</li>
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
      @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
<!-- Modal -->
<div id="createResponsibleModal" class="z-50 fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 id="modalTitle" class="text-xl font-semibold mb-4">Cadastrar Responsável</h2>

        <form id="responsibleForm" action="{{ route('student.responsible.store') }}" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="id" id="responsibleId">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="responsible_type_id" class="block text-sm font-medium text-gray-700">Tipo de Responsável</label>
                <select name="responsible_type_id" id="responsible_type_id" required class="mt-1 p-2 border rounded-lg w-full">
                    <option value="" disabled selected>Selecione um tipo</option>
                    @foreach (\App\Models\ResponsibleType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                <input type="text" name="whatsapp" id="whatsapp" required class="mt-1 p-2 border rounded-lg w-full" placeholder="(99) 99999-9999">
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" required class="mt-1 p-2 border rounded-lg w-full" placeholder="000.000.000-00">
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date" name="birthdate" id="birthdate" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(isEdit = false, responsible = null) {
        const modal = document.getElementById('createResponsibleModal');
        const form = document.getElementById('responsibleForm');
        const modalTitle = document.getElementById('modalTitle');
        const formMethod = document.getElementById('formMethod');

        if (isEdit && responsible) {
            modalTitle.textContent = "Editar Responsável";
            form.action = `/student/responsible/${responsible.id}`; // Ajuste a rota para sua API
            formMethod.value = "PUT"; // Para Laravel usar método PUT

            // Preenche os campos
            document.getElementById('responsibleId').value = responsible.id;
            document.getElementById('name').value = responsible.name;
            document.getElementById('email').value = responsible.email;
            document.getElementById('responsible_type_id').value = responsible.responsible_type_id;
            document.getElementById('whatsapp').value = responsible.whatsapp;
            document.getElementById('cpf').value = responsible.cpf;
            document.getElementById('birthdate').value = responsible.birthdate;
        } else {
            modalTitle.textContent = "Cadastrar Responsável";
            form.action = "{{ route('student.responsible.store') }}";
            formMethod.value = "POST";

            // Limpa os campos
            form.reset();
            document.getElementById('responsibleId').value = '';
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>

<!-- Modal de Edição -->
<div id="editResponsibleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Editar Responsável</h2>

        <form id="editResponsibleForm" action="" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="responsible_id" id="edit_responsible_id">

            <div class="mb-4">
                <label for="edit_name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="edit_name" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="edit_email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="edit_email" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="edit_password" class="block text-sm font-medium text-gray-700">Nova Senha (opcional)</label>
                <input type="password" name="password" id="edit_password" class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="edit_responsible_type_id" class="block text-sm font-medium text-gray-700">Tipo de Responsável</label>
                <select name="responsible_type_id" id="edit_responsible_type_id" required class="mt-1 p-2 border rounded-lg w-full">
                    @foreach (\App\Models\ResponsibleType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Salvar</button>
                <button type="button" onclick="closeEditModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
            </div>
        </form>
    </div>
</div>




<!-- Lista de Responsáveis -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card de Criar Novo Responsável -->
    <div onclick="openModal()" class="bg-blue-100 rounded-2xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-blue-200 transition cursor-pointer">
        <div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m-8-8h16" />
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-blue-700 mt-4">Criar Responsável</h3>
    </div>

    @forelse ($responsibles as $responsavel)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition relative">
        <div class="w-24 h-24 mb-4">
            @if ($responsavel->student->facial_image_base64)
                <img src="data:image/png;base64,<?= htmlspecialchars($responsavel->responsible->facial_image_base64) ?>" class="rounded-full object-cover w-full h-full">
            @else
                <img src="https://img.freepik.com/psd-gratuitas/ilustracao-de-icone-de-contacto-isolada_23-2151903337.jpg" class="rounded-full object-cover w-full h-full">
            @endif
        </div>
        <h3 class="text-lg font-semibold text-gray-900">{{ $responsavel->responsible->name }}</h3>
        <p class="text-gray-700 mb-4">{{ $responsavel->responsible->email }}</p>
        
        <!-- Botão de ações -->
        <div class="absolute top-2 right-2">
            <button onclick="toggleDropdown(this)" class="p-2 border border-gray-400 text-gray-700 rounded-full hover:bg-blue-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <circle cx="12" cy="6" r="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <circle cx="12" cy="18" r="2"/>
                </svg>
            </button>

            <!-- Dropdown -->
            <div class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden">
            <button class="edit-responsible" data-responsible='{"id":1,"name":"João Silva","email":"joao@email.com","responsible_type_id":2,"whatsapp":"(99) 99999-9999","cpf":"000.000.000-00","birthdate":"1990-01-01"}'>
    Editar
</button>
                <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 transition">Excluir</button>
            </div>
        </div>
    </div>
@empty
    <p class="text-gray-700 text-center col-span-full">Nenhum responsável encontrado.</p>
@endforelse 
</div>
    </main>
  </div>
  <script>
    function toggleDropdown(button) {
        let dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("createResponsibleModal");
    const form = document.getElementById("responsibleForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const typeInput = document.getElementById("responsible_type_id");
    const whatsappInput = document.getElementById("whatsapp");
    const cpfInput = document.getElementById("cpf");
    const birthdateInput = document.getElementById("birthdate");

    // Verifica todos os botões de edição e adiciona evento de clique
    document.querySelectorAll(".edit-responsible").forEach(button => {
        button.addEventListener("click", function () {
            const responsible = JSON.parse(this.getAttribute("data-responsible"));

            // Preencher os campos do formulário
            nameInput.value = responsible.name || "";
            emailInput.value = responsible.email || "";
            passwordInput.value = ""; // Não carregar senha por segurança
            passwordInput.required = false; // Senha não é obrigatória ao editar
            typeInput.value = responsible.responsible_type_id || "";
            whatsappInput.value = responsible.whatsapp || "";
            cpfInput.value = responsible.cpf || "";
            birthdateInput.value = responsible.birthdate || "";

            // Atualizar a action do formulário para a edição
            form.action = `/responsible/update/${responsible.id}`;
            form.method = "POST";

            // Exibir a modal
            modal.classList.remove("hidden");
        });
    });

    // Função para abrir modal de criação (nova entrada)
    window.openCreateModal = function () {
        // Resetar os campos
        form.reset();
        passwordInput.required = true; // Senha obrigatória na criação
        form.action = "/responsible/store";
        form.method = "POST";

        // Exibir a modal
        modal.classList.remove("hidden");
    };

    // Função para fechar a modal
    window.closeModal = function () {
        modal.classList.add("hidden");
    };
});
</script>

  <script>
    function maskCPF(value) {
        return value.replace(/\D/g, '') // Remove tudo que não é número
                    .replace(/(\d{3})(\d)/, '$1.$2') // Coloca ponto após os 3 primeiros dígitos
                    .replace(/(\d{3})(\d)/, '$1.$2') // Coloca ponto após os 3 seguintes
                    .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca hífen antes dos 2 últimos
    }

    function maskWhatsapp(value) {
        return value.replace(/\D/g, '') // Remove tudo que não é número
                    .replace(/(\d{2})(\d)/, '($1) $2') // Coloca parênteses no DDD
                    .replace(/(\d{5})(\d)/, '$1-$2') // Coloca hífen no número
                    .slice(0, 15); // Limita o tamanho
    }

    document.getElementById('cpf').addEventListener('input', function (e) {
        e.target.value = maskCPF(e.target.value);
    });

    document.getElementById('whatsapp').addEventListener('input', function (e) {
        e.target.value = maskWhatsapp(e.target.value);
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
    function openModal() {
        document.getElementById('createResponsibleModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }
</script>
<script>
    function openEditModal(id, name, email, responsibleTypeId) {
        document.getElementById('edit_responsible_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_responsible_type_id').value = responsibleTypeId;

        document.getElementById('editResponsibleForm').action = `/aluno/responsavel/${id}`;
        document.getElementById('editResponsibleModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editResponsibleModal').classList.add('hidden');
    }
</script>

<script>
    function openModal(isEdit = false, responsible = null) {
        const modal = document.getElementById('createResponsibleModal');
        const form = document.getElementById('responsibleForm');
        const modalTitle = document.getElementById('modalTitle');
        const formMethod = document.getElementById('formMethod');

        if (isEdit && responsible) {
            modalTitle.textContent = "Editar Responsável";
            form.action = `/student/responsible/${responsible.id}`; // Ajuste a rota para sua API
            formMethod.value = "PUT"; // Para Laravel usar método PUT

            // Preenche os campos
            document.getElementById('responsibleId').value = responsible.id;
            document.getElementById('name').value = responsible.name;
            document.getElementById('email').value = responsible.email;
            document.getElementById('responsible_type_id').value = responsible.responsible_type_id;
            document.getElementById('whatsapp').value = responsible.whatsapp;
            document.getElementById('cpf').value = responsible.cpf;
            document.getElementById('birthdate').value = responsible.birthdate;
        } else {
            modalTitle.textContent = "Cadastrar Responsável";
            form.action = "{{ route('student.responsible.store') }}";
            formMethod.value = "POST";

            // Limpa os campos
            form.reset();
            document.getElementById('responsibleId').value = '';
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>
</body>
</html>