<?php

namespace App\Http\Controllers;

use App\Models\caracteristica;
use Illuminate\Http\Request;

class CaracteristicaController extends Controller
{
    public function __construct() {
        $this->middleware('permission:ver-caracteristica|crear-caracteristica|editar-caracteristica|borrar-caracteristica',['only'=>['index']]);   
        $this->middleware('permission:crear-caracteristica',['only'=>['create','store']]);   
        $this->middleware('permission:editar-caracteristica',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-caracteristica',['only'=>['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Nombre',
            'Precio',
            'Descripcion',
            'Estado',
            'Acciones',
        ];
        $Caracteristicas = caracteristica::all();
        return view('Caracteristicas.index',compact('Caracteristicas','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Caracteristicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required',
            'descripcion' => 'nullable',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        
        $Caracteristicas = new caracteristica();
        $Caracteristicas-> caracteristica_estado = $request -> input('estado');
        $Caracteristicas-> caracteristica_descripcion = $request -> input('descripcion');
        $Caracteristicas-> caracteristica_nombre = $request -> input('nombre');
        $Caracteristicas-> caracteristica_precio = $request -> input('precio');
        $Caracteristicas-> save();
        return redirect()->route('caracteristicas.index')->with('success', 'Caracteristica agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(caracteristica $caracteristica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($caracteristica_cod)
    {
        $Caracteristicas = caracteristica::find($caracteristica_cod);
      return view('Caracteristicas.edit',compact('Caracteristicas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$caracteristica_cod)
    {
        $request->validate([
            'estado' => 'required',
            'descripcion' => 'nullable',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        
        $Caracteristicas = caracteristica::find($caracteristica_cod);
        $Caracteristicas-> caracteristica_estado = $request -> input('estado');
        $Caracteristicas-> caracteristica_descripcion = $request -> input('descripcion');
        $Caracteristicas-> caracteristica_nombre = $request -> input('nombre');
        $Caracteristicas-> caracteristica_precio = $request -> input('precio');
        $Caracteristicas-> update();
        return redirect()->route('caracteristicas.index')->with('update', 'Caracteristica actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($caracteristica_cod)
    {
        $Caracteristicas = caracteristica::find($caracteristica_cod);
        $Caracteristicas->delete();
        
        return redirect()->route('caracteristicas.index')->with('delete', 'Caracteristica eliminada exitosamente.');
    }
}
