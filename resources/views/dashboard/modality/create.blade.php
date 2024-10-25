<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Modalidad') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('modality.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="modality_name" class="form-label">Nombre de la Modalidad</label>
            <input type="text" class="form-control @error('modality_name') is-invalid @enderror" 
                   id="modality_name" name="modality_name" value="{{ old('modality_name') }}">
            @error('modality_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('modality.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>