<?php

namespace App\Http\Controllers;

use App\Models\convocationRelation;
use App\Models\convocation;
use App\Models\student;
use Illuminate\Http\Request;

class convocationRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relations = convocationRelation::with(['convocation', 'student'])->get();
        return view('dashboard.convocationRelation.index', compact('relations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $convocations = convocation::all();
        $students = student::all();
        return view('dashboard.convocationRelation.create', compact('convocations', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'convocation_id' => 'required|exists:convocations,id',
            'student_id' => 'required|exists:students,id|unique:convocation_relations,student_id',
            'semester_date' => 'required|string|max:6',
            'mandatory_practice' => 'required|boolean',
        ]);

        convocationRelation::create($validated);

        return redirect()->route('convocationRelation.index')->with('success', 'Relacion creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return convocationRelation::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(convocationRelation $convocationRelation)
    {
        $convocations = convocation::all();
        $students = student::all();
        return view('dashboard.convocationRelation.edit', compact('convocationRelation', 'convocations', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, convocationRelation $convocationRelation)
    {
        $validated = $request->validate([
            'convocation_id' => 'required|exists:convocations,id',
            'student_id' => 'required|exists:students,id|unique:convocation_relations,student_id,' . $convocationRelation->id,
            'semester_date' => 'required|string|max:6',
            'mandatory_practice' => 'required|boolean',
        ]);

        $convocationRelation->update($validated);

        return redirect()->route('convocationRelation.index')->with('success', 'Relacion actualizada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(convocationRelation $convocationRelation)
    {
        $convocationRelation->delete();
        return redirect()->route('convocationRelation.index')->with('success', 'Relacion eliminada con exito.');
    }
}
