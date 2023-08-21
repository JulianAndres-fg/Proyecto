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
            'Fecha Registro',
            'Id',
        ];
        $Reservas = reserva::all();
        $Usuarios = User::all();
        $Clientes = cliente::all();
        return view('reserva.index',compact('Reservas','Usuarios','Clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
