<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Archivo') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="identity_document" class="form-label">Documento de identidad por ambos lados</label>
            <input type="file" class="form-control @error('identity_document') is-invalid @enderror" 
                   id="identity_document" name="identity_document" accept="application/pdf">
            <small>Actual: 
                @if ($file->identity_document)
                    <a href="{{ Storage::url($file->identity_document) }}" target="_blank">Ver Documento</a>
                @else
                    N/A
                @endif
            </small>
            @error('identity_document')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="health_certificate" class="form-label">Certificado de afiliacion a salud</label>
            <input type="file" class="form-control @error('health_certificate') is-invalid @enderror" 
                   id="health_certificate" name="health_certificate" accept="application/pdf">
            <small>Actual: 
                @if ($file->health_certificate)
                    <a href="{{ Storage::url($file->health_certificate) }}" target="_blank">Ver Certificado</a>
                @else
                    N/A
                @endif
            </small>
            @error('health_certificate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="institutional_resume" class="form-label">Hoja de vida institucional</label>
            <input type="file" class="form-control @error('institutional_resume') is-invalid @enderror" 
                   id="institutional_resume" name="institutional_resume" accept="application/pdf">
            <small>Actual: 
                @if ($file->institutional_resume)
                    <a href="{{ Storage::url($file->institutional_resume) }}" target="_blank">Ver Hoja de Vida</a>
                @else
                    N/A
                @endif
            </small>
            @error('institutional_resume')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Actualizar Archivo</button>
        <a href="{{ route('file.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>