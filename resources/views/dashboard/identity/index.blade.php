<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Identidades') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('identity.create') }}" class="btn btn-primary">Agregar Nueva Identidad</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tipo de Identidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($identities as $identity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $identity->identity_type }}</td>
                    <td>
                        <a href="{{ route('identity.edit', $identity->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('identity.destroy', $identity->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('¿Está seguro que desea eliminar este tipo de identidad?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay tipos de identidad registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>