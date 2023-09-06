<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads =[
            'Cedula',
            'Nombre',
            'Apellido',
            'Correo',
            'Celular',
            'Fecha de nacimiento',
            'Ciudad',
            'Direccion',
            'Acciones',
        ];
         $Clientes = cliente::all();
         return view('cliente.index',compact('heads','Clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('cliente.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'cedula' => 'required|max:20',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'correo' => '|required|email|max:100',
            'celular' => 'required|numeric',
            'fechanac' => 'nullable',
            'ciudad' => 'required|max:50',
            'direccion' => 'nullable|max:100',


        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'email' => 'El campo :attribute debe incluir @',
            // 'unique' => 'El campo :attribute debe ser único',
            //agregar validacion maximo para numeros

        ]);
        $Clientes = new cliente();
        $Clientes-> cliente_cedula = $request -> input('cedula');
        $Clientes-> cliente_nombre = $request -> input('nombre');
        $Clientes-> cliente_apellido = $request -> input('apellido');
        $Clientes-> cliente_correo = $request -> input('correo');
        $Clientes-> cliente_celular = $request -> input('celular');
        $Clientes-> cliente_fech_nac = $request -> input('fechanac');
        $Clientes-> cliente_ciudad = $request -> input('ciudad');
        $Clientes-> cliente_direccion = $request -> input('direccion');
        $Clientes-> save();
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cliente_cedula)
    {
        $Clientes = cliente::find($cliente_cedula);
        return view('cliente.edit',compact('Clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cliente_cedula)
    {
        $request->validate([
            'cedula' => 'required|max:20',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'correo' => '|required|email|max:100',
            'celular' => 'required|numeric',
            'fechanac' => 'nullable',
            'ciudad' => 'required|max:50',
            'direccion' => 'nullable|max:100',


        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener un maximo de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'email' => 'El campo :attribute debe incluir @',
            // 'unique' => 'El campo :attribute debe ser único',
            //agregar validacion maximo para numeros

        ]);
        $Clientes = cliente::find($cliente_cedula);
        $Clientes-> cliente_cedula = $request -> input('cedula');
        $Clientes-> cliente_nombre = $request -> input('nombre');
        $Clientes-> cliente_apellido = $request -> input('apellido');
        $Clientes-> cliente_correo = $request -> input('correo');
        $Clientes-> cliente_celular = $request -> input('celular');
        $Clientes-> cliente_fech_nac = $request -> input('fechanac');
        $Clientes-> cliente_ciudad = $request -> input('ciudad');
        $Clientes-> cliente_direccion = $request -> input('direccion');
        $Clientes-> update();
        return redirect()->route('clientes.index')->with('update', 'Cliente actualizado exitosamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cliente_cedula)
    {
        $Clientes= cliente::find($cliente_cedula);
        $Clientes->delete();
        return redirect()->route('clientes.index')->with('delete', 'Cliente eliminado exitosamente.');
    }
}
