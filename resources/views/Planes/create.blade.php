@extends('adminlte::page')

@section('title', 'Crear planes')

@section('content_header')
    <h1>Planes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Agrega planes a la lista</h5>
    </div>
    <div class="card-body">
        <form action="{{ url('planes') }}" method="POST">
            @csrf

            
            {{-- nombre --}}
            <x-adminlte-input name="nombre" label="Nombre del plan" placeholder="Nombre del plan" label-class="text-lightblue"
                value="{{ old('nombre') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-list text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
    
            {{-- precio --}}
            <x-adminlte-input name="precio" label="Precio del plan" placeholder="Precio del plan" type='number'
                label-class="text-lightblue" value="{{ old('precio') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            
            {{-- domo --}}
            <x-adminlte-select2 name="domo" label="Domo" label-class="text-lightblue" igroup-size="md"
                data-placeholder="Domo">
                <x-slot name="prependSlot">
                    <div class="input-group-text text-lightblue">
                        <i class="fas fa-dungeon"></i>
                    </div>
                </x-slot>
                <option>          
                  
                    @foreach ($domos as $domo)
                <option value="{{ $domo->domo_cod }}" @if (old('domo') == $domo->domo_cod) selected @endif>{{ $domo->domo_nombre }}</option>
                @endforeach
                {{ old('domo') }}
            </x-adminlte-select2>
    
            {{-- estado --}}
            <x-adminlte-select2 name="estado" label="Estado del plan" label-class="text-lightblue" igroup-size="md"
                data-placeholder="Estado del plan">
                <x-slot name="prependSlot">
                    <div class="input-group-text text-lightblue">
                        <i class="fas fa-check"></i>
                    </div>
                </x-slot>
               
                <option>
                <option value="A" @if (old('estado')== 'A') selected @endif>A</option>
                <option value="I" @if (old('estado') == 'I') selected @endif>I</option>
                
            </x-adminlte-select2>
    
            {{-- descripcion --}}
            <x-adminlte-textarea name="descripcion" label="Descripcion del plan" rows=3 label-class="text-lightblue"
                igroup-size="sm" placeholder="Añade una descripción...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-light">
                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                    </div>
                </x-slot>
                {{ old('descripcion') }}
            </x-adminlte-textarea>
    
    
            {{-- botones --}}
            <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success"
            icon="fas fa-lg fa-save"/>
        
            <a href="{{ route('planes.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>
    
    
     
            
            <button type="button" class="btn btn-primary m-3 float-right" data-toggle="modal" data-target="#servicioModal">
                Seleccionar servicio
            </button>
            <button type="button" class="btn btn-primary m-3 float-right" data-toggle="modal" data-target="#ofertaModal">
                Seleccionar oferta
            </button>
            

            {{-- Formulario para ofertas --}}

            <div class="modal fade" id="ofertaModal" tabindex="-1" role="dialog" aria-labelledby="ofertaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ofertaModalLabel">Seleccionar oferta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" data-target="#ofertaModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form id="ofertaForm" action="{{ route('planes.store') }}" method="post"> <!-- Cambia la URL del formulario a la de tu controlador store -->
                                @csrf
                                
                                @php
                                    $config = ['format' => 'YYYY-MM-DD'];
                                @endphp
                                <x-adminlte-input-date name="fechainicial" label="Fecha inicial" label-class="text-lightblue"
                                    :config="$config" placeholder="Seleccione la fecha inicial.." value="{{ old('fechainicial') }}">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text text-lightblue">
                                            <i class="fas fa-birthday-cake"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
            
                                {{-- Fecha final --}}
                                @php
                                    $config = ['format' => 'YYYY-MM-DD'];
                                @endphp
                                <x-adminlte-input-date name="fechafinal" label="Fecha final" label-class="text-lightblue"
                                    :config="$config" placeholder="Seleccione la fecha final.." value="{{ old('fechafinal') }}">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text text-lightblue">
                                            <i class="fas fa-birthday-cake"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                                <x-adminlte-select2 name="selectedCaracteristicas[]" id="selectedCaracteristicas" label="Oferta"
                                    label-class="text-lightblue" igroup-size="md" data-placeholder="Oferta" multiple>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text text-lightblue">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                    </x-slot>
                                    <option>
                                        @foreach ($ofertas as $oferta)
                                            <option value="{{ $oferta->oferta_cod }}" @if (in_array($oferta->oferta_cod, old('selectedCaracteristicas', []))) selected @endif>{{ $oferta->oferta_nombre }}</option>
                                        @endforeach
                                    </option>
                                </x-adminlte-select2>
                                <input type="hidden" name="modal_origin" value="oferta">
                                <input type="hidden" id="selectedCaracteristicasInput" name="selectedCaracteristicas[]">
                                {{-- Nombre --}}
                                <x-adminlte-input name="nombreof" label="Nombre" placeholder="Nombre del plan oferta" label-class="text-lightblue" value="{{ old('nombreof') }}">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-list text-lightblue"></i>
                                        </div>
                                    </x-slot> 
                                </x-adminlte-input>
            
                                {{-- Estado --}}
                                <x-adminlte-select2 name="estadoof" label="Estado" label-class="text-lightblue" igroup-size="md" data-placeholder="Estado" value="{{ old('estadoof') }}">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text text-lightblue">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </x-slot>
                                    <option>
                                        <option value="A" @if (old('estadoof') == 'A') selected @endif>A</option>
                                        <option value="I" @if (old('estadoof') == 'I') selected @endif>I</option>
                                    </option>
                                </x-adminlte-select2>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="submitOfertaForm();">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="servicioModal" tabindex="-1" role="dialog" aria-labelledby="servicioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="servicioModalLabel">Seleccionar servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" data-target="#servicioModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Formulario para servicios --}}
                            <form id="servicioForm" action="{{ route('planes.store') }}" method="post"> 
                                @csrf
                                @foreach ($servicios as $servicio)
                                    @if ($servicio->servicio_estado == 'A')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="selectedServicios[]"
                                                value="{{ $servicio->servicio_cod }}">
                                            <label class="form-check-label">{{ $servicio->servicio_nombre }}</label>
                                        </div>
                                    @endif
                                @endforeach
                                <input type="hidden" name="modal_origin" value="servicio">

                                <input type="hidden" id="selectedServiciosInput" name="selectedServicios[]">
                                
                               
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="submitservicioForm();">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
         
            
            
            {{-- modal de seleccion --}}                
        </form>
    </div>
</div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

{{-- evento --}}
<script>
     function submitservicioForm() {
     let modalOrigin = $('#modal_origin_servicio').val();
     let selectedServicios = $('#servicioForm input[name="selectedServicios[]"]:checked').map(function () {
         return $(this).val();
     }).get();

     if (modalOrigin === "servicio") {
        $('#selectedServiciosInput').val(selectedServicios);
        console.log(selectedServicios);
    }

     $('#servicioModal').modal('hide');
 }
 
</script>


<script>
     function submitOfertaForm() {
            let modalOrigin = $('#modal_origin_oferta').val();
            let selectedCaracteristicas = $('#selectedCaracteristicas').val();

            if (modalOrigin === "oferta") {
            $('#selectedCaracteristicasInput').val(selectedCaracteristicas);
            console.log(selectedCaracteristicas);
        }

            $('#ofertaModal').modal('hide');
        }
</script>

@stop
