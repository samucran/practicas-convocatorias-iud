<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Facultad') }}
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

    <form action="{{ route('faculty.store') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="faculty_name" class="form-label">Nombre Facultad</label>
            <input 
                type="text" 
                name="faculty_name" 
                id="faculty_name" 
                class="form-control @error('faculty_name') is-invalid @enderror" 
                value="{{ old('faculty_name') }}" 
                required maxlength="50"
            >
            @error('faculty_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('faculty.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
</x-app-layout>