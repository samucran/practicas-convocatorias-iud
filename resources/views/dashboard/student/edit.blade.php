<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estudiante') }}
        </h2>
    </x-slot>
    <div class="container">
    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="first_name">Primer Nombre</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="second_name">Segundo Nombre</label>
            <input type="text" name="second_name" class="form-control" value="{{ old('second_name', $student->second_name) }}">
        </div>

        <div class="form-group mb-3">
            <label for="first_surname">Primer Apellido</label>
            <input type="text" name="first_surname" class="form-control" value="{{ old('first_surname', $student->first_surname) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="second_surname">Segundo Apellido</label>
            <input type="text" name="second_surname" class="form-control" value="{{ old('second_surname', $student->second_surname) }}">
        </div>

        <div class="form-group mb-3">
            <label for="identity_id">ID Identidad</label>
            <input type="number" name="identity_id" class="form-control" value="{{ old('identity_id', $student->identity_id) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="identity_number">Numero Identidad</label>
            <input type="text" name="identity_number" class="form-control" value="{{ old('identity_number', $student->identity_number) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="institutional_email">Correo Institucional</label>
            <input type="email" name="institutional_email" class="form-control" value="{{ old('institutional_email', $student->institutional_email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="personal_email">Correo Personal</label>
            <input type="email" name="personal_email" class="form-control" value="{{ old('personal_email', $student->personal_email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Numero de Celular</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $student->phone_number) }}">
        </div>

        <div class="form-group mb-3">
            <label for="locality_id">ID Localidad</label>
            <input type="number" name="locality_id" class="form-control" value="{{ old('locality_id', $student->locality_id) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="program_id">ID Programa</label>
            <input type="number" name="program_id" class="form-control" value="{{ old('program_id', $student->program_id) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="file_id">ID Archivos</label>
            <input type="number" name="file_id" class="form-control" value="{{ old('file_id', $student->file_id) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Estado</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $student->status) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('status', $student->status) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>