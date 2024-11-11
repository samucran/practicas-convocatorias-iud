<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Formacion Complementaria') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
    
    <form action="{{ route('complementaryStudy.update', $complementaryStudy->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="curriculum_id">Hoja de Vida ID</label>
            <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                @foreach ($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}" {{ $complementaryStudy->curriculum_id == $curriculum->id ? 'selected' : '' }}>
                        {{ $curriculum->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="50" value="{{ $complementaryStudy->name }}" placeholder="Nombre del estudio">
        </div>

        <div class="form-group">
            <label for="institution">Institución</label>
            <input type="text" name="institution" id="institution" class="form-control" maxlength="50" value="{{ $complementaryStudy->institution }}" placeholder="Institución">
        </div>

        <div class="form-group">
            <label for="intensity">Intensidad</label>
            <input type="text" name="intensity" id="intensity" class="form-control" maxlength="20" value="{{ $complementaryStudy->intensity }}" placeholder="Intensidad">
        </div>

        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $complementaryStudy->date }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('complementaryStudy.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>