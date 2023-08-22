<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\reserva;
use App\Models\User;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
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
            'Iva',
            'Total',
            'Cliente'
        ];
        $reservas = reserva::all();
        $usuarios = User::all();
        $clientes = cliente::all();
        return view('reservas.index',compact('reservas','usuarios','clientes','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $clientes = cliente::all();
        return view('reservas.create',compact('usuarios','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservas = new reserva();
        $subtotal = $request->input('subtotal');
        $descuento = $request->input('descuento');
        $subtotalConDescuento = $subtotal - ($subtotal * ($descuento / 100));
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;
        $reservas-> reserva_fech_ini = $request -> input('fechaini');
        $reservas-> reserva_fech_fin = $request -> input('fechafin');
        $reservas-> usuario_id = $request -> input('usuario');
        $reservas-> reserva_fech_registro = $request -> input('fechareg');
        $reservas->reserva_subtotal = $subtotal;
        $reservas->reserva_descuento = $descuento;
        $reservas->reserva_iva = $iva;
        $reservas->reserva_total = $total; 
        $reservas-> cliente_id = $request -> input('cliente');
        $reservas-> save();
        return redirect()->route('reservas.index')->with('success', 'Reserva agregado exitosamente.');
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
        //
    }
}
