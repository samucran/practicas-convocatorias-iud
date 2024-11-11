<?php

namespace App\Http\Controllers;

use App\Models\languageLevel;
use App\Models\curriculum;
use Illuminate\Http\Request;

class languageLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languageLevels = languageLevel::all();
        return view('dashboard.languageLevel.index', compact('languageLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.languageLevel.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:language_levels',
            'primary_language' => 'required|string|max:20',
            'primary_language_level' => 'required|in:A1,A2,B1,B2,C1,C2',
            'secondary_language' => 'nullable|string|max:20',
            'secondary_language_level' => 'nullable|in:A1,A2,B1,B2,C1,C2',
            'extra_language' => 'nullable|string|max:20',
            'extra_language_level' => 'nullable|in:A1,A2,B1,B2,C1,C2',
        ]);

        languageLevel::create($request->all());

        return redirect()->route('languageLevel.index')
            ->with('success', 'Nivel de idioma creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return languageLevel::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(languageLevel $languageLevel)
    {
        $curriculums = curriculum::all();
        return view('dashboard.languageLevel.edit', compact('languageLevel', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, languageLevel $languageLevel)
    {
        $request->validate([
            'curriculum_id' => 'required|unique:language_levels,curriculum_id,' . $languageLevel->id,
            'primary_language' => 'required|string|max:20',
            'primary_language_level' => 'required|in:A1,A2,B1,B2,C1,C2',
            'secondary_language' => 'nullable|string|max:20',
            'secondary_language_level' => 'nullable|in:A1,A2,B1,B2,C1,C2',
            'extra_language' => 'nullable|string|max:20',
            'extra_language_level' => 'nullable|in:A1,A2,B1,B2,C1,C2',
        ]);

        $languageLevel->update($request->all());

        return redirect()->route('languageLevel.index')
            ->with('success', 'Nivel de idioma actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(languageLevel $languageLevel)
    {
        $languageLevel->delete();

        return redirect()->route('languageLevel.index')
            ->with('success', 'Nivel de idioma eliminado correctamente.');
    }
}
