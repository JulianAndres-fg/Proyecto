@extends('adminlte::page')

@section('title', 'Crear domos')

@section('content_header')
    <h1>Domos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Agrega domos a la lista</h5>
        </div>
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
                 <x-adminlte-select2 name="estado" label="Estado del domo" label-class="text-lightblue"
                 igroup-size="md" data-placeholder="Estado del domo" value="{{old('estado')}}">
                 <x-slot name="prependSlot">
                     <div class="input-group-text text-lightblue">
                         <i class="fas fa-check"></i>
                     </div>
                 </x-slot>
                 <option>
                 <option value="A" @if (old('estado') == 'A')  selected @endif>A</option>
                 <option value="I" @if (old('estado') == 'I')  selected @endif>I</option>
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
                    <x-adminlte-textarea name="descripcion" label="Descripcion del domo" rows=3 label-class="text-lightblue"
                    igroup-size="sm" placeholder="Añade una descripción..." value="{{old('descripcion')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{ old('descripcion') }}
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

                <button type="button" class="btn btn-primary m-3 float-right" data-toggle="modal" data-target="#caracteristicasModal">
                    Seleccionar Características
                </button>

                <div class="modal fade" id="caracteristicasModal" tabindex="-1" role="dialog"
                aria-labelledby="caracteristicasModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="caracteristicasModalLabel">Seleccionar Características</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Formulario para características --}}
                            <form id="caracteristicasForm" action="{{url('domos')}}" method="post">
                                @csrf
                                @foreach ($caracteristicas as $caracteristica)
                                @if ($caracteristica->caracteristica_estado == 'A')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selectedCaracteristicas[]"
                                        value="{{ $caracteristica->caracteristica_cod }}">
                                    <label
                                        class="form-check-label">{{ $caracteristica->caracteristica_nombre }}</label>
                                </div>
                                @endif
                                @endforeach
                                <input type="hidden" id="selectedCaracteristicasInput" name="selectedCaracteristicas[]">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary"
                                onclick="submitCaracteristicasForm();">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>

            
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function submitCaracteristicasForm() {
     let selectedCaracteristicas = $('input[name="selectedCaracteristicas[]"]:checked').map(function () {
         return $(this).val();
     }).get();
 
     $('#selectedCaracteristicasInput').val(selectedCaracteristicas);
     console.log(selectedCaracteristicas);
 
     $('#caracteristicasModal').modal('hide');
 }
 
     </script>
@stop