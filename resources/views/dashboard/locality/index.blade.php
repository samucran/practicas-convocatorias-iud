<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Localidades') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <a href="{{ route('locality.create') }}" class="btn btn-primary mb-3">Crear Nueva Localidad</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>País</th>
                    <th>Departamento/Estado</th>
                    <th>Municipio/Ciudad</th>
                    <th>Barrio</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($localities as $locality)
                    <tr>
                        <td>{{ $locality->id }}</td>
                        <td>{{ $locality->country }}</td>
                        <td>{{ $locality->state }}</td>
                        <td>{{ $locality->city }}</td>
                        <td>{{ $locality->neighborhood }}</td>
                        <td>{{ $locality->address }}</td>
                        <td>
                            <a href="{{ route('locality.edit', $locality->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('locality.destroy', $locality->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta localidad?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay localidades registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        
    </div>
</x-app-layout>