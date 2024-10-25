<?php

namespace App\Http\Controllers;

use App\Models\agency;
use Illuminate\Http\Request;

class agencyController extends Controller
{
    //
    public function index()
    {
        $agencies = agency::all();
        return view('dashboard.agency.index',[
            'agencies'=> $agencies
        ]);
    }

    //
    public function create()
    {
        return view('dashboard.agency.create');
    }

    //
    public function store(Request $request)
    {
        try {
            agency::create($request->all());
            return redirect()->route('agency.index')
                ->with('success', 'Se creó la agencia correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la agencia: ' . $e->getMessage());
        }
    }

    //
    public function show(agency $agency)
    {
        return agency::findOrFail($id);
    }

    //
    public function edit(agency $agency)
    {
        return view('dashboard.agency.edit', compact('agency'));
    }

    //
    public function update(Request $request, agency $agency)
    {
        try {
            $agency->update($request->all());
            return redirect()->route('agency.index')
                ->with('success', 'Se actualizó la agencia correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo actualizar la agencia: ' . $e->getMessage());
        }
    }

    //
    public function destroy(string $id)
    {
        try {
            $agency = agency::findOrFail($id);
            $agency->delete();

            return redirect()->route('agency.index')
                ->with('success', 'Se eliminó la agencia correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar la agencia: ' . $e->getMessage());
        }
    }
}
