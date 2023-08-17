@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Servicio</h1>

    <form action="{{url('servicios')}}" method="post">
        @csrf
        {{-- Nombre --}}
        <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del servicio" label-class="text-lightblue" value="{{old('nombre')}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-utensils text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- Estado --}}
        <x-adminlte-select2 name="estado" label="Estado" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Estado" value="{{old('estado')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-check"></i>
            </div>
        </x-slot>
        <option>
        <option>A</option>
        <option>I</option>
    </x-adminlte-select2>

    {{-- Precio --}}
        
    <x-adminlte-input name="precio" label="Precio" placeholder="Precio del servicio" type='number' label-class="text-lightblue" value="{{old('precio')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    {{-- Cantidad --}}
        
    <x-adminlte-input name="cantidad" label="Cantidad" placeholder="Cantidad" type='number' label-class="text-lightblue" value="{{old('cantidad')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-hashtag text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    {{-- botones --}}
    <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
    <a href="{{route('servicios.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>
        
    </form>
@stop

@section('content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop