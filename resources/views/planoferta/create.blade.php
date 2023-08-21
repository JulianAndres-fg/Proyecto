@extends('adminlte::page')

@section('title', 'Crear plan oferta')

@section('content_header')
    <h1>Agregar plan a la oferta</h1>
@stop

@section('content')
    <p>Crear plan oferta</p>

    <form action="{{url('planoferta')}}" method="POST">
        @csrf

        {{-- Fecha Inicio --}}
@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="fechainicial" label="Fecha inicial" label-class="text-lightblue" :config="$config" placeholder="Seleccione la fecha inicial..">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-birthday-cake"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

{{-- Fecha final--}}
@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="fechafinal" label="Fecha final" label-class="text-lightblue" :config="$config" placeholder="Seleccione la fecha final..">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-birthday-cake"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

        {{-- Id_plan --}}
        <x-adminlte-select2 name="plan" label="Plan" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Plan" value="{{old('plan')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-list"></i>
            </div>
        </x-slot>
        <option>
        @foreach ($planes as $plan)
        <option value="{{$plan->plan_cod}}">{{$plan->plan_nombre}}</option>
        @endforeach
 
    </x-adminlte-select2>

    {{-- Id_oferta --}}
    <x-adminlte-select2 name="oferta" label="Oferta" label-class="text-lightblue"
    igroup-size="md" data-placeholder="Oferta" value="{{old('oferta')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    <option>
    @foreach ($Ofertas as $Oferta)
    <option value="{{$Oferta->oferta_cod}}">{{$Oferta->oferta_nombre}}</option>
    @endforeach
    
</x-adminlte-select2>

 {{-- Nombre --}}
 <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del plan oferta" label-class="text-lightblue" value="{{old('nombre')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-list text-lightblue"></i>
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



    


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('planoferta.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>



    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop