<?php

namespace App\Http\Controllers;

use App\Models\locality;
use Illuminate\Http\Request;

class localityController extends Controller
{
    //
    public function index()
    {
        $localities = locality::all();
        return view('dashboard.locality.index',[
            'localities'=> $localities
        ]);
    }

    //
    public function create()
    {
        return view('dashboard.locality.create');
    }

    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country' => 'required|string|max:20',
            'state' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'neighborhood' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'additional_info' => 'nullable|string|max:100',], 
            [
            'country.required' => 'El nombre del país es obligatorio.',
            'state.required' => 'El nombre del departamento es obligatorio.',
            'city.required' => 'El municipio es obligatorio.',
            'neighborhood.required' => 'El barrio es obligatorio.',
            'address.required' => 'La direccion es obligatoria.',
        ]);

        try {
            locality::create($validated);
            return redirect()->route('locality.index')
            ->with('success', 'Se creó la localidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la localidad: ' . $e->getMessage())->withInput();
        }      
    }

    //
    public function show(locality $locality)
    {
        return locality::findOrFail($id);
    }

    //
    public function edit(locality $locality)
    {
        return view('dashboard.locality.edit', compact('locality'));
    }

    //
    public function update(Request $request, locality $locality)
    {
        $request->validate([
            'country' => 'required|string|max:20',
            'state' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'neighborhood' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'additional_info' => 'nullable|string|max:100',], 
            [
            'country.required' => 'El nombre del país es obligatorio.',
            'state.required' => 'El nombre del departamento es obligatorio.',
            'city.required' => 'El municipio es obligatorio.',
            'neighborhood.required' => 'El barrio es obligatorio.',
            'address.required' => 'La direccion es obligatoria.',
        ]);

        try {
            $locality::update($request->all());

            return redirect()->route('locality.index')
                ->with('success', 'Se actualizó la localidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la localidad: ' . $e->getMessage())->withInput();
        }
    }

    //
    public function destroy(string $id)
    {
        try {
            $locality = locality::findOrFail($id);
            $locality->delete();

            return redirect()->route('locality.index')->with('success', 'Se eliminó la localidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar la localidad: ' . $e->getMessage());
        }
    }
}
