@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Actualiza usuarios</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <x-adminlte-input name="name" label="Nombre del usuario" placeholder="Nombre del usuario"  value="{{$user->name}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="email" label="Email del usuario" placeholder="Email del usuario"   value="{{$user->email}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="password" type="password" label="Contraseña" placeholder="Contraseña" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-lock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="confirm-password" type="password" label="Confirmar contraseña" placeholder="Confirmar contraseña" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-lock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-select2 name="roles[]" label="roles" igroup-size="md" data-placeholder="Roles">
                    <x-slot name="prependSlot">
                        <div class="input-group-text ">
                            <i class="fas fa-chess text-info"></i>
                        </div>
                    </x-slot>
                    @foreach ($roles as $roleId => $roleName)
                    <option value="{{ $roleId }}" {{ in_array($roleId, $userRole) ? 'selected' : '' }}>
                        {{ $roleName }}
                    </option>
                @endforeach
                </x-adminlte-select2>
                
        
            <button type="submit" class="btn btn-success my-3 d-inline-block">Guardar</button>
            <a href="{{url('usuarios')}}" class="btn btn-info d-inline-block">Regresar</a>
            </form>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    @stop
