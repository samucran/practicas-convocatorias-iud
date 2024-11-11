<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Referencia') }}
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

    <form action="{{ route('reference.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="curriculum_id">ID Hoja de Vida</label>
            <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                <option value="">Seleccione un curriculum</option>
                @foreach ($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" maxlength="50" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="position">Cargo</label>
            <input type="text" name="position" class="form-control" maxlength="20" value="{{ old('position') }}">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" maxlength="20" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Referencia Personal</button>
        <a href="{{ route('reference.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
</x-app-layout>