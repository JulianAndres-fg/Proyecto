<?php

namespace App\Http\Controllers;

use App\Models\domo;
use Illuminate\Http\Request;

class DomoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Nombre',
            'Estado',
            'Precio',
            'Ubicacion',
            'Descripcion',
            'Capacidad'
        ];
        $Domos = domo::all();
        return view('domos.index',compact('Domos','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
        $request->validate([
            'nombre' => 'required',
            'estado' => 'required',
            'precio' => 'required|numeric',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'capacidad' => 'required|numeric|max:20',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe ser mayor a :max.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Domos = new domo();
        $Domos-> domo_nombre = $request -> input('nombre');
        $Domos-> domo_estado = $request -> input('estado');
        $Domos-> domo_precio = $request -> input('precio');
        $Domos-> domo_ubicacion = $request -> input('ubicacion');
        $Domos-> domo_descripcion = $request -> input('descripcion');
        $Domos-> domo_capacidad = $request -> input('capacidad');
        $Domos-> save();
        return redirect()->route('domos.index')->with('success', 'Domo agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(domo $domo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(domo $domo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, domo $domo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(domo $domo)
    {
        //
    }
}
