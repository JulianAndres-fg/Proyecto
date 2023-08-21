<?php

namespace App\Http\Controllers;

use App\Models\oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
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
    public function edit(oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, oferta $oferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(oferta $oferta)
    {
        //
    }
}
