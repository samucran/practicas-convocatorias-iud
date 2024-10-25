<?php

namespace App\Http\Controllers;

use App\Models\identity;
use Illuminate\Http\Request;

class identityController extends Controller
{
    //
    public function index()
    {
        $identities = identity::all();
        return view('dashboard.identity.index',[
            'identities'=> $identities
        ]);
    }

    //
    public function create()
    {
        return view('dashboard.identity.create');
    }

    //
    public function store(Request $request)
    {
        $request->validate([
            'identity_type' => 'required|string|max:20|unique:identities,identity_type',
        ], [
            'identity_type.unique' => 'El tipo de identidad ya ha sido registrado.',
            'identity_type.required' => 'El tipo de identidad es obligatorio.',
            'identity_type.max' => 'El tipo de identidad no puede tener más de 20 caracteres.',
        ]);
    
        try {
            identity::create($request->all());
            return redirect()->route('identity.index')
                ->with('success', 'Se creó el tipo de identidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear el tipo de identidad: ' . $e->getMessage());
        }
    }

    //
    public function show(identity $identity)
    {
        return identity::findOrFail($id);
    }

    //
    public function edit(identity $identity)
    {
        return view('identity.edit', compact('identity'));
    }

    //
    public function update(Request $request, identity $identity)
    {
        $request->validate([
            'identity_type' => 'required|string|max:20|unique:identities,identity_type,' . $identity->id,
        ], [
            'identity_type.unique' => 'El tipo de identidad ya ha sido registrado.',
            'identity_type.required' => 'El tipo de identidad es obligatorio.',
            'identity_type.max' => 'El tipo de identidad no puede tener más de 20 caracteres.',
        ]);

        try {
            $identity->update($request->all());
            return redirect()->route('identity.index')
                ->with('success', 'Se actualizó el tipo de identidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo actualizar el tipo de identidad: ' . $e->getMessage());
        }
    }

    //
    public function destroy(string $id)
    {
        try {
            $identity = identity::findOrFail($id);
            $identity->delete();

            return redirect()->route('identity.index')
                ->with('success', 'Se eliminó el tipo de identidad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar el tipo de identidad: ' . $e->getMessage());
        }
    }
}
