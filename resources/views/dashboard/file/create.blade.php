<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Archivo') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="identity_document" class="form-label">Documento de identidad por ambos lados</label>
            <input type="file" class="form-control @error('identity_document') is-invalid @enderror" 
                   id="identity_document" name="identity_document" accept="application/pdf" required>
            @error('identity_document')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="health_certificate" class="form-label">Certificado de afiliacion a salud</label>
            <input type="file" class="form-control @error('health_certificate') is-invalid @enderror" 
                   id="health_certificate" name="health_certificate" accept="application/pdf" required>
            @error('health_certificate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Archivo</button>
        <a href="{{ route('file.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-app-layout>