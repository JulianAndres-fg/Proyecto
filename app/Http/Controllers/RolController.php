<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function __construct() {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);   
        $this->middleware('permission:crear-rol',['only'=>['create','store']]);   
        $this->middleware('permission:editar-rol',['only'=>['edit','update']]);  
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Nombre',
            'Acciones',
        ];
        $roles = Role::all();
        return view('roles.index',compact('roles','heads'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|string|max:255',
            
        ],[
            
            'required' => 'El campo es requerido',
        ]);
        
      $role = Role::create(['name' => $request->input('name')]);
      $role->syncPermissions($request->input('permission'));
      return redirect()->route('roles.index')->with('success', 'Rol agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolepermission = $role->permissions->pluck('id')->all();
        return view('roles.edit',compact('role','permission','rolepermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $role -> name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('update', 'Rol actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('delete', 'Rol eliminado exitosamente.');
    }
}
