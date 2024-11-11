<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Reconocimiento') }}
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

    <form action="{{ route('recognition.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="curriculum_id" class="form-label">ID Hoja de Vida</label>
            <select name="curriculum_id" class="form-select" required>
                <option value="">Seleccione una hoja de vida</option>
                @foreach($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Cargo</label>
            <input type="text" name="position" class="form-control" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" maxlength="20">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('recognition.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>