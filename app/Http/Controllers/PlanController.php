<?php

namespace App\Http\Controllers;

use App\Models\domo;
use App\Models\oferta;
use App\Models\plane;
use App\Models\servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
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
        $servicios = servicio::all(); 
        $ofertas = oferta::all();
        $domos = domo::all();
        return view('planes.create', compact('domos', 'ofertas','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Crea una nueva instancia de plane y guarda los datos del formulario
    $planes = new plane();
    $planes->plan_nombre = $request->input('nombre');
    $planes->plan_precio = $request->input('precio');
    $planes->domo_id = $request->input('domo');
    $planes->plan_estado = $request->input('estado');
    $planes->plan_descripcion = $request->input('descripcion');
    $planes->save();

    // Sincroniza la relación con el modelo oferta
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
        }
        $planes->oferta()->sync($pivotData);
    }

    // Sincroniza la relación con el modelo servicio
    $selectedServicios = $request->input('selectedServicios');
    if ($selectedServicios) {
        $servicioCodArray = Servicio::whereIn('servicio_cod', $selectedServicios)->pluck('servicio_cod')->toArray();
        $planes->servicio()->sync($servicioCodArray);
    }

    // Redirige al usuario a la página de índice
    return redirect()->route('planes.index')->with('success', 'Plan agregado exitosamente.');
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
