<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Roles = role::all();
        $header = [
            'Id',
            'Nombre',
        ];
        return view('roles.index',compact('Roles','header'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('roles.create');
        
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
        $Roles = new role();
        $Roles-> rol_nombre = $request -> input('nombre');
        $Roles-> save();
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role)
    {
        //
    }
}
