<?php

namespace App\Http\Controllers;

use App\Models\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = file::all();
        return view('dashboard.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'identity_document' => 'required|file|mimes:pdf|max:2048',
            'health_certificate' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = new file();

        // Guardar los archivos y almacenar las rutas en la base de datos
        $file->identity_document = $request->file('identity_document')->store('files');
        $file->health_certificate = $request->file('health_certificate')->store('files');

        $file->save();

        return redirect()->route('file.index')->with('success', 'Files uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(file $file)
    {
        return file::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(file $file)
    {
        return view('dashboard.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, file $file)
    {
        $file = file::findOrFail($id);

        $validatedData = $request->validate([
            'identity_document' => 'nullable|file|mimes:pdf|max:2048',
            'health_certificate' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Actualizar y guardar archivos si se suben nuevos
        if ($request->hasFile('identity_document')) {
            // Eliminar el archivo anterior
            Storage::delete($file->identity_document);
            // Guardar el nuevo archivo
            $file->identity_document = $request->file('identity_document')->store('files');
        }

        if ($request->hasFile('health_certificate')) {
            Storage::delete($file->health_certificate);
            $file->health_certificate = $request->file('health_certificate')->store('files');
        }

        $file->save();

        return redirect()->route('file.index')->with('success', 'Files updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(file $file)
    {
        // Eliminar archivo del almacenamiento
        $file = file::findOrFail($id);

        // Eliminar los archivos de almacenamiento
        Storage::delete($file->identity_document);
        Storage::delete($file->health_certificate);

        $file->delete();

        return redirect()->route('file.index')->with('success', 'File deleted successfully.');
    }
}
