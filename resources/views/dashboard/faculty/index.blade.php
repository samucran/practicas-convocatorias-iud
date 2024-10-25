<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Facultades') }}
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
        <a href="{{ route('faculty.create') }}" class="btn btn-primary">Agregar Nueva Facultad</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre Facultad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
            <tr>
                <td>{{ $faculty->id }}</td>
                <td>{{ $faculty->faculty_name }}</td>
                <td>
                    <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST" class="d-inline-block" 
                          onsubmit="return confirm('¿Está seguro que desea eliminar esta facultad?')">
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
</x-app-layout>