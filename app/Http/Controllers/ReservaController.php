<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\reserva;
use App\Models\servicio;
use App\Models\domo;
use App\Models\metodoDePago;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function __construct() {
        $this->middleware('permission:ver-reserva|crear-reserva|editar-reserva|borrar-reserva',['only'=>['index']]);   
        $this->middleware('permission:crear-reserva',['only'=>['create','store']]);   
        $this->middleware('permission:editar-reserva',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-reserva',['only'=>['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Usuario',
            'Cedula cliente',
            'Cliente',
            'Domo',
            'Acciones',


        ];
        $reservas = reserva::all();
        $usuarios = User::all();
        $clientes = cliente::all();
        $domos = domo::all();
        $metodos_de_pagos = metodoDePago::all();
        return view('reservas.index',compact('reservas','usuarios','clientes','domos','metodos_de_pagos','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fechhoy = Carbon::now()->format('Y-m-d');
        $usuarios = User::all();
        $clientes = cliente::all();
        $servicios = servicio::all();
        $domos = domo::all();
        $metodos_de_pagos = metodoDePago::all();

        return view('reservas.create',compact('usuarios','clientes','fechhoy','domos','servicios','metodos_de_pagos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaini' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
            'fechafin' => 'required|date|after:fechaini|not_in:' . Carbon::now()->format('Y-m-d'),
            'descuento' => 'required|numeric|max:100',
            'domo' =>'required',
            'cliente' => 'required',
        ], [
            'required' => 'El campo es obligatorio.',
            'date' => 'El formato de la fecha de inicio no es válido.',
            'after_or_equal' => 'La fecha de inicio debe ser posterior a la fecha de hoy',
            'after' => 'La fecha final debe ser posterior a la fecha de inicio.',
            'not_in' => 'La fecha final no puede ser igual a la fecha de hoy.',
            'max' => 'El :attribute no debe ser mayor a :max%.',
        ]);

        
    


        $reservas = new reserva();
        $usuarioauth = Auth::user();
        // Obtener las fechas del formulario 
        $fecha_inicio = $request->input('fechaini'); $fecha_fin = $request->input('fechafin');
        //Convertir las fechas a instancias de Carbon 
        $fecha_inicio = Carbon::parse($fecha_inicio); $fecha_fin = Carbon::parse($fecha_fin);
        // Obtener el número de días entre las fechas 
        $dias = $fecha_inicio->diffInDays($fecha_fin);

        $domoPrecio = $request->input('domo_precio');
        $servicioprecio = $request->input('selectedCaracteristicasPrecio');
        if (!empty($servicioprecio) && isset($servicioprecio[0])) {
            $preciosArray = json_decode($servicioprecio[0], true);
            $precioca = array_sum($preciosArray); 
        } else {
           $precioca = 0;
        };
        $subtotal = ($precioca + $domoPrecio) * $dias;
        $descuento = $request->input('descuento');
        $subtotalConDescuento = $subtotal - ($subtotal * ($descuento / 100));
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;
        
        $reservas->reserva_fech_ini = $request->input('fechaini');
        $reservas->reserva_fech_fin = $request->input('fechafin');
        $reservas->usuario_id = $usuarioauth->id;
        $reservas->reserva_fech_registro = Carbon::now()->format('Y-m-d');
        $reservas->reserva_subtotal = $subtotalConDescuento;
        $reservas->domo_id = $request->input('domo');
        $reservas->reserva_descuento = $descuento;
        $reservas->reserva_iva = $iva;
        $reservas->reserva_total = $total; 
        $reservas->cliente_id = $request->input('cliente');
        $reservas->metodo_de_pago_id = $request->input('metododepago');
        
        $reservas->save();
        
        $selectedCaracteristicas = $request->input('selectedCaracteristicas');
        
        if ($selectedCaracteristicas) {
            $caracteristicaCodArray = servicio::whereIn('servicio_cod', $selectedCaracteristicas)->pluck('servicio_cod')->toArray();
            $serviciosInfo = servicio::whereIn('servicio_cod', $selectedCaracteristicas)->get(['servicio_cod', 'servicio_precio', 'servicio_cantidad']);
            
            $validServices = $serviciosInfo->pluck('servicio_cod')->toArray();
            $caracteristicaCodArray = array_intersect($caracteristicaCodArray, $validServices);
            $syncData = [];
            
            foreach ($caracteristicaCodArray as $serviceCode) {
                $servicio = $serviciosInfo->where('servicio_cod', $serviceCode)->first();
            
                if ($servicio) {
                    $syncData[$serviceCode] = [
                        'detalle_servicio_precio' => $servicio->servicio_precio,
                        'detalle_servicio_cantidad' => $servicio->servicio_cantidad,
                    ];
                }
            }
            
            $reservas->servicio()->sync($syncData);
        }
        
        return redirect()->route('reservas.index')->with('success', 'Reserva agregada exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($reserva_cod)
    {
        $reservas = reserva::find($reserva_cod);
        $domos = domo::all();
        $usuarios = User::all();
        $clientes = cliente::all();
        $metodos_de_pagos = metodoDePago::all();
        $servicios = servicio::all();
        return view('reservas.show',compact('reservas','usuarios','domos','clientes','metodos_de_pagos','servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reserva_cod)
    {
        $reservas = reserva::find($reserva_cod);
        $fechhoy = Carbon::now()->format('Y-m-d');
        $servicios = servicio::all();
        $usuarios = User::all();
        $domos = domo::all();
        $clientes = cliente::all();
        $metodos_de_pagos = metodoDePago::all();
        return view('reservas.edit', compact('reservas','servicios','usuarios','domos','metodos_de_pagos','fechhoy','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $reserva_cod)
    {
        $request->validate([
            'fechafin' => 'required|date|after:fechaini|not_in:' . Carbon::now()->format('Y-m-d'),
            'descuento' => 'required|numeric|max:100',
            'domo' =>'required',
            'cliente' => 'required',
        ], [
            'required' => 'El campo es obligatorio.',
            'date' => 'El formato de la fecha de inicio no es válido.',
            'after_or_equal' => 'La fecha de inicio debe ser posterior a la fecha de hoy',
            'after' => 'La fecha final debe ser posterior a la fecha de inicio.',
            'not_in' => 'La fecha final no puede ser igual a la fecha de hoy.',
            'max' => 'El :attribute no debe ser mayor a :max%.',
        ]);
        $reservas = reserva::find($reserva_cod);
        $usuarioauth = Auth::user();
        // Obtener las fechas del formulario 
        $fecha_inicio = $request->input('fechaini'); $fecha_fin = $request->input('fechafin');
        //Convertir las fechas a instancias de Carbon 
        $fecha_inicio = Carbon::parse($fecha_inicio); $fecha_fin = Carbon::parse($fecha_fin);
        // Obtener el número de días entre las fechas 
        $dias = $fecha_inicio->diffInDays($fecha_fin);
        $domoPrecio = $request->input('domo_precio');
        $servicioprecio = $request->input('selectedCaracteristicasPrecio');
        if (!empty($servicioprecio) && isset($servicioprecio[0])) {
            $preciosArray = json_decode($servicioprecio[0], true);
            $precioca = array_sum($preciosArray); 
        } else {
           $precioca = 0;
        };
        $subtotal = ($precioca + $domoPrecio) * $dias;
        //dd($subtotal);
        $descuento = $request->input('descuento');
        $subtotalConDescuento = $subtotal - ($subtotal * ($descuento / 100));
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;
        
        $reservas->reserva_fech_ini = $request->input('fechaini');
        $reservas->reserva_fech_fin = $request->input('fechafin');
        $reservas->usuario_id = $usuarioauth->id;
        $reservas->reserva_fech_registro = Carbon::now()->format('Y-m-d');
        $reservas->reserva_subtotal = $subtotalConDescuento;
        $reservas->domo_id = $request->input('domo');
        $reservas->reserva_descuento = $descuento;
        $reservas->reserva_iva = $iva;
        $reservas->reserva_total = $total; 
        $reservas->cliente_id = $request->input('cliente');
        $reservas->metodo_de_pago_id = $request->input('metododepago');
        
        $reservas->update();
        
        $selectedCaracteristicas = $request->input('selectedCaracteristicas');
        
        if ($selectedCaracteristicas) {
            $caracteristicaCodArray = servicio::whereIn('servicio_cod', $selectedCaracteristicas)->pluck('servicio_cod')->toArray();
            $serviciosInfo = servicio::whereIn('servicio_cod', $selectedCaracteristicas)->get(['servicio_cod', 'servicio_precio', 'servicio_cantidad']);
            
            $validServices = $serviciosInfo->pluck('servicio_cod')->toArray();
            $caracteristicaCodArray = array_intersect($caracteristicaCodArray, $validServices);
            $syncData = [];
            
            foreach ($caracteristicaCodArray as $serviceCode) {
                $servicio = $serviciosInfo->where('servicio_cod', $serviceCode)->first();
            
                if ($servicio) {
                    $syncData[$serviceCode] = [
                        'detalle_servicio_precio' => $servicio->servicio_precio,
                        'detalle_servicio_cantidad' => $servicio->servicio_cantidad,
                    ];
                }
            }
            
            $reservas->servicio()->sync($syncData);
        }
        
        return redirect()->route('reservas.index')->with('update', 'Reserva actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reserva_cod)
    {
        $reservas = reserva::find($reserva_cod);
        $reservas->delete();
        return redirect()->route('reservas.index')->with('delete', 'Reserva eliminado exitosamente.');
    }
}
