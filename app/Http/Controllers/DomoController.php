<?php

namespace App\Http\Controllers;

use App\Models\caracteristica;
use App\Models\domo;
use Illuminate\Http\Request;

class DomoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Nombre',
            'Estado',
            'Precio',
            'Ubicacion',
            'Descripcion',
            'Capacidad',
            'Acciones'
        ];
        $Domos = domo::all();
        return view('domos.index', compact('Domos', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caracteristicas = caracteristica::all();
        return view('domos.create', compact('caracteristicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'nombre' => 'required',
            'estado' => 'required',
            'precio' => 'required|numeric',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'capacidad' => 'required|numeric|max:20',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe ser mayor a :max.',
            'numeric' => 'El campo :attribute debe ser numérico.',
        ]);
        $Domos = new domo();
        $Domos->domo_nombre = $request->input('nombre');
        $Domos->domo_estado = $request->input('estado');
        $Domos->domo_precio = $request->input('precio');
        $Domos->domo_ubicacion = $request->input('ubicacion');
        $Domos->domo_descripcion = $request->input('descripcion');
        $Domos->domo_capacidad = $request->input('capacidad');
        $Domos->save();
        $selectedCaracteristicas = $request->input('selectedCaracteristicas');
        if ($selectedCaracteristicas) {
            $caracteristicaCodArray = caracteristica::whereIn('caracteristica_cod', $selectedCaracteristicas)->pluck('caracteristica_cod')->toArray();
            $Domos->caracteristicas()->sync($caracteristicaCodArray);
        }
        return redirect()->route('domos.index')->with('success', 'Domo agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($domo_cod)
    {
        $domos=domo::find($domo_cod);
        return view('domos.show',compact('domos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($domo_cod)
    {
        $Domos = domo::find($domo_cod);
        $caracteristicas = caracteristica::all();
        return view('domos.edit', compact('Domos', 'caracteristicas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $domo_cod)
    { {
            $request->validate([
                'nombre' => 'required',
                'estado' => 'required',
                'precio' => 'required|numeric',
                'ubicacion' => 'required',
                'descripcion' => 'required',
                'capacidad' => 'required|numeric|max:20',
            ], [
                'required' => 'El campo :attribute es obligatorio.',
                'max' => 'El campo :attribute no debe ser mayor a :max.',
                'numeric' => 'El campo :attribute debe ser numérico.',
            ]);
            $Domos = domo::find($domo_cod);
            $Domos->domo_nombre = $request->input('nombre');
            $Domos->domo_estado = $request->input('estado');
            $Domos->domo_precio = $request->input('precio');
            $Domos->domo_ubicacion = $request->input('ubicacion');
            $Domos->domo_descripcion = $request->input('descripcion');
            $Domos->domo_capacidad = $request->input('capacidad');
            $Domos->update();
            $selectedCaracteristicas = $request->input('selectedCaracteristicas');
            if ($selectedCaracteristicas) {
                $caracteristicaCodArray = caracteristica::whereIn('caracteristica_cod', $selectedCaracteristicas)->pluck('caracteristica_cod')->toArray();
                $Domos->caracteristicas()->sync($caracteristicaCodArray);
            }
            return redirect()->route('domos.index')->with('update', 'Domo actualizado exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($domo_cod)
    {
        $domos = domo::find($domo_cod);
        $domos->delete();
        if ($domos) {
            $domos->caracteristicas()->detach();
        }
        return redirect()->route('domos.index')->with('delete', 'Domo eliminado exitosamente.');
    }
}
