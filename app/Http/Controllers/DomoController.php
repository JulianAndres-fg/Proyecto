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
        $Domos = domo::all();
        return view('domos.index',compact('Domos'));
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
        $Domos = new domo();
        $Domos-> domo_nombre = $request -> input('nombre');
        $Domos-> domo_estado = $request -> input('estado');
        $Domos-> domo_precio = $request -> input('precio');
        $Domos-> domo_ubicacion = $request -> input('ubicacion');
        $Domos-> domo_descripcion = $request -> input('descripcion');
        $Domos-> domo_capacidad = $request -> input('capacidad');
        $Domos-> save();
        return redirect()->route('domos.index')->with('success', 'Domo creado exitosamente.');
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
