<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Reconocimiento') }}
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

    <form action="{{ route('recognition.update', $recognition->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="curriculum_id" class="form-label">ID Hoja de Vida</label>
            <select name="curriculum_id" class="form-select" required>
                @foreach($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}" 
                        {{ $curriculum->id == $recognition->curriculum_id ? 'selected' : '' }}>
                        {{ $curriculum->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" maxlength="50" 
                   value="{{ $recognition->name }}">
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Cargo</label>
            <input type="text" name="position" class="form-control" maxlength="20" 
                   value="{{ $recognition->position }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" maxlength="20" 
                   value="{{ $recognition->phone }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('recognition.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>