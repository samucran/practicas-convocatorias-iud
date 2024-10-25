<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Localidad') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
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
            <input type="text" class="form-control" name="country" value="{{ old('country', $locality->country) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="state">Departamento</label>
            <input type="text" class="form-control" name="state" value="{{ old('state', $locality->state) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="city">Municipio</label>
            <input type="text" class="form-control" name="city" value="{{ old('city', $locality->city) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="neighborhood">Barrio</label>
            <input type="text" class="form-control" name="neighborhood" value="{{ old('neighborhood', $locality->neighborhood) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" name="address" value="{{ old('address', $locality->address) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="additional_info">Información Adicional</label>
            <input type="text" class="form-control" name="additional_info" value="{{ old('additional_info', $locality->additional_info) }}">
        </div>

        <button type="submit" class="btn btn-warning">Actualizar Localidad</button>
        <a href="{{ route('locality.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>