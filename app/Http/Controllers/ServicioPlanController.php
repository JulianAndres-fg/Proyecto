<?php

namespace App\Http\Controllers;
use App\Models\plane;
use App\Models\servicio;
use App\Models\servicioPlan;
use Illuminate\Http\Request;

class ServicioPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Caracteristicas = servicio::all();
        $Domos = plane::all();
        return view('serviciosplanes.create',compact('Domos','Caracteristicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(servicioPlan $servicioPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(servicioPlan $servicioPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, servicioPlan $servicioPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servicioPlan $servicioPlan)
    {
        //
    }
}
