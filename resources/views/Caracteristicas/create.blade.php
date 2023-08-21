@extends('adminlte::page')

@section('title', 'Crear caracteristicas')

@section('content_header')
    <h1>Crear Caracteristica</h1>
@stop

@section('content')
    <p>Crear Caracteristica</p>

    <form action="{{url('caracteristicas')}}" method="POST">
        @csrf

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

    {{-- Descripcion --}}
    <x-adminlte-textarea name="descripcion" label="Descripcion" rows=3 label-class="text-lightblue"
    igroup-size="sm" placeholder="Añade una descripción..." value="{{old('descripcion')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-light">
            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-textarea>

{{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de la caracteristica" label-class="text-lightblue" value="{{old('nombre')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-list text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Precio --}}
        
<x-adminlte-input name="precio" label="Precio" placeholder="Precio de la caracteristica" type='number' label-class="text-lightblue" value="{{ number_format(old('precio'), 2, '.', ',') }}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-dollar-sign text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('caracteristicas.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop