<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Estudiante') }}
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

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="first_name">Primer Nombre</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="second_name">Segundo Nombre</label>
            <input type="text" name="second_name" class="form-control" value="{{ old('second_name') }}">
        </div>

        <div class="form-group mb-3">
            <label for="first_surname">Primer Apellido</label>
            <input type="text" name="first_surname" class="form-control" value="{{ old('first_surname') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="second_surname">Segundo Apellido</label>
            <input type="text" name="second_surname" class="form-control" value="{{ old('second_surname') }}">
        </div>

        <div class="form-group mb-3">
            <label for="identity_id">ID Identidad</label>
            <select name="identity_id" class="form-control" required>
                <option value="">Seleccione una Identidad</option>
                @foreach($identities as $identity)
                    <option value="{{ $identity->id }}" {{ old('id') == $identity->id ? 'selected' : '' }}>
                        {{ $identity->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="identity_number">Numero Identidad</label>
            <input type="text" name="identity_number" class="form-control" value="{{ old('identity_number') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="institutional_email">Correo Institucional</label>
            <input type="email" name="institutional_email" class="form-control" value="{{ old('institutional_email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="personal_email">Correo Personal</label>
            <input type="email" name="personal_email" class="form-control" value="{{ old('personal_email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Numero Celular</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
        </div>

        <div class="form-group mb-3">
            <label for="locality_id">ID Localidad</label>
            <select name="locality_id" class="form-control" required>
                <option value="">Selecciona una localidad</option>
                @foreach($localities as $locality)
                    <option value="{{ $locality->id }}" {{ old('id') == $locality->id ? 'selected' : '' }}>
                        {{ $locality->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="program_id">ID Programa</label>
            <select name="program_id" class="form-control" required>
                <option value="">Selecciona un Programa</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('id') == $program->id ? 'selected' : '' }}>
                        {{ $program->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="file_id">ID Archivo</label>
            <select name="file_id" class="form-control" required>
                <option value="">Selecciona un Archivo</option>
                @foreach($files as $file)
                    <option value="{{ $file->id }}" {{ old('id') == $file->id ? 'selected' : '' }}>
                        {{ $file->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="status">Estado</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Estudiante</button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>