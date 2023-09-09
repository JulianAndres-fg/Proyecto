<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct() {
        $this->middleware('permission:ver-servicio|crear-servicio|editar-servicio|borrar-servicio',['only'=>['index']]);   
        $this->middleware('permission:crear-servicio',['only'=>['create','store']]);   
        $this->middleware('permission:editar-servicio',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-servicio',['only'=>['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = [
            'Id',
            'Nombre',
            'Estado',
            'Precio',
            'Cantidad',
            'Acciones',
        ];
        $Servicios = servicio::all();
        return view('servicios.index',compact('Servicios','header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Servicios = new servicio();
        $Servicios-> servicio_nombre = $request -> input('nombre');
        $Servicios-> servicio_estado = $request -> input('estado');
        $Servicios-> servicio_precio = $request -> input('precio');
        $Servicios-> servicio_cantidad = $request -> input('cantidad');
        $Servicios-> save();
        return redirect()->route('servicios.index')->with('success', 'Servicio agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($servicio_cod)
    {
        $Servicios = servicio::find($servicio_cod);
        return view('servicios.edit',compact('Servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $servicio_cod)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric|max:100000',



        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            // 'unique' => 'El campo :attribute debe ser único',
            //agregar validacion maximo para numeros

        ]);
        $Servicios = servicio::find($servicio_cod);
        $Servicios-> servicio_nombre = $request -> input('nombre');
        $Servicios-> servicio_estado = $request -> input('estado');
        $Servicios-> servicio_precio = $request -> input('precio');
        $Servicios-> servicio_cantidad = $request -> input('cantidad');
        $Servicios-> update();
        return redirect()->route('servicios.index')->with('update', 'Servicio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($servicio_cod)
    {
        $Servicios = servicio::find($servicio_cod);
        $Servicios->delete();
        if ($Servicios) {
            $Servicios->caracteristicas()->detach();
        }
        return redirect()->route('servicios.index')->with('delete', 'Servicio eliminado exitosamente.');
    }
}
