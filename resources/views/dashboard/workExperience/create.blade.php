<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Experiencia Laboral') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('workExperience.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="curriculum_id" class="form-label">ID Hoja de Vida</label>
            <select class="form-control" id="curriculum_id" name="curriculum_id" required>
                <option value="">Seleccione una hoja de vida</option>
                @foreach ($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Compañía</label>
            <input type="text" class="form-control" id="company" name="company" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="position" name="position" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Tiempo</label>
            <input type="text" class="form-control" id="duration" name="duration" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha Inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('workExperience.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>