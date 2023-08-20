@extends('adminlte::page')

@section('title', 'Crear domos caracteristicas')

@section('content_header')
    <h1>Agregar un permiso a un rol</h1>
@stop

@section('content')
    <p>Permiso rol</p>

    <form action="{{url('permisoroles')}}" method="POST">
        @csrf

        {{-- permiso --}}
        <x-adminlte-select2 name="permiso" label="Permiso" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Permiso" value="{{old('permiso')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-check"></i>
            </div>
        </x-slot>
        <option>
        @foreach ($Permisos as $Permiso)
        <option value="{{$Permiso->permiso_cod}}">{{$Permiso->permiso_nombre}}</option>
        @endforeach
 
    </x-adminlte-select2>

    {{-- rol --}}
    <x-adminlte-select2 name="rol" label="Rol" label-class="text-lightblue"
    igroup-size="md" data-placeholder="Rol" value="{{old('rol')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-check"></i>
        </div>
    </x-slot>
    <option>
    @foreach ($Roles as $Rol)
    <option value="{{$Rol->rol_cod}}">{{$Rol->rol_nombre}}</option>
    @endforeach

</x-adminlte-select2>

    


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('permisoroles.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop