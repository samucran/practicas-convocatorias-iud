<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Estudios') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    <a href="{{ route('study.create') }}" class="btn btn-primary mb-3">Crear Nuevo Estudio</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hoja de Vida ID</th>
                <th>Institución</th>
                <th>Título</th>
                <th>Año</th>
                <th>Institución Extra</th>
                <th>Título Extra</th>
                <th>Año Extra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studies as $study)
                <tr>
                    <td>{{ $study->id }}</td>
                    <td>{{ $study->curriculum_id }}</td>
                    <td>{{ $study->institution }}</td>
                    <td>{{ $study->title }}</td>
                    <td>{{ $study->year }}</td>
                    <td>{{ $study->institution_extra ?? 'N/A' }}</td>
                    <td>{{ $study->title_extra ?? 'N/A' }}</td>
                    <td>{{ $study->year_extra ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('study.edit', $study->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('study.destroy', $study->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>