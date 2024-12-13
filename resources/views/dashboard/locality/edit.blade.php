<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Localidad') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('locality.update', $locality->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="country">País</label>
                <select name="country_id" id="country" class="form-control" required>
                    <option value="">Seleccione un país</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="state">Departamento/Estado</label>
                <select name="state_id" id="state" class="form-control" disabled>
                    <option value="">Seleccione una opcion</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="city">Municipio/Ciudad</label>
                <select name="city_id" id="city" class="form-control" disabled>
                    <option value="">Seleccione una opcion</option>
                </select>
            </div>

            <div class="form-group mb-3">
            <label for="neighborhood">Barrio</label>
            <input type="text" name="neighborhood" class="form-control" value="{{ old('neighborhood', $locality->neighborhood) }}" required>
            </div>

            <div class="form-group mb-3">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $locality->address) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Localidad</button>
            <a href="{{ route('locality.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</x-app-layout>
