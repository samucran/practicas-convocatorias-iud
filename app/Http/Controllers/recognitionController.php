<?php

namespace App\Http\Controllers;

use App\Models\recognition;
use App\Models\curriculum;
use Illuminate\Http\Request;

class recognitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recognitions = recognition::all();
        return view('dashboard.recognition.index', compact('recognitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.recognition.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'curriculum_id' => 'required|unique:recognitions,curriculum_id|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
        ]);

        recognition::create($validated);
        return redirect()->route('recognition.index')->with('success', 'Reconocimiento creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(recognition $recognition)
    {
        return curriculum::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recognition $recognition)
    {
        $curriculums = curriculum::all();
        return view('dashboard.recognition.edit', compact('recognition', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, recognition $recognition)
    {
        $validated = $request->validate([
            'curriculum_id' => 'required|unique:recognitions,curriculum_id,' . $recognition->id . '|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
        ]);

        $recognition->update($validated);
        return redirect()->route('recognition.index')->with('success', 'Reconocimiento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recognition $recognition)
    {
        $recognition->delete();
        return redirect()->route('recognition.index')->with('success', 'Reconocimiento eliminado correctamente.');
    }
}
