<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estudio') }}
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

    <form action="{{ route('study.update', $study->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="curriculum_id">ID Hoja de Vida</label>
            <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                <option value="">Seleccione una hoja de vida</option>
                @foreach($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}" {{ $study->curriculum_id == $curriculum->id ? 'selected' : '' }}>{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="institution">Institución</label>
            <input type="text" name="institution" class="form-control" value="{{ $study->institution }}" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" value="{{ $study->title }}" maxlength="20" required>
        </div>

        <div class="form-group">
            <label for="year">Año</label>
            <input type="date" name="year" class="form-control" value="{{ $study->year }}" required>
        </div>

        <div class="form-group">
            <label for="institution_extra">Institución Extra</label>
            <input type="text" name="institution_extra" class="form-control" value="{{ $study->institution_extra }}" maxlength="50">
        </div>

        <div class="form-group">
            <label for="title_extra">Título Extra</label>
            <input type="text" name="title_extra" class="form-control" value="{{ $study->title_extra }}" maxlength="20">
        </div>

        <div class="form-group">
            <label for="year_extra">Año Extra</label>
            <input type="date" name="year_extra" class="form-control" value="{{ $study->year_extra }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('study.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>