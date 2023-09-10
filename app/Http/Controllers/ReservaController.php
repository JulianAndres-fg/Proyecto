<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\reserva;
use App\Models\servicio;
use App\Models\domo;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'Fecha inicio',
            'Fecha fin',
            'Usuario',
            'Fecha registro',
            'Subtotal',
            'Descuento',
            'Domo',
            'Iva',
            'Total',
            'Cliente'

        ];
        $reservas = reserva::all();
        $usuarios = User::all();
        $clientes = cliente::all();
        $domos = domo::all();
        return view('reservas.index',compact('reservas','usuarios','clientes','domos','heads'));
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
        return view('reservas.create',compact('usuarios','clientes','fechhoy','domos','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaini' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
            'fechafin' => 'required|date|after:fechaini|not_in:' . Carbon::now()->format('Y-m-d'),
            'usuario' => 'required',
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
        $domoPrecio = $request->input('domo_precio');
        $servicioprecio = $request->input('selectedCaracteristicasPrecio');
        if (!empty($servicioprecio) && isset($servicioprecio[0])) {
            $preciosArray = json_decode($servicioprecio[0], true);
            $precioca = array_sum($preciosArray); 
        } else {
           $precioca = 0;
        };
        $subtotal = $precioca + $domoPrecio;
        $descuento = $request->input('descuento');
        $subtotalConDescuento = $subtotal - ($subtotal * ($descuento / 100));
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;
        
        $reservas->reserva_fech_ini = $request->input('fechaini');
        $reservas->reserva_fech_fin = $request->input('fechafin');
        $reservas->usuario_id = $request->input('usuario');
        $reservas->reserva_fech_registro = Carbon::now()->format('Y-m-d');
        $reservas->reserva_subtotal = $subtotalConDescuento;
        $reservas->domo_id = $request->input('domo');
        $reservas->reserva_descuento = $descuento;
        $reservas->reserva_iva = $iva;
        $reservas->reserva_total = $total; 
        $reservas->cliente_id = $request->input('cliente');
        
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
    public function show(reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reserva $reserva)
    {
        
    }
}
