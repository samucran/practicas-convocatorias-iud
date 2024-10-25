<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas Las Agencias') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('agency.create') }}" class="btn btn-primary">Agregar Nueva Agencia</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre Agencia</th>
                    <th>Nombre Contacto</th>
                    <th>Correo Contacto</th>
                    <th>Teléfono Contacto</th>
                    <th>Cargo Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agencies as $agency)
                    <tr class="text-center align-middle">
                        <td>{{ $agency->id }}</td>
                        <td>{{ $agency->agency_name ?? 'N/A' }}</td>
                        <td>{{ $agency->contact_name ?? 'N/A' }}</td>
                        <td>{{ $agency->contact_email ?? 'N/A' }}</td>
                        <td>{{ $agency->contact_phone ?? 'N/A' }}</td>
                        <td>{{ $agency->contact_role ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('agency.edit', $agency->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('agency.destroy', $agency->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Está seguro que desea eliminar esta agencia?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay agencias registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>
</x-app-layout>