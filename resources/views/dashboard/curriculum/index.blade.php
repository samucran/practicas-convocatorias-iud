<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hojas de vida') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('curriculum.create') }}" class="btn btn-primary">Agregar Nuevo Curriculum</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>ID Estudiante</th>
                <th>Perfil Profesional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($curriculums as $curriculum)
                <tr>
                    <td>{{ $curriculum->id }}</td>
                    <td>{{ $curriculum->student->identity_number }}</td>
                    <td>{{ $curriculum->professional_profile ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('curriculum.edit', $curriculum->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('curriculum.destroy', $curriculum->id) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('¿Está seguro que desea eliminar esta hoja de vida?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay hojas de vida registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>