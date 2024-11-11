<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas las Formaciones Complementarias') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <a href="{{ route('complementaryStudy.create') }}" class="btn btn-primary">Crear Nueva Formacion Complementaria</a>
    
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hoja de vida ID</th>
                <th>Nombre</th>
                <th>Institución</th>
                <th>Intensidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complementaryStudies as $study)
            <tr>
                <td>{{ $study->id }}</td>
                <td>{{ $study->curriculum_id }}</td>
                <td>{{ $study->name ?? 'N/A' }}</td>
                <td>{{ $study->institution ?? 'N/A' }}</td>
                <td>{{ $study->intensity ?? 'N/A' }}</td>
                <td>{{ $study->date ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('complementaryStudy.edit', $study->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('complementaryStudy.destroy', $study->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudio complementario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>