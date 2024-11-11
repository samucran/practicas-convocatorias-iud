<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Estudio') }}
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

    <form action="{{ route('study.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="curriculum_id">ID Hoja de Vida</label>
            <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                <option value="">Seleccione una hoja de vida</option>
                @foreach($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="institution">Institución</label>
            <input type="text" name="institution" class="form-control" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" maxlength="20" required>
        </div>

        <div class="form-group">
            <label for="year">Año</label>
            <input type="date" name="year" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="institution_extra">Institución Extra</label>
            <input type="text" name="institution_extra" class="form-control" maxlength="50">
        </div>

        <div class="form-group">
            <label for="title_extra">Título Extra</label>
            <input type="text" name="title_extra" class="form-control" maxlength="20">
        </div>

        <div class="form-group">
            <label for="year_extra">Año Extra</label>
            <input type="date" name="year_extra" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('study.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>