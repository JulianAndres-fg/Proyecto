<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Servicios = servicio::all();
        return view('servicios.index',compact('Servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Servicios = new servicio();
        $Servicios-> servicio_nombre = $request -> input('nombre');
        $Servicios-> servicio_estado = $request -> input('estado');
        $Servicios-> servicio_precio = $request -> input('precio');
        $Servicios-> servicio_cantidad = $request -> input('cantidad');
        $Servicios-> save();
        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servicio $servicio)
    {
        //
    }
}
