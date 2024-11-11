<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Idioma') }}
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
    <form action="{{ route('languageLevel.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="curriculum_id">ID Hoja de Vida</label>
            <select class="form-control" id="curriculum_id" name="curriculum_id" required>
                <option value="">Seleccione un ID de Estudiante</option>
                @foreach ($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="primary_language">Idioma Primario</label>
            <input type="text" class="form-control" id="primary_language" name="primary_language" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="primary_language_level">Nivel de Idioma Primario</label>
            <select class="form-control" id="primary_language_level" name="primary_language_level" required>
                <option value="">Seleccione un Nivel</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="secondary_language">Idioma Secundario (Opcional)</label>
            <input type="text" class="form-control" id="secondary_language" name="secondary_language" maxlength="20">
        </div>
        <div class="form-group">
            <label for="secondary_language_level">Nivel de Idioma Secundario (Opcional)</label>
            <select class="form-control" id="secondary_language_level" name="secondary_language_level">
                <option value="">Seleccione un Nivel</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="extra_language">Idioma Extra (Opcional)</label>
            <input type="text" class="form-control" id="extra_language" name="extra_language" maxlength="20">
        </div>
        <div class="form-group">
            <label for="extra_language_level">Nivel de Idioma Extra (Opcional)</label>
            <select class="form-control" id="extra_language_level" name="extra_language_level">
                <option value="">Seleccione un Nivel</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('languageLevel.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>