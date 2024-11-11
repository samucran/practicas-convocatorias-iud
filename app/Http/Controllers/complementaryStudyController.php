<?php

namespace App\Http\Controllers;

use App\Models\complementaryStudy;
use App\Models\curriculum;
use Illuminate\Http\Request;

class complementaryStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complementaryStudies = complementaryStudy::with('curriculum')->get();
        return view('dashboard.complementaryStudy.index', compact('complementaryStudies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.complementaryStudy.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curriculum_id' => 'required|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'institution' => 'nullable|string|max:50',
            'duration' => 'nullable|string|max:20',
            'date' => 'nullable|date',
        ]);

        complementaryStudy::create($request->all());
        return redirect()->route('complementaryStudy.index')
         ->with('success', 'Estudio complementario creado con éxito.');
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
    public function edit(string $id)
    {
        $complementaryStudy = complementaryStudy::findOrFail($id);
        $curriculums = curriculum::all();
        return view('dashboard.complementaryStudy.edit', compact('complementaryStudy', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'curriculum_id' => 'required|exists:curriculums,id',
            'name' => 'nullable|string|max:50',
            'institution' => 'nullable|string|max:50',
            'duration' => 'nullable|string|max:20',
            'date' => 'nullable|date',
        ]);

        $complementaryStudy = complementaryStudy::findOrFail($id);
        $complementaryStudy->update($request->all());
        return redirect()->route('complementaryStudy.index')
         ->with('success', 'Estudio complementario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        complementaryStudy::destroy($id);
        return redirect()->route('complementaryStudy.index')
         ->with('success', 'Estudio complementario eliminado con éxito.');
    }
}
