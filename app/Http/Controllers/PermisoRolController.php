<?php

namespace App\Http\Controllers;

use App\Models\permiso;
use App\Models\permisoRole;
use App\Models\role;
use Illuminate\Http\Request;

class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Permisos_Roles = permisoRole::all();
        $header = [
            'Id',
            'Permiso',
            'Rol'
        ];
        $Permisos = permiso::all();
        $Roles = role::all();
        return view('permisorol.index',compact('Permisos_Roles','Permisos','Roles','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Permisos = permiso::all();
        $Roles = role::all();
        return view('permisorol.create',compact('Permisos','Roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permiso' => 'required',
            'rol' => 'required',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Permisos_Roles = new permisoRole();
        $Permisos_Roles-> permiso_id = $request -> input('permiso');
        $Permisos_Roles-> rol_id = $request -> input('rol');
        $Permisos_Roles-> save();
        return redirect()->route('permisoroles.index')->with('success', 'Permiso Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(permisoRole $permisoRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permisoRole $permisoRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permisoRole $permisoRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permisoRole $permisoRole)
    {
        //
    }
}
