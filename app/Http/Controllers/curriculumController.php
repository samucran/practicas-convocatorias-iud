<?php

namespace App\Http\Controllers;

use App\Models\curriculum;
use App\Models\student;
use Illuminate\Http\Request;

class curriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculums = curriculum::with('student')->get();
        return view('dashboard.curriculum.index', compact('curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = student::all();
        return view('dashboard.curriculum.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:curriculums,student_id',
            'professional_profile' => 'nullable|string|max:500',
        ]);

        curriculum::create($request->all());
        return redirect()->route('curriculum.index')->with('success', 'Hoja de vida creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(curriculum $curriculum)
    {
        return curriculum::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(curriculum $curriculum)
    {
        $students = student::all();
        return view('dashboard.curriculum.edit', compact('curriculum', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, curriculum $curriculum)
    {
        $request->validate([
            'student_id' => "required|unique:curriculums,student_id,{$curriculum->id}",
            'professional_profile' => 'nullable|string|max:500',
        ]);

        $curriculum->update($request->all());
        return redirect()->route('curriculum.index')->with('success', 'Hoja de vida actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect()->route('curriculum.index')->with('success', 'Hoja de vida eliminada correctamente.');
    }
}
