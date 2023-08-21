@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear Plan</h1>
@stop

@section('content')
    <p>Rellene el formulario para agregar el plan</p>
    <form action="{{url('planes')}}" method="POST">
        @csrf

        <x-adminlte-input name="nombre" label="Nombre del plan" placeholder="Nombre del plan" label-class="text-lightblue" value="{{old('nombre')}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-list text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="precio" label="Precio del plan" placeholder="Precio del plan" type='number' label-class="text-lightblue" value="{{old('precio')}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-dollar-sign text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-select2 name="domo" label="Domo" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Domo" value="{{old('nombre')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-dungeon"></i>
            </div>
        </x-slot>
        <option>
        @foreach ($domos as $domo)
        <option value="{{$domo->domo_cod}}">{{$domo->domo_nombre}}</option>
        @endforeach
 
    </x-adminlte-select2>

        <x-adminlte-select2 name="estado" label="Estado del plan" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Estado del plan" value="{{old('estado')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-check"></i>
            </div>
        </x-slot>
        <option>
        <option>A</option>
        <option>I</option>
    </x-adminlte-select2>

    <x-adminlte-textarea name="descripcion" label="Descripcion del plan" rows=3 label-class="text-lightblue"
    igroup-size="sm" placeholder="Añade una descripción..." value="{{old('descripcion')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-light">
            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-textarea>


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('domocaracteristicas.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop