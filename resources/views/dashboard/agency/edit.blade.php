<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Agencia') }}
        </h2>
    </x-slot>
    <div class="container mt-5">

    <form action="{{ route('agency.update', $agency->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="agency_name" class="form-label">Nombre Agencia</label>
            <input type="text" class="form-control" id="agency_name" name="agency_name" 
                   value="{{ old('agency_name', $agency->agency_name) }}">
        </div>
        <div class="mb-3">
            <label for="contact_name" class="form-label">Nombre Contacto</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name" 
                   value="{{ old('contact_name', $agency->contact_name) }}">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Correo Contacto</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" 
                   value="{{ old('contact_email', $agency->contact_email) }}">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Teléfono Contacto</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                   value="{{ old('contact_phone', $agency->contact_phone) }}">
        </div>
        <div class="mb-3">
            <label for="contact_role" class="form-label">Cargo Contacto</label>
            <input type="text" class="form-control" id="contact_role" name="contact_role" 
                   value="{{ old('contact_role', $agency->contact_role) }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('agency.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>