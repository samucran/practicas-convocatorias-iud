<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos Los Estudiantes') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('student.create') }}" class="btn btn-primary">Crear Nuevo Estudiante</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>ID Identidad</th>
                <th>Numero Identidad</th>
                <th>Correo Institucional</th>
                <th>Correo Personal</th>
                <th>Numero Celular</th>
                <th>ID Localidad</th>
                <th>ID Programa</th>
                <th>ID Archivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->second_name ?? 'N/A' }}</td>
                    <td>{{ $student->first_surname }}</td>
                    <td>{{ $student->second_surname ?? 'N/A' }}</td>
                    <td>{{ $student->identity->id }}</td>
                    <td>{{ $student->identity_number }}</td>
                    <td>{{ $student->institutional_email }}</td>
                    <td>{{ $student->personal_email }}</td>
                    <td>{{ $student->phone_number ?? 'N/A' }}</td>
                    <td>{{ $student->locality->id }}</td>
                    <td>{{ $student->program->id }}</td>
                    <td>{{ $student->file->id }}</td>
                    <td>{{ $student->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('student.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Esta seguro que quiere eliminar este estudiante?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="15" class="text-center">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>