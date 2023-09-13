@extends('adminlte::page')

@section('title', 'Crear reserva')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')
    <div class="card">       
        <div class="card-header">
            <h5>Crear reserva</h5>
        </div>
        <div class="card-body">

            <form action="{{ url('reservas') }}" method="POST">
                @csrf
                {{-- Fecha inicio --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fechaini" label="Fecha inicio reserva" label-class="text-lightblue"
                    :config="$config" placeholder="Seleccione la fecha de inicio de reserva.." value="{{ old('fechaini') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>

                {{-- Fecha fin --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fechafin" label="Fecha fin reserva" label-class="text-lightblue"
                    :config="$config" placeholder="Seleccione la fecha de fin de reserva.." value="{{ old('fechafin') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>

                {{-- fecha registro --}}

                <x-adminlte-input-date name="fechareg" label="Fecha de registro reserva" label-class="text-lightblue"
                    :config="$config" placeholder="Seleccione la fecha de registro de la reserva.." :value="$fechhoy"
                    :disabled="true">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>


                {{-- Descuento --}}

                <x-adminlte-input name="descuento" label="Descuento" placeholder="Descuento de la reserva" type='number'
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-percent text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Domo --}}
                <input type="hidden" name="domo_precio" id="domo_precio" value="">

                <x-adminlte-select2 name="domo" label="Domo" label-class="text-lightblue" igroup-size="md"
                    data-placeholder="Domo" id="domoSelect">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-dungeon"></i>
                        </div>
                    </x-slot>
                    @foreach ($domos as $domo)
                        @if ($domo->domo_estado == "A")
                            <option value="{{ $domo->domo_cod }}" data-precio="{{ $domo->domo_precio }}">
                                {{ $domo->domo_nombre }}
                            </option>
                        @endif
                    @endforeach
                </x-adminlte-select2>

                {{-- Alerta para cuando no hay domos disponibles --}}
                <div class="alert alert-danger mt-3" id="domo-alert" style="display: none;">
                    No hay domos disponibles o se encuentran inactivos si deseas registrar un nuevo domo o cambiar el estado dale <a href="{{route('domos.index')}}">click aqui</a>.
                </div>

                {{-- Cliente --}}
                <x-adminlte-select2 name="cliente" label="Cliente" label-class="text-lightblue" igroup-size="md"
                data-placeholder="Cliente">
                <x-slot name="prependSlot">
                    <div class="input-group-text text-lightblue">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
                <option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->cliente_cedula}}" @if (old('cliente') == $cliente->cliente_cedula ) selected @endif>
                        {{$cliente->cliente_nombre}}
                    </option>
                @endforeach
            </x-adminlte-select2>
                {{-- Metodo de pago --}}
                <x-adminlte-select2 name="metododepago" label="Metodo de pago" label-class="text-lightblue" igroup-size="md"
                data-placeholder="Metodo de pago">
                <x-slot name="prependSlot">
                    <div class="input-group-text text-lightblue">
                        <i class="fas fa-wallet"></i>
                    </div>
                </x-slot>
                <option>
                    @foreach ($metodos_de_pagos as $metodos_de_pago)
                    <option value="{{$metodos_de_pago->metodo_de_pago_cod}}" @if (old('metododepago') == $metodos_de_pago->metodo_de_pago_cod ) selected @endif>
                        {{$metodos_de_pago->metodo_de_pago_nombre}}
                    </option>
                @endforeach
            </x-adminlte-select2>

                

                {{-- botones --}}
                <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success"
                    icon="fas fa-lg fa-save" />
                <a href="{{ route('reservas.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>
                <button type="button" class="btn btn-primary m-3 float-right" data-toggle="modal" data-target="#caracteristicasModal">
                    Seleccionar servicio
                </button>

                
                <div class="modal fade" id="caracteristicasModal" tabindex="-1" role="dialog"
                aria-labelledby="caracteristicasModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="caracteristicasModalLabel">Seleccionar servicios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Formulario para servicios --}}
                            <form id="caracteristicasForm" action="{{ url('reservas') }}" method="post">
                                @csrf
                                @foreach ($servicios as $servicio)
                                    @if ($servicio->servicio_estado == 'A')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="selectedCaracteristicas[]"
                                                   value="{{ $servicio->servicio_cod }}" data-precio="{{ $servicio->servicio_precio }}">
                                            <label class="form-check-label">{{ $servicio->servicio_nombre }} $({{ $servicio->servicio_precio }})</label>
                                        </div>
                                    @endif
                                @endforeach
                                <input type="hidden" id="selectedCaracteristicasInput" name="selectedCaracteristicas[]">
                                <input type="hidden" id="selectedCaracteristicasPrecio" name="selectedCaracteristicasPrecio[]">
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
        let selectedCheckboxes = $('input[name="selectedCaracteristicas[]"]:checked');
        let preciosArray = [];

        selectedCheckboxes.each(function () {
            let precio = $(this).data('precio');
            preciosArray.push(precio); // Agregar el precio al array
        });

        $('#selectedCaracteristicasPrecio').val(JSON.stringify(preciosArray)); // Almacenar el array en el campo oculto
        console.log(preciosArray);

        $('#caracteristicasModal').modal('hide');
    }
</script>

<script>
    function checkDomoValue() {
        let domoSelect = $('#domoSelect');
        let domoAlert = $('#domo-alert');
        let selectedOption = domoSelect.find('option:selected');
        
        if (selectedOption.length === 0) {
            domoAlert.show();
        } else {
            domoAlert.hide();
        }
    }

    $(document).ready(function() {
        checkDomoValue();
        $('#domoSelect').change(function() {
            checkDomoValue();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Cuando se cambie la opción seleccionada en el select
        $('select[name="domo"]').change(function() {
            var selectedDomoPrecio = $(this).find('option:selected').data('precio');
            
            // Actualiza el valor del input "domo_precio" con el precio seleccionado
            $('#domo_precio').val(selectedDomoPrecio);
        });
    });
</script>

@stop