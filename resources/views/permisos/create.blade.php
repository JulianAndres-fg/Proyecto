@extends('adminlte::page')

@section('title', 'Crear permisos')

@section('content_header')
    <h1>Crear permisos</h1>
@stop

@section('content')
    <p>Permisos</p>

    <form action="{{url('permisos')}}" method="POST">
        @csrf

  {{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del rol" label-class="text-lightblue" value="{{old('nombre')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-list text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

    


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('permisos.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop