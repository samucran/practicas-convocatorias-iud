<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Convocatorias') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('convocation.create') }}" class="btn btn-primary">Agregar Nueva Convocation</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tiene Agencia</th>
                <th>Fecha Inicio</th>
                <th>Fecha Cierre</th>
                <th>ID Modalidad</th>
                <th>ID Agencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($convocations as $convocation)
                <tr>
                    <td>{{ $convocation->id }}</td>
                    <td>{{ $convocation->has_agency ? 'Sí' : 'No' }}</td>
                    <td>{{ $convocation->start_date }}</td>
                    <td>{{ $convocation->end_date }}</td>
                    <td>{{ $convocation->modality_id ?? 'N/A' }}</td>
                    <td>{{ $convocation->agency_id ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('convocation.edit', $convocation) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('convocation.destroy', $convocation) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('¿Está seguro que desea eliminar esta convocatoria?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay convocatorias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
</x-app-layout>