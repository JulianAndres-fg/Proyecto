<?php

namespace App\Http\Controllers;

use App\Models\domo;
use App\Models\plane;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = [
            'Id',
            'Nombre',
            'Precio',
            'Domo',
            'Estado',
            'Descripcion'
        ];
        $planes = plane::all();
        $domo = domo::all();
        return view('planes.index',compact('planes','domo','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domos = domo::all();
        return view('planes.create',compact('domos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $planes = new plane();
        $planes-> plan_nombre = $request -> input('nombre');
        $planes-> plan_precio = $request -> input('precio');
        $planes-> domo_id = $request -> input('domo');
        $planes-> plan_estado = $request -> input('estado');
        $planes-> plan_descripcion = $request -> input('descripcion');
        $planes-> save();
        return redirect()->route('planes.index')->with('success', 'Plan creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(plane $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plane $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, plane $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plane $plan)
    {
        //
    }
}
