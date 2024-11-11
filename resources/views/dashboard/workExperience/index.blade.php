<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas las Experiencias Laborales') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('workExperience.create') }}" class="btn btn-primary">Agregar Nueva Experiencia Laboral</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Hoja de Vida</th>
                    <th>Compañía</th>
                    <th>Cargo</th>
                    <th>Tiempo</th>
                    <th>Teléfono</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workExperiences as $experience)
                    <tr>
                        <td>{{ $experience->id }}</td>
                        <td>{{ $experience->curriculum_id }}</td>
                        <td>{{ $experience->company ?? 'N/A' }}</td>
                        <td>{{ $experience->position ?? 'N/A' }}</td>
                        <td>{{ $experience->duration ?? 'N/A' }}</td>
                        <td>{{ $experience->phone ?? 'N/A' }}</td>
                        <td>{{ $experience->start_date ?? 'N/A' }}</td>
                        <td>{{ $experience->end_date ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('workExperience.edit', $experience->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('workExperience.destroy', $experience->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>