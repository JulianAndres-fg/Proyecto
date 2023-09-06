@extends('adminlte::page')

@section('title', 'Editar servicio')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <h5>Actualizar servicio a la lista</h5>
</div>
<div class="card-body">

    <form action="{{route('servicios.update',$Servicios->servicio_cod)}}" method="POST">
        @csrf
        @method('PUT')


{{-- Nombre --}}
<x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del servicio" label-class="text-lightblue" value="{{$Servicios->servicio_nombre}}" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- Estado --}}
<x-adminlte-select2 name="estado" label="Estado" label-class="text-lightblue" igroup-size="md"
data-placeholder="Estado" value="{{ $Servicios->servicio_estado }}">
<x-slot name="prependSlot">
    <div class="input-group-text text-lightblue">
        <i class="fas fa-check"></i>
    </div>
</x-slot>
<option>
    @if ($Servicios->servicio_estado == "A")
    <option selected>A</option>
    <option>I</option>


    @else ($Domos->domo_estado == "I")
    <option selected>I</option>
    <option>A</option>


    @endif

</x-adminlte-select2>

{{-- Precio --}}

<x-adminlte-input name="precio" label="Precio" placeholder="Precio del servicio" type='number'
label-class="text-lightblue" value="{{ $Servicios->servicio_precio }}">
<x-slot name="prependSlot">
    <div class="input-group-text">
        <i class="fas fa-dollar-sign text-lightblue"></i>
    </div>
</x-slot>
</x-adminlte-input>

{{-- Cantidad --}}
                
<x-adminlte-input name="cantidad" label="Cantidad" placeholder="Cantidad del servicio" type='number' label-class="text-lightblue" value="{{ $Servicios->servicio_cantidad }}">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-hashtag text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Actualizar" theme="primary"
icon="fas fa-lg fa-save" />
<a href="{{ route('servicios.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>

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