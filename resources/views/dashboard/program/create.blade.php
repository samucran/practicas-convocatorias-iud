<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Programa') }}
        </h2>
    </x-slot>
    <div class="container">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('program.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="program_name" class="form-label">Nombre del Programa</label>
            <input type="text" name="program_name" id="program_name" class="form-control" value="{{ old('program_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="program_profile" class="form-label">Perfil del Programa</label>
            <input type="text" name="program_profile" id="program_profile" class="form-control" value="{{ old('program_profile') }}" required>
        </div>

        <div class="mb-3">
            <label for="faculty_id" class="form-label">Facultad</label>
            <select name="faculty_id" id="faculty_id" class="form-select" required>
                <option value="">Seleccione una Facultad</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear</button>
        <a href="{{ route('program.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>