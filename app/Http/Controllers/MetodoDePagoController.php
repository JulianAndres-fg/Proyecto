<?php

namespace App\Http\Controllers;

use App\Models\metodoDePago;
use Illuminate\Http\Request;

class MetodoDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = [
            'Id',
            'Nombre',
        ];
        $MetodosDePagos = metodoDePago::all();
        return view('metodosdepago.index',compact('MetodosDePagos','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodosdepago.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:50',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Roles = new metodoDePago();
        $Roles-> metodo_de_pago_nombre = $request -> input('nombre');
        $Roles-> save();
        return redirect()->route('metodosdepago.index')->with('success', 'metodo de pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(metodoDePago $metodoDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(metodoDePago $metodoDePago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, metodoDePago $metodoDePago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(metodoDePago $metodoDePago)
    {
        //
    }
}
