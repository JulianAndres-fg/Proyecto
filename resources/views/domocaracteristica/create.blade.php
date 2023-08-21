@extends('adminlte::page')

@section('title', 'Crear domos caracteristicas')

@section('content_header')
    <h1>Agregar caracteristica al domo</h1>
@stop

@section('content')
    <p>Crear domo caracteristica</p>

    <form action="{{url('domocaracteristicas')}}" method="POST">
        @csrf

        {{-- Id_caracteristica --}}
        <x-adminlte-select2 name="caracteristica" label="Caracteristica" label-class="text-lightblue"
        igroup-size="md" data-placeholder="Caracteristica" value="{{old('Caracteristica')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text text-lightblue">
                <i class="fas fa-binoculars"></i>
            </div>
        </x-slot>
        <option>
        @foreach ($Caracteristicas as $Caracteristica)
        <option value="{{$Caracteristica->caracteristica_cod}}">{{$Caracteristica->caracteristica_nombre}}</option>
        @endforeach
 
    </x-adminlte-select2>

    {{-- Id_domo --}}
    <x-adminlte-select2 name="Domo" label="Domo" label-class="text-lightblue"
    igroup-size="md" data-placeholder="Domo" value="{{old('Domo')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-dungeon"></i>
        </div>
    </x-slot>
    <option>
    @foreach ($Domos as $Domo)
    <option value="{{$Domo->domo_cod}}">{{$Domo->domo_nombre}}</option>
    @endforeach

</x-adminlte-select2>

    


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