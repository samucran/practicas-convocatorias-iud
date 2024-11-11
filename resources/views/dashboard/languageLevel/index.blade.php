<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Idiomas') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('languageLevel.create') }}" class="btn btn-primary">Agregar Nuevo Idioma</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Hoja de Vida ID</th>
                <th>Idioma Primario</th>
                <th>Nivel Primario</th>
                <th>Idioma Secundario</th>
                <th>Nivel Secundario</th>
                <th>Idioma Extra</th>
                <th>Nivel Extra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($languageLevels as $level)
                <tr>
                    <td>{{ $level->id }}</td>
                    <td>{{ $level->curriculum_id }}</td>
                    <td>{{ $level->primary_language }}</td>
                    <td>{{ $level->primary_language_level }}</td>
                    <td>{{ $level->secondary_language ?? 'N/A' }}</td>
                    <td>{{ $level->secondary_language_level ?? 'N/A' }}</td>
                    <td>{{ $level->extra_language ?? 'N/A' }}</td>
                    <td>{{ $level->extra_language_level ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('languageLevel.edit', $level->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('languageLevel.destroy', $level->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este nivel de idioma?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>