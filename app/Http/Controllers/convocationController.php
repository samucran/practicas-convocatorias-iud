<?php

namespace App\Http\Controllers;

use App\Models\convocation;
use App\Models\modality;
use App\Models\agency;
use Illuminate\Http\Request;

class convocationController extends Controller
{
    //
    public function index()
    {
        $convocations = convocation::with('modality', 'agency')->get();
        return view('dashboard.convocation.index', compact('convocations'));
    }

    //
    public function create()
    {
        $modalities = modality::all();
        $agencies = agency::all();
        return view('dashboard.convocation.create', compact('modalities', 'agencies'));
    }

    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'has_agency' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'modality_id' => 'nullable|exists:modalities,id',
            'agency_id' => 'nullable|exists:agencies,id',
        ]);

        try {
            convocation::create($validated);
            return redirect()->route('convocation.index')->with('success', 'Convocatoria creada correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la convocatoria.')->withInput();
        }
    }

    //
    public function show(convocation $convocation)
    {
        return convocation::findOrFail($id);
    }

    //
    public function edit(convocation $convocation)
    {
        $modalities = modality::all();
        $agencies = agency::all();
        return view('dashboard.convocation.edit', compact('convocation', 'modalities', 'agencies'));
    }

    //
    public function update(Request $request, convocation $convocation)
    {
        $validated = $request->validate([
            'has_agency' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'modality_id' => 'nullable|exists:modalities,id',
            'agency_id' => 'nullable|exists:agencies,id',
        ]);

        try {
            $convocation->update($validated);
            return redirect()->route('convocation.index')->with('success', 'Convocatoria actualizada correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo actualizar la convocatoria.')->withInput();
        }
    }

    //
    public function destroy(convocation $convocation)
    {
        try {
            $convocation->delete();
            return redirect()->route('convocation.index')->with('success', 'Convocatoria eliminada correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar la convocatoria.');
        }
    }
}
