<?php

namespace App\Http\Controllers;

use App\Models\workExperience;
use App\Models\curriculum;
use Illuminate\Http\Request;

class workExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workExperiences = workExperience::all();
        return view('dashboard.workExperience.index', compact('workExperiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curriculums = curriculum::all();
        return view('dashboard.workExperience.create', compact('curriculums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curriculum_id' => 'required|exists:curriculums,id|unique:work_experiences,curriculum_id',
            'company' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:50',
            'duration' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        workExperience::create($request->all());

        return redirect()->route('workExperience.index')->with('success', 'Experiencia laboral creada con éxito.');
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
    public function edit(workExperience $workExperience)
    {
        $curriculums = curriculum::all();
        return view('dashboard.workExperience.edit', compact('workExperience', 'curriculums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, workExperience $workExperience)
    {
        $request->validate([
            'curriculum_id' => 'required|exists:curriculums,id|unique:work_experiences,curriculum_id,' . $workExperience->id,
            'company' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:50',
            'duration' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $workExperience->update($request->all());

        return redirect()->route('workExperience.index')->with('success', 'Experiencia laboral actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(workExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('workExperience.index')->with('success', 'Experiencia laboral eliminada con éxito.');
    }
}
