<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-lg leading-tight">
            Detalhes da Organização
        </h2>
    </x-slot>
    <div class="container mx-4">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m-4-4h2m8 0h2m-6-4h2m-6 0H8m4-4h2M6 20h12m-3-10V8a2 2 0 012-2h2m-2 4h2a2 2 0 012 2v4a2 2 0 01-2 2h-2m-8-6h2m4 0h2M6 6h2" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl block text-gray-700 font-medium">{{ $organization->name }}</h3>
                    <p class="text-gray-600">Quantidade de Usuários: {{ $organization->users->count() }}</p>
                </div> 
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg block text-gray-700 dark:text-gray-200 font-medium">Usuários da Organização</h3>
                <button id="openModalButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Adicionar Novo Usuário
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($organization->users as $user)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="bg-blue-100 text-blue-500 p-3 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196a9 9 0 01-13.758 11.608z" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">{{ $user->name }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                        </div>
                        <a href="{{ route('admin.users.show', $user) }}" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                            Ver Detalhes
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="userModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Criar Novo Usuário</h3>
                <button id="closeModalButton" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.users.store', $organization->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-200 font-medium">Nome</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 dark:text-gray-200 font-medium">Senha</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 dark:text-gray-200 font-medium">Confirme a Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="profile_id" class="block text-gray-700 dark:text-gray-200 font-medium">Perfil</label>
                    <select name="profile_id" id="profile_id" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                        @endforeach
                    </select>
                    @error('profile_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                        Salvar
                    </button>
                    <button type="button" id="cancelModalButton" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const cancelModalButton = document.getElementById('cancelModalButton');
        const userModal = document.getElementById('userModal');

        openModalButton.addEventListener('click', function () {
            userModal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', function () {
            userModal.classList.add('hidden');
        });

        cancelModalButton.addEventListener('click', function () {
            userModal.classList.add('hidden');
        });

        // Fechar o modal ao clicar fora dele
        window.addEventListener('click', function (event) {
            if (event.target === userModal) {
                userModal.classList.add('hidden');
            }
        });
    });
</script>