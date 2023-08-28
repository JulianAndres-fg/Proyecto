<?php

namespace App\Http\Controllers;

use App\Models\permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Permisos = permiso::all();
        $header = [
            'Id',
            'Nombre',
        ];
        return view('permisos.index',compact('Permisos','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permisos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',

        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Permisos = new permiso();
        $Permisos-> permiso_nombre = $request -> input('nombre');
        $Permisos-> save();
        return redirect()->route('permisos.index')->with('success', 'Permiso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(permiso $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permiso $permiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permiso $permiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permiso $permiso)
    {
        //
    }
}
