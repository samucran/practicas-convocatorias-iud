<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Hoja de Vida') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('curriculum.update', $curriculum->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" 
                        {{ $student->id == $curriculum->student_id ? 'selected' : '' }}>
                        {{ $student->id }}
                    </option>
                @endforeach
            </select>
            @error('student_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="professional_profile" class="form-label">Perfil Profesional</label>
            <input type="text" name="professional_profile" id="professional_profile" 
                   class="form-control" maxlength="100" 
                   value="{{ old('professional_profile', $curriculum->professional_profile) }}">
            @error('professional_profile')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('curriculum.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>