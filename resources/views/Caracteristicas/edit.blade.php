@extends('adminlte::page')

@section('title', 'Editar caracteristicas')

@section('content_header')
    <h1>Caracteristicas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Actualizar caracteristicas</h5>
        </div>
        <div class="card-body">
            <form action="{{route('caracteristicas.update',$Caracteristicas->caracteristica_cod)}}" method="POST">
                @csrf
                @method('PUT')

        {{-- Nombre --}}
    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del metodo de pago"
    label-class="text-lightblue" value="{{ $Caracteristicas->caracteristica_nombre }}">
    <x-slot name="prependSlot">
    <div class="input-group-text">
        <i class="fas fa-list text-lightblue"></i>
    </div>
    </x-slot>
    </x-adminlte-input>

    {{-- Precio --}}
 
    <x-adminlte-input name="precio" label="Precio" placeholder="Precio de la caracteristica" type='number'
    label-class="text-lightblue" value="{{ $Caracteristicas->caracteristica_precio }}">
    <x-slot name="prependSlot">
    <div class="input-group-text">
    <i class="fas fa-dollar-sign text-lightblue"></i>
    </div>
    </x-slot>
    </x-adminlte-input>

    {{-- Descripcion --}}
    <x-adminlte-textarea name="descripcion" label="Descripcion" rows=3 label-class="text-lightblue"
    igroup-size="sm" placeholder="Añade una descripción...">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-light">
            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
        </div>
    </x-slot>
    {{ $Caracteristicas->caracteristica_descripcion}}
    </x-adminlte-textarea>

         {{-- Estado --}}
         <x-adminlte-select2 name="estado" label="Estado" label-class="text-lightblue" igroup-size="md"
         data-placeholder="Estado" value="{{ $Caracteristicas->caracteristica_estado }}">
         <x-slot name="prependSlot">
             <div class="input-group-text text-lightblue">
                 <i class="fas fa-check"></i>
             </div>
         </x-slot>
         <option>
             @if ($Caracteristicas->caracteristica_estado == "A")
             <option selected>A</option>
             <option>I</option>
        


             @else ($Caracteristicas->caracteristica_estado == "I")
             <option selected>I</option>
             <option>A</option>

             @endif

     </x-adminlte-select2>
        
        {{-- botones --}}
        <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Actualizar" theme="primary" icon="fas fa-lg fa-save"/>
        <a href="{{route('caracteristicas.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>
        
        
        
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