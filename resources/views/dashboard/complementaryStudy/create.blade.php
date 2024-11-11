<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Formacion Complementaria') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    
    <form action="{{ route('complementaryStudy.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="curriculum_id">Curriculum ID</label>
            <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                <option value="">Selecciona una hoja de vida</option>
                @foreach ($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="50" placeholder="Nombre del estudio">
        </div>

        <div class="form-group">
            <label for="institution">Institución</label>
            <input type="text" name="institution" id="institution" class="form-control" maxlength="50" placeholder="Institución">
        </div>

        <div class="form-group">
            <label for="intensity">Intensidad</label>
            <input type="text" name="intensity" id="intensity" class="form-control" maxlength="20" placeholder="Intensidad">
        </div>

        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('complementaryStudy.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>