<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Relacion') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('convocationRelation.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="convocation_id">Convocatoria</label>
            <select name="convocation_id" id="convocation_id" class="form-control" required>
                <option value="">Seleccione una Convocatoria</option>
                @foreach($convocations as $convocation)
                    <option value="{{ $convocation->id }}">{{ $convocation->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="student_id">Estudiante</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">Seleccione un Estudiante</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="semester_date">Fecha del Semestre</label>
            <input type="text" name="semester_date" id="semester_date" class="form-control" maxlength="6" required>
        </div>

        <div class="form-group">
            <label for="mandatory_practice">Práctica Obligatoria</label>
            <select name="mandatory_practice" id="mandatory_practice" class="form-control" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear Relación</button>
        <a href="{{ route('convocationRelation.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>