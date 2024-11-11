<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos Los Archivos') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('file.create') }}" class="btn btn-primary">Crear Nuevo Archivo</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Documento de Identidad</th>
                <th>Certificado de Salud</th>
                <th>Hoja de Vida Institucional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>

                    <td>
                        @if ($file->identity_document)
                            <a href="{{ Storage::url($file->identity_document) }}" target="_blank">Ver Documento</a>
                        @else
                            N/A
                        @endif
                    </td>

                    <td>
                        @if ($file->health_certificate)
                            <a href="{{ Storage::url($file->health_certificate) }}" target="_blank">Ver Certificado</a>
                        @else
                            N/A
                        @endif
                    </td>

                    <td>
                        @if ($file->institutional_resume)
                            <a href="{{ Storage::url($file->institutional_resume) }}" target="_blank">Ver Hoja de Vida</a>
                        @else
                            N/A
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('file.edit', $file->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('file.destroy', $file->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Esta seguro que quiere eliminar este archivo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No se han creado archivos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>