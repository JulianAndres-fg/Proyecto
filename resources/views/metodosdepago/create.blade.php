@extends('adminlte::page')

@section('title', 'Crear Metodos de pago')

@section('content_header')
    <h1>Crear Metodo de pago</h1>
@stop

@section('content')
    <p>Metodos de pago</p>

    <form action="{{url('metodosdepago')}}" method="POST">
        @csrf

  {{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del metodo de pago" label-class="text-lightblue" value="{{old('nombre')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-list text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

    


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('roles.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop