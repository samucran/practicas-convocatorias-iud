<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Localidad') }}
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

        <form action="{{ route('locality.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="country">País</label>
                <select name="country" id="country" class="form-control" required>
                    <option value="">Seleccione un país</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="state">Departamento/Estado</label>
                <select name="state" id="state" class="form-control" disabled>
                    <option value="">Seleccione una opcion</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="city">Municipio/Ciudad</label>
                <select name="city" id="city" class="form-control" disabled>
                    <option value="">Seleccione una opcion</option>
                </select>
            </div>

            <div class="form-group mb-3">
            <label for="neighborhood">Barrio</label>
            <input type="text" name="neighborhood" class="form-control" value="{{ old('neighborhood') }}" required>
            </div>

            <div class="form-group mb-3">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Localidad</button>
            <a href="{{ route('locality.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const apiKey = "{{ env('CSC_API_KEY') }}";
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        // Cargar países
        async function loadCountries() {
            try {
                const response = await axios.get('https://api.countrystatecity.in/v1/countries', {
                    headers: { 'X-CSCAPI-KEY': apiKey }
                });
                response.data.forEach(country => {
                    const option = new Option(country.name, country.iso2);
                    countrySelect.add(option);
                });
            } catch (error) {
                console.error('Error al cargar países:', error);
            }
        }

        // Cargar estados
        countrySelect.addEventListener('change', async () => {
            const countryId = countrySelect.value;
            stateSelect.innerHTML = '<option value="">Seleccione un estado</option>';
            stateSelect.disabled = true;
            citySelect.innerHTML = '<option value="">Seleccione una ciudad</option>';
            citySelect.disabled = true;

            if (!countryId) return;

            try {
                const response = await axios.get(`https://api.countrystatecity.in/v1/countries/${countryId}/states`, {
                    headers: { 'X-CSCAPI-KEY': apiKey }
                });
                response.data.forEach(state => {
                    const option = new Option(state.name, state.iso2);
                    stateSelect.add(option);
                });
                stateSelect.disabled = false;
            } catch (error) {
                console.error('Error al cargar estados:', error);
            }
        });

        // Cargar ciudades
        stateSelect.addEventListener('change', async () => {
            const countryId = countrySelect.value;
            const stateId = stateSelect.value;
            citySelect.innerHTML = '<option value="">Seleccione una ciudad</option>';
            citySelect.disabled = true;

            if (!stateId) return;

            try {
                const response = await axios.get(`https://api.countrystatecity.in/v1/countries/${countryId}/states/${stateId}/cities`, {
                    headers: { 'X-CSCAPI-KEY': apiKey }
                });
                response.data.forEach(city => {
                    const option = new Option(city.name, city.id);
                    citySelect.add(option);
                });
                citySelect.disabled = false;
            } catch (error) {
                console.error('Error al cargar ciudades:', error);
            }
        });

        // Inicializar la carga de países
        loadCountries();
    });
</script>

</x-app-layout>