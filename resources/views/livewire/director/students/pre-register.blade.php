<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" wire:model="cpf" id="cpf">
            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <hr>

    <h3>Lista de Pré-Registros</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->cpf }}</td>
                    <td>{{ $student->status ? 'Ativo' : 'Inativo' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>
