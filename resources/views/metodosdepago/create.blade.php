@extends('adminlte::page')

@section('title', 'Crear Metodos de pago')

@section('content_header')
    <h1>Metodos de pago</h1>
@stop

@section('content')
<div class="card">

<div class="card-header">
    <h5>Agregar metodos de pago a la lista</h5>
</div>
<div class="card-body">
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
<a href="{{route('metodosdepago.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



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