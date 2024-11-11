<?php

namespace App\Http\Controllers;

use App\Models\reference;
use App\Models\curriculum;
use Illuminate\Http\Request;

class referenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $references = reference::with('curriculum')->get();
        return view('dashboard.reference.index', compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.reference.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:references,curriculum_id|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
        ]);

        reference::create($request->all());

        return redirect()->route('reference.index')
            ->with('success', 'Referencia personal creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(reference $reference)
    {
        return reference::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reference $reference)
    {
        $curriculums = curriculum::all();
        return view('dashboard.reference.edit', compact('reference', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reference $reference)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:references,curriculum_id,' . $reference->id . '|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
        ]);

        $reference->update($request->all());

        return redirect()->route('reference.index')
            ->with('success', 'Referencia personal actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reference $reference)
    {
        $reference->delete();

        return redirect()->route('reference.index')
         ->with('success', 'Referencia personal eliminada exitosamente.');
    }
}
