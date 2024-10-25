<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Identidad') }}
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

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('identity.update', $identity->id) }}" method="POST" class="w-50 mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="identity_type" class="form-label">Tipo de Identidad</label>
            <input 
                type="text" 
                name="identity_type" 
                id="identity_type" 
                class="form-control @error('identity_type') is-invalid @enderror" 
                value="{{ old('identity_type', $identity->identity_type) }}" 
                required maxlength="20"
            >
            @error('identity_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('identity.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
</x-app-layout>