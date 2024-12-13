<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Relaciones') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('convocationRelation.create') }}" class="btn btn-primary">Agregar Nueva Relacion</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Convocatoria</th>
                <th>ID Estudiante</th>
                <th>Fecha Semestre</th>
                <th>Práctica Obligatoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relations as $relation)
                <tr>
                    <td>{{ $relation->id }}</td>
                    <td>{{ $relation->convocation->id }}</td>
                    <td>{{ $relation->student->identity_number }}</td>
                    <td>{{ $relation->semester_date }}</td>
                    <td>{{ $relation->mandatory_practice ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('convocationRelation.edit', $relation) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('convocationRelation.destroy', $relation) }}" method="POST" style="display: inline;" 
                              onsubmit="return confirm('¿Está seguro que desea eliminar esta relación de convocatoria? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>