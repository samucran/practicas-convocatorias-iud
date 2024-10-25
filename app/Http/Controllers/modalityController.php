<?php

namespace App\Http\Controllers;

use App\Models\modality;
use Illuminate\Http\Request;

class modalityController extends Controller
{
    //
    public function index()
    {
        $modalities = modality::all();
        return view('dashboard.modality.index',[
            'modalities'=> $modalities
        ]);
    }

    //
    public function create()
    {
        return view('dashboard.modality.create');
    }

    //
    public function store(Request $request)
    {
        $request->validate([
            'modality_name' => 'required|string|max:50|unique:modalities,modality_name',
        ], [
            'modality_name.required' => 'El nombre de la modalidad es obligatorio.',
            'modality_name.max' => 'El nombre de la modalidad no puede tener más de 50 caracteres.',
            'modality_name.unique' => 'El nombre de la modalidad ya ha sido registrado.',
        ]);

        try {
            modality::create($request->all());
            return redirect()->route('modality.index')
                ->with('success', 'Se creó la modalidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la modalidad: ' . $e->getMessage());
        }
    }

    //
    public function show(modality $modality)
    {
        return modality::findOrFail($id);
    }

    //
    public function edit(modality $modality)
    {
        return view('dashboard.modality.edit', compact('modality'));
    }

    //
    public function update(Request $request, modality $modality)
    {
        $request->validate([
            'modality_name' => 'required|max:50|unique:modalities,modality_name,' . $modality->id,
        ], [
            'modality_name.required' => 'El nombre de la modalidad es obligatorio.',
            'modality_name.max' => 'El nombre de la modalidad no puede tener más de 50 caracteres.',
            'modality_name.unique' => 'El nombre de la modalidad ya ha sido registrado.',
        ]);

        try {
            $modality->update($request->all());
            return redirect()->route('modality.index')
                ->with('success', 'Se actualizó la modalidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo actualizar la modalidad: ' . $e->getMessage());
        }
    }

    //
    public function destroy(string $id)
    {
        try {
            $modality = modality::findOrFail($id);
            $modality->delete();

            return redirect()->route('modality.index')
                ->with('success', 'Se eliminó la facultad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar la facultad: ' . $e->getMessage());
        }
    }
}
