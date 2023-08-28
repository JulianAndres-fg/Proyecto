<?php

namespace App\Http\Controllers;

use App\Models\caracteristica;
use App\Models\domo;
use App\Models\domoCaracteristica;
use Illuminate\Http\Request;

class DomoCaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Domos_caracteristicas = domoCaracteristica::all();
        $header = [
            'Id',
            'Domo',
            'Caracteristica'
        ];
        $Caracteristicas = caracteristica::all();
        $Domos = domo::all();
        return view('domocaracteristica.index',compact('Domos_caracteristicas','Caracteristicas','Domos','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Caracteristicas = caracteristica::all();
        $Domos = domo::all();
        return view('domocaracteristica.create',compact('Domos','Caracteristicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(domoCaracteristica $domoCaracteristica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(domoCaracteristica $domoCaracteristica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, domoCaracteristica $domoCaracteristica)
    {
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(domoCaracteristica $domoCaracteristica)
    {

    }
}
