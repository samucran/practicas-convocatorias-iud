<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos Los Programas') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('program.create') }}" class="btn btn-primary">Agregar Nuevo Programa</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Perfil</th>
                <th>Facultad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($programs as $program)
                <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->program_name }}</td>
                    <td>{{ $program->program_profile }}</td>
                    <td>{{ $program->faculty->faculty_name }}</td>
                    <td>
                        <a href="{{ route('program.edit', $program) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('program.destroy', $program) }}" method="POST" class="d-inline-block" 
                              onsubmit="return confirm('¿Está seguro de que desea eliminar este programa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay programas registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>