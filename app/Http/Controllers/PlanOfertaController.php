<?php

namespace App\Http\Controllers;

use App\Models\oferta;
use App\Models\plane;
use App\Models\planOferta;
use Illuminate\Http\Request;

class PlanOfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Plan_ofertas = planOferta::all();
        $header = [
            'Id',
            'Fecha inicio',
            'Fecha final',
            'Plan',
            'Oferta',
            'Nombre',
            'Estado',
        ];
        $planes = plane::all();
        $Ofertas = oferta::all();
        return view('planoferta.index',compact('Plan_ofertas','planes','Ofertas','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $planes = plane::all();
        $Ofertas = oferta::all();
        return view('planoferta.create',compact('planes','Ofertas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Plan_ofertas = new planOferta();
        $Plan_ofertas->plan_oferta_fech_ini = $request -> input('fechainicial');
        $Plan_ofertas->plan_oferta_fech_fin = $request -> input('fechafinal');
        $Plan_ofertas-> plan_id = $request -> input('plan');
        $Plan_ofertas-> oferta_id = $request -> input('oferta');
        $Plan_ofertas->plan_oferta_nombre = $request -> input('nombre');
        $Plan_ofertas->plan_oferta_estado = $request -> input('estado');
        $Plan_ofertas-> save();
        return redirect()->route('planoferta.index')->with('success', 'Plan oferta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(planOferta $planOferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(planOferta $planOferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, planOferta $planOferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planOferta $planOferta)
    {
        //
    }
}
