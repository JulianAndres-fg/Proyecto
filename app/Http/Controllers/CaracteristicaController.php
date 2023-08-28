<?php

namespace App\Http\Controllers;

use App\Models\caracteristica;
use Illuminate\Http\Request;

class CaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Estado',
            'Descripcion',
            'Nombre',
            'Precio'
        ];
        $Caracteristicas = caracteristica::all();
        return view('caracteristicas.index',compact('Caracteristicas','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('caracteristicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required',
            'descripcion' => 'nullable',
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        
        $Caracteristicas = new caracteristica();
        $Caracteristicas-> caracteristica_estado = $request -> input('estado');
        $Caracteristicas-> caracteristica_descripcion = $request -> input('descripcion');
        $Caracteristicas-> caracteristica_nombre = $request -> input('nombre');
        $Caracteristicas-> caracteristica_precio = $request -> input('precio');
        $Caracteristicas-> save();
        return redirect()->route('caracteristicas.index')->with('success', 'Caracteristica creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(caracteristica $caracteristica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(caracteristica $caracteristica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, caracteristica $caracteristica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(caracteristica $caracteristica)
    {
        //
    }
}
