<?php

namespace App\Http\Controllers;

use App\Models\domo;
use App\Models\oferta;
use App\Models\plane;
use Carbon\Carbon;
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
        return view('planes.index', compact('planes', 'domo', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fechhoy = Carbon::now()->format('Y-m-d');
        $ofertas = oferta::all();
        $domos = domo::all();
        return view('planes.create', compact('domos', 'ofertas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'precio' => 'required|numeric',
            'domo' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'after_or_equal' => 'La fecha de inicio debe ser posterior a la fecha de hoy',
            'after' => 'La fecha final debe ser posterior a la fecha de inicio.',
            'not_in' => 'La fecha final no puede ser igual a la fecha de hoy.',
        ]);
   
        $planes = new plane();
        $planes->plan_nombre = $request->input('nombre');
        $planes->plan_precio = $request->input('precio');
        $planes->domo_id = $request->input('domo');
        $planes->plan_estado = $request->input('estado');
        $planes->plan_descripcion = $request->input('descripcion');
        $planes->save();

        $selectedCaracteristicas = $request->input('selectedCaracteristicas');
        
        if ($selectedCaracteristicas) {
            $caracteristicaCodArray = oferta::whereIn('oferta_cod', $selectedCaracteristicas)->pluck('oferta_cod')->toArray();
           
            $pivotData = [];
            foreach ($caracteristicaCodArray as $ofertaCod) {
                $pivotData[$ofertaCod] = [
                    'plan_oferta_fech_ini' => $request->input('fechainicial'),
                    'plan_oferta_fech_fin' => $request->input('fechafinal'),
                    'plan_oferta_nombre' => $request->input('nombreof'),
                    'plan_oferta_estado' => $request->input('estadoof'),
                ];
                $request->validate([
                    'fechainicial' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
                    'fechafinal' => 'required|date|after:fechainicial|not_in:' . Carbon::now()->format('Y-m-d'),
                    'nombreof' => 'required|max:50',
                    'estadoof' => 'required',
                ], [
                    'required' => 'El campo :attribute es obligatorio.',
                    'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
                    'after_or_equal' => 'La fecha de inicio debe ser posterior a la fecha de hoy',
                    'after' => 'La fecha final debe ser posterior a la fecha de inicio.',
                    'not_in' => 'La fecha final no puede ser igual a la fecha de hoy.',
                ]);
            }
           
        };




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
