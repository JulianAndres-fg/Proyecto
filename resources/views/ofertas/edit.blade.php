@extends('adminlte::page')

@section('title', 'Editar oferta')

@section('content_header')
    <h1>Ofertas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <h5>Actualizar oferta a la lista</h5>
</div>
<div class="card-body">

    <form action="{{route('ofertas.update',$Ofertas->oferta_cod)}}" method="POST">
        @csrf
        @method('PUT')


{{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de la oferta" label-class="text-lightblue" value="{{$Ofertas->oferta_nombre}}" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>


{{-- Descuento --}}

<x-adminlte-input name="descuento" label="Descuento" placeholder="Descuento" type='number'
label-class="text-lightblue" value="{{ $Ofertas->oferta_descuento }}">
<x-slot name="prependSlot">
    <div class="input-group-text">
        <i class="fas fa-percent text-lightblue"></i>
    </div>
</x-slot>
</x-adminlte-input>


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Actualizar" theme="primary"
icon="fas fa-lg fa-save" />
<a href="{{ route('ofertas.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>

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