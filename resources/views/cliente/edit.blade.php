@extends('adminlte::page')

@section('title', 'Editar cliente')

@section('content_header')
    <h1>clientes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <h5>Actualizar cliente a la lista</h5>
</div>
<div class="card-body">

    <form action="{{route('clientes.update',$Clientes->cliente_cedula)}}" method="POST">
        @csrf
        @method('PUT')
{{-- Cedula --}}
<x-adminlte-input name="cedula" label="Cedula" placeholder="Cedula del cliente" label-class="text-lightblue" value="{{$Clientes->cliente_cedula}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-id-card text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del cliente" label-class="text-lightblue" value="{{$Clientes->cliente_nombre}}" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Apellido --}}
<x-adminlte-input name="apellido" label="Apellido" placeholder="Apellido del cliente" label-class="text-lightblue" value="{{$Clientes->cliente_apellido}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-list text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Correo --}}
<x-adminlte-input name="correo" label="Email" placeholder="Correo electronico del cliente" label-class="text-lightblue" value="{{$Clientes->cliente_correo}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-envelope text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Celular --}}
<x-adminlte-input name="celular" type="number" label="Celular" placeholder="Numero celular del cliente" label-class="text-lightblue" value="{{$Clientes->cliente_celular}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-mobile text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Fecha --}}
@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="fechanac" label="Fecha nacimiento" label-class="text-lightblue" :config="$config" placeholder="Seleccione la fecha de nacimiento.." value="{{$Clientes->cliente_fech_nac}}">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-birthday-cake"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>
    
{{-- Ciudad --}}
<x-adminlte-input name="ciudad" label="Ciudad" placeholder="Ciudad de cliente" label-class="text-lightblue" value="{{old('ciudad')}}" value="{{$Clientes->cliente_ciudad}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-building text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Direccion --}}
<x-adminlte-input name="direccion" label="Direccion" placeholder="Direccion de cliente" label-class="text-lightblue" value="{{$Clientes->cliente_direccion}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-route text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('clientes.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>

    </form>
</div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop