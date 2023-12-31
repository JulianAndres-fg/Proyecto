<?php

namespace App\Http\Controllers;
use App\Models\recomendacione;
use App\Models\reserva;
use Illuminate\Http\Request;

class RecomendacionController extends Controller
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
            'Descripcion',
            'Reserva',
            'Puntaje'
        ];
        $recomendaciones = recomendacione::all();
        $reservas = reserva::all();
        return view('recomendaciones.index',compact('recomendaciones','reservas','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recomendaciones = recomendacione::all();
        $reservas = reserva::all();
        return view('recomendaciones.create',compact('recomendaciones','reservas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:500',
            'reserva' => 'required',
            'puntaje' => 'required|numeric|max:5',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $recomendaciones = new recomendacione();
        $recomendaciones-> recomendacion_descripcion = $request -> input('descripcion');
        $recomendaciones-> reserva_id = $request -> input('reserva');
        $recomendaciones-> recomendacion_puntaje = $request -> input('puntaje');
        $recomendaciones-> save();
        return redirect()->route('recomendaciones.index')->with('success', 'Recomendacion agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(recomendacione $recomendacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recomendacione $recomendacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, recomendacione $recomendacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recomendacione $recomendacion)
    {
        //
    }
}
