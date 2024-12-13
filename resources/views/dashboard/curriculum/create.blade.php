<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Hoja de Vida') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('curriculum.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->identity_number }}</option>
                @endforeach
            </select>
            @error('student_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="professional_profile" class="form-label">Perfil Profesional</label>
            <input type="text" name="professional_profile" id="professional_profile" class="form-control" maxlength="100">
            @error('professional_profile')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('curriculum.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>