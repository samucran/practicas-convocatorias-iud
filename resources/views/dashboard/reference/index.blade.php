<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas las Referencias') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('reference.create') }}" class="btn btn-primary">Agregar Nueva Referencia</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Hoja de Vida ID</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($references as $reference)
                <tr>
                    <td>{{ $reference->id }}</td>
                    <td>{{ $reference->curriculum_id }}</td>
                    <td>{{ $reference->name }}</td>
                    <td>{{ $reference->position }}</td>
                    <td>{{ $reference->phone }}</td>
                    <td>
                        <a href="{{ route('reference.edit', $reference->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('reference.destroy', $reference->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar esta referencia personal?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>