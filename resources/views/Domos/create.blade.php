@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Domo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{url('domos')}}" method="POST">
                @csrf
                {{-- Nombre --}}
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del domo" label-class="text-lightblue" value="{{old('nombre')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dungeon text-lightblue"></i>
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
        
                 <x-adminlte-input name="precio" label="Precio" placeholder="Precio del domo" type='number' label-class="text-lightblue" value="{{old('precio')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                  {{-- Ubicacion --}}
                  <x-adminlte-input name="ubicacion" label="Ubicacion" placeholder="Ubicación del domo" label-class="text-lightblue" value="{{old('ubicacion')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-mountain text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                    {{-- Descripcion --}}
                    <x-adminlte-textarea name="descripcion" label="Descripcion" rows=3 label-class="text-lightblue"
                    igroup-size="sm" placeholder="Añade una descripción..." value="{{old('descripcion')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
                
                {{-- Capacidad --}}
        
                <x-adminlte-input name="capacidad" label="Capacidad" placeholder="Capacidad del domo" type='number' label-class="text-lightblue" value="{{old('capacidad')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user-plus text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                {{-- botones --}}
                <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
                <a href="{{route('domos.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>
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