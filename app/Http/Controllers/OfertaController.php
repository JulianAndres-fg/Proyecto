<?php

namespace App\Http\Controllers;

use App\Models\oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ofertas = oferta::all();
        $header = [
            'Id',
            'Nombre',
            'Descuento',
            'Acciones',
        ];
        return view('ofertas.index',compact('Ofertas','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ofertas.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:50',
            'descuento' => 'required|numeric',
            
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Ofertas = new oferta();
        $Ofertas-> oferta_nombre = $request -> input('nombre');
        $Ofertas-> oferta_descuento = $request -> input('descuento');
        $Ofertas-> save();
        return redirect()->route('ofertas.index')->with('success', 'Oferta creada exitosamente.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($oferta_cod)
    {
        $Ofertas = oferta::find($oferta_cod);
        return view('ofertas.edit',compact('Ofertas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $oferta_cod)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descuento' => 'required|numeric',



        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            // 'unique' => 'El campo :attribute debe ser único',
            //agregar validacion maximo para numeros

        ]);
        $Ofertas = oferta::find($oferta_cod);
        $Ofertas-> oferta_nombre = $request -> input('nombre');
        $Ofertas-> oferta_descuento = $request -> input('descuento');
        $Ofertas-> update();
        return redirect()->route('ofertas.index')->with('update', 'Oferta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(oferta $oferta)
    {
        //
    }
}
