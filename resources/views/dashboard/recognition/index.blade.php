<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Reconocimientos') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('recognition.create') }}" class="btn btn-primary">Agregar Nuevo Reconocimiento</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>ID Hoja de Vida</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recognitions as $recognition)
                <tr>
                    <td>{{ $recognition->id }}</td>
                    <td>{{ $recognition->curriculum_id }}</td>
                    <td>{{ $recognition->name }}</td>
                    <td>{{ $recognition->position }}</td>
                    <td>{{ $recognition->phone ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('recognition.edit', $recognition->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('recognition.destroy', $recognition->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('¿Está seguro que desea eliminar este reconocimiento?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay reconocimientos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>