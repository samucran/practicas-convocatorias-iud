<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Identity;
use App\Models\Locality;
use App\Models\Program;
use App\Models\File;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::with(['identity', 'locality', 'program', 'file'])->get();
        return view('dashboard.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identities = identity::all();
        $localities = locality::all();
        $programs = program::all();
        $files = file::all();
        return view('dashboard.student.create', compact('identities', 'localities', 'programs', 'files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'first_surname' => 'required|string|max:255',
            'second_surname' => 'nullable|string|max:255',
            'identity_id' => 'required|exists:identities,id',
            'identity_number' => 'required|unique:students,identity_number',
            'institutional_email' => 'required|unique:students,institutional_email',
            'personal_email' => 'required|unique:students,personal_email',
            'phone_number' => 'nullable|string|max:20',
            'locality_id' => 'required|exists:localities,id|unique:students,id',
            'program_id' => 'required|exists:programs,id',
            'file_id' => 'required|exists:files,id|unique:students,id',
            'status' => 'required|boolean',
        ]);

        student::create($validatedData);

        return redirect()->route('student.index')->with('success', 'Estudiante creado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return student::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        $identities = identity::all();
        $localities = locality::all();
        $programs = program::all();
        $files = file::all();
        return view('dashboard.student.edit', compact('student', 'identities', 'localities', 'programs', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'first_surname' => 'required|string|max:255',
            'second_surname' => 'nullable|string|max:255',
            'identity_id' => 'required|exists:identities,id',
            'identity_number' => 'required|unique:students,identity_number,' . $student->id,
            'institutional_email' => 'required|unique:students,institutional_email,' . $student->id,
            'personal_email' => 'required|unique:students,personal_email,' . $student->id,
            'phone_number' => 'nullable|string|max:20',
            'locality_id' => 'required|exists:localities,id|unique:students,id,' . $student->id,
            'program_id' => 'required|exists:programs,id',
            'file_id' => 'required|exists:files,id|unique:students,id,' . $student->id,
            'status' => 'required|boolean',
        ]);

        $student->update($validatedData);

        return redirect()->route('student.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
