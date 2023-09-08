<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{

    public function __construct() {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario',['only'=>['index']]);   
        $this->middleware('permission:crear-usuario',['only'=>['create','store']]);   
        $this->middleware('permission:editar-usuario',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-usuario',['only'=>['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Nombre',
            'Email',
            'Rol',
            'Acciones'
        ];
        $usuarios = User::all();
        return view('usuarios.index',compact('usuarios','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','id');
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password']= hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','id')->all();
        return view('usuarios.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']); 
        } else {
            $input = Arr::except($input,['password']);
        }
        
        $user = User::find($id);
        $user->update($input);
        $user->syncRoles($request->input('roles'));
        
        return redirect()->route('usuarios.index')->with('update', 'Usuario actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('delete', 'Usuario Eliminado exitosamente.');

    }
}
