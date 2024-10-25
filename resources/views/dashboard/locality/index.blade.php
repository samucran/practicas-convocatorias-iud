<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Localidades') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('locality.create') }}" class="btn btn-primary">Agregar Nueva Localidad</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Barrio</th>
                <th>Dirección</th>
                <th>Informacion adicional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($localities as $locality)
                <tr>
                    <td>{{ $locality->id }}</td>
                    <td>{{ $locality->country }}</td>
                    <td>{{ $locality->state }}</td>
                    <td>{{ $locality->city }}</td>
                    <td>{{ $locality->neighborhood }}</td>
                    <td>{{ $locality->address }}</td>
                    <td>{{ $locality->additional_info }}</td>
                    <td>
                        <a href="{{ route('locality.edit', $locality->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('locality.destroy', $locality->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Está seguro de que desea eliminar esta localidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay localidades registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>