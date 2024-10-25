<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use Illuminate\Http\Request;

class facultyController extends Controller
{
    // mostrar todas las facultades
    public function index()
    {
        $faculties = faculty::all();
        return view('dashboard.faculty.index',[
            'faculties'=> $faculties
        ]);
    }

    // muestra crear una nueva facultad
    public function create()
    {
        return view('dashboard.faculty.create');
    }

    // almacenar una nueva facultad
    public function store(Request $request)
    {
        $request->validate([
                'faculty_name' => 'required|string|max:50|unique:faculties,faculty_name',], 
            [
            'faculty_name.unique' => 'El nombre de la facultad ya ha sido registrado.',
            'faculty_name.required' => 'El nombre de la facultad es obligatorio.',
            'faculty_name.max' => 'El nombre de la facultad no puede tener más de 50 caracteres.',
        ]);
        
        try {
            faculty::create($request->all());
            return redirect()->route('faculty.index')
                ->with('success', 'Se creó la facultad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo crear la facultad: ' . $e->getMessage());
        }
        
    }

    // muestra una facultad por id
    public function show(faculty $faculty)
    {
        return faculty::findOrFail($id);
    }

    // muestra editar una facultad
    public function edit(faculty $faculty)
    {
        return view('dashboard.faculty.edit', compact('faculty'));
    }

    // actualiza la facultad editada
    public function update(Request $request, faculty $faculty)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:50|unique:faculties,faculty_name,' . $faculty->id,
        ], [
            'faculty_name.unique' => 'El nombre de la facultad ya ha sido registrado.',
            'faculty_name.required' => 'El nombre de la facultad es obligatorio.',
            'faculty_name.max' => 'El nombre de la facultad no puede tener más de 50 caracteres.',
        ]);
        
        try {
            $faculty->update($request->all());
        
            return redirect()->route('faculty.index')
                ->with('success', 'Se actualizó la facultad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo actualizar la facultad: ' . $e->getMessage());
        }
    }

    // elimina una facultad
    public function destroy(string $id)
    {
        try {
            $faculty = faculty::findOrFail($id);
            $faculty->delete();

            return redirect()->route('faculty.index')
                ->with('success', 'Se eliminó la facultad correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo eliminar la facultad: ' . $e->getMessage());
        }
    }
}
