<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\faculty;
use Illuminate\Http\Request;

class programController extends Controller
{
    //
    public function index()
    {
        $programs = program::with('faculty')->get();
        return view('dashboard.program.index', compact('programs'));
    }

    //
    public function create()
    {
        $faculties = faculty::all();
        return view('dashboard.program.create', compact('faculties'));
    }

    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_name' => 'required|string|max:50|unique:programs,program_name',
            'program_profile' => 'required|string|max:50|unique:programs,program_profile',
            'faculty_id' => 'required|exists:faculties,id',
        ], [
                'program_name.unique' => 'El nombre del programa ya ha sido registrado.',
                'program_name.required' => 'El nombre del programa es obligatorio.',
                'program_profile.unique' => 'Este perfil ya ha sido registrado.',
                'program_profile.required' => 'El perfil del programa es obligatorio.',
                'faculty_id.required' => 'El ID de la facultad es obligatorio.',
        ]);

        program::create($validated);

        return redirect()->route('program.index')->with('success', 'Programa creado correctamente.');
    }

    //
    public function show(program $program)
    {
        return program::findOrFail($id);
    }

    //
    public function edit(program $program)
    {
        $faculties = faculty::all();
        return view('dashboard.program.edit', compact('program', 'faculties'));
    }

    //
    public function update(Request $request, program $program)
    {
        $validated = $request->validate([
            'program_name' => 'required|string|max:50|unique:programs,program_name,' . $program->id,
            'program_profile' => 'required|string|max:50|unique:programs,program_profile,' . $program->id,
            'faculty_id' => 'required|exists:faculties,id',
        ], [
            'program_name.unique' => 'El nombre del programa ya ha sido registrado.',
            'program_name.required' => 'El nombre del programa es obligatorio.',
            'program_profile.unique' => 'Este perfil ya ha sido registrado.',
            'program_profile.required' => 'El perfil del programa es obligatorio.',
            'faculty_id.required' => 'El ID de la facultad es obligatorio.',
        ]);

        $program->update($validated);

        return redirect()->route('program.index')->with('success', 'Programa actualizado correctamente.');
    }

    //
    public function destroy(program $program)
    {
        $program->delete();
        return redirect()->route('program.index')->with('success', 'Programa eliminado correctamente.');
    }
}