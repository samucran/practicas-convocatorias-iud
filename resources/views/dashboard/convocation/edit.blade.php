<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Convocatoria') }}
        </h2>
    </x-slot>
    <div class="container">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('convocation.update', $convocation) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="has_agency">¿Tiene Agencia?</label>
            <select name="has_agency" id="has_agency" class="form-control" required>
                <option value="1" {{ $convocation->has_agency ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$convocation->has_agency ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" name="start_date" id="start_date" class="form-control" 
                   value="{{ old('start_date', $convocation->start_date) }}">
        </div>

        <div class="form-group mb-3">
            <label for="end_date">Fecha de Cierre</label>
            <input type="date" name="end_date" id="end_date" class="form-control" 
                   value="{{ old('end_date', $convocation->end_date) }}">
        </div>

        <div class="form-group mb-3">
        <label for="agency_id">Agencia</label>
        <select name="agency_id" id="agency_id" class="form-control">
            <option value="">Seleccione una Agencia</option>
            @foreach($agencies as $agency)
                <option value="{{ $agency->id }}">
                    ID: {{ $agency->id }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="modality_id">Modalidad</label>
        <select name="modality_id" id="modality_id" class="form-control">
            <option value="">Seleccione una Modalidad</option>
            @foreach($modalities as $modality)
                <option value="{{ $modality->id }}">
                    ID: {{ $modality->id }}
                </option>
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-warning">Actualizar Convocatoria</button>
        <a href="{{ route('convocation.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>