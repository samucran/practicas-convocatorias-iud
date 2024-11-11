<?php

namespace App\Http\Controllers;

use App\Models\study;
use App\Models\curriculum;
use Illuminate\Http\Request;

class studyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = study::all();
        return view('dashboard.study.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.study.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:studies,curriculum_id',
            'institution' => 'required|string|max:50',
            'title' => 'required|string|max:20',
            'year' => 'required|date',
            'institution_extra' => 'nullable|string|max:50',
            'title_extra' => 'nullable|string|max:20',
            'year_extra' => 'nullable|date'
        ]);

        study::create($request->all());
        return redirect()->route('study.index')->with('success', 'Estudio creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(study $study)
    {
        $curriculums = curriculum::all();
        return view('dashboard.study.edit', compact('study', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, study $study)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:studies,curriculum_id,' . $study->id,
            'institution' => 'required|string|max:50',
            'title' => 'required|string|max:20',
            'year' => 'required|date',
            'institution_extra' => 'nullable|string|max:50',
            'title_extra' => 'nullable|string|max:20',
            'year_extra' => 'nullable|date'
        ]);

        $study->update($request->all());
        return redirect()->route('study.index')->with('success', 'Estudio actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(study $study)
    {
        $study->delete();
        return redirect()->route('study.index')->with('success', 'Estudio eliminado con éxito.');
    }
}
