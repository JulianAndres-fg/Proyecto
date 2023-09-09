<?php

namespace App\Http\Controllers;

use App\Models\metodoDePago;
use Illuminate\Http\Request;

class MetodoDePagoController extends Controller
{
    public function __construct() {
        $this->middleware('permission:ver-metododepago|crear-metododepago|editar-metododepago|borrar-metododepago',['only'=>['index']]);   
        $this->middleware('permission:crear-metododepago',['only'=>['create','store']]);   
        $this->middleware('permission:editar-metododepago',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-metododepago',['only'=>['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = [
            'Id',
            'Nombre',
            'Acciones',
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
        $MetodosDePagos = new metodoDePago();
        $MetodosDePagos-> metodo_de_pago_nombre = $request -> input('nombre');
        $MetodosDePagos-> save();
        return redirect()->route('metodosdepago.index')->with('success', 'Metodo de pago creado exitosamente.');
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
    public function edit($metodo_de_pago_cod)
    
    {
      $MetodosDePagos = metodoDePago::find($metodo_de_pago_cod);
      return view('metodosdepago.edit',compact('MetodosDePagos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $metodo_de_pago_cod)
    {
       
        $request->validate([
            'nombre' => 'required|max:50',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $MetodosDePagos = metodoDePago::find($metodo_de_pago_cod);
        $MetodosDePagos-> metodo_de_pago_nombre = $request -> input('nombre');
        $MetodosDePagos-> update();
        return redirect()->route('metodosdepago.index')->with('update', 'Metodo de pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($metodo_de_pago_cod)
    {
        $MetodosDePagos= metodoDePago::find($metodo_de_pago_cod);
        $MetodosDePagos->delete();
        return redirect()->route('metodosdepago.index')->with('delete', 'Metodo de pago eliminado exitosamente.');
    }
}
