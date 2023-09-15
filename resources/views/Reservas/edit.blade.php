@extends('adminlte::page')

@section('title', 'Editar reservas')

@section('content_header')
    <h1>Editar reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Agregar reserva a la lista</h5>
        </div>
        <div class="card-body">

            <form action="{{route('reservas.update',$reservas->reserva_cod)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Fecha inicio --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fechaini" label="Fecha inicio reserva" label-class="text-lightblue"
                    :config="$config" placeholder="Seleccione la fecha de inicio de reserva.." value="{{ $reservas->reserva_fech_ini }}">
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
                    :config="$config" placeholder="Seleccione la fecha de fin de reserva.." value="{{ $reservas->reserva_fech_fin }}">
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
                    label-class="text-lightblue" value="{{ $reservas->reserva_descuento }}">
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
                        @if ($domo->domo_estado == "I")
                            <option value="{{ $domo->domo_cod }}" data-estado="{{ $domo->domo_estado }}" data-precio="{{ $domo->domo_precio }}" {{ $reservas->domo_id == $domo->domo_cod ? 'selected' : '' }}>
                                {{ $domo->domo_nombre }}
                            </option>
                            @else
                            <option value="{{ $domo->domo_cod }}" data-precio="{{ $domo->domo_precio }}" {{ $reservas->domo_id == $domo->domo_cod ? 'selected' : '' }}>
                                {{ $domo->domo_nombre }}  
                            </option>
                        @endif
                    @endforeach
                </x-adminlte-select2>

                {{-- Alerta para cuando no hay domos disponibles --}}
                <div class="alert alert-danger mt-3" id="domo-alert" style="display: none;">
                  El domo que se encuetra seleccionado esta inactivo si desea activarlo <a  href="{{route('domos.index')}}">click aqui</a>.
                </div>

                {{-- Cliente --}}
                <x-adminlte-select2 name="cliente" label="Cliente" label-class="text-lightblue" igroup-size="md"
                    data-placeholder="Cliente" value="{{ $reservas->cliente_id }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                    <option>
                        @foreach ($clientes as $cliente)
                        <option value="{{$cliente->cliente_cedula}}" @if ($cliente->cliente_cedula == $reservas->cliente_id) selected @endif>
                            {{$cliente->cliente_nombre}}
                        </option>
                    @endforeach
                </x-adminlte-select2>

                {{-- Metodo de pago --}}
                <x-adminlte-select2 name="metododepago" label="Metodo de pago" label-class="text-lightblue" igroup-size="md"
                    data-placeholder="Metodo de pago" value="{{ $reservas->metodo_de_pago_id }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </x-slot>
                    <option>
                        @foreach ($metodos_de_pagos as $metodos_de_pago)
                        <option value="{{$metodos_de_pago->metodo_de_pago_cod}}" @if ($metodos_de_pago->metodo_de_pago_cod == $reservas->metodo_de_pago_id) selected @endif>
                            {{$metodos_de_pago->metodo_de_pago_nombre}}
                        </option>
                    @endforeach
                </x-adminlte-select2>

     

                {{-- botones --}}
                <x-adminlte-button class="btn-flat m-3 float-right" id="enviarReserva" type="submit" label="Guardar" theme="success"
                    icon="fas fa-lg fa-save" disabled />
                <a href="{{ route('reservas.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>
                <button type="button" class="btn btn-primary m-3 float-right" id="abrirModalervicios" data-toggle="modal" data-target="#caracteristicasModal">
                    Seleccionar servicio
                </button>

                
                <div class="modal fade" id="caracteristicasModal" tabindex="-1" role="dialog"
                aria-labelledby="caracteristicasModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="caracteristicasModalLabel">Seleccionar servicios</h5>
                        </div>
                        <div class="modal-body">
                            {{-- Formulario para servicios --}}
                            <form id="caracteristicasForm" action="{{route('reservas.update',$reservas->reserva_cod)}}" method="post">
                                @csrf
                                @method('PUT')
                                @foreach ($servicios as $servicio)
                                    @if ($servicio->servicio_estado == 'A')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="selectedCaracteristicas[]"
                                                   value="{{ $servicio->servicio_cod }}" data-precio="{{ $servicio->servicio_precio }}" @if($reservas->servicio->contains('servicio_cod', $servicio->servicio_cod)) checked @endif>
                                            <label class="form-check-label">{{ $servicio->servicio_nombre }} $({{ $servicio->servicio_precio }})</label>
                                        </div>
                                    @endif
                                @endforeach
                                <input type="hidden" id="selectedCaracteristicasInput" name="selectedCaracteristicas[]">
                                <input type="hidden" id="selectedCaracteristicasPrecio" name="selectedCaracteristicasPrecio[]">
                            </form>
                        </div>

                        
                        <div class="modal-footer">
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
        console.log(selectedCheckboxes);

        $('#caracteristicasModal').modal('hide');
    }
</script>

<script>
    $(document).ready(function() {
        // Función para establecer el valor de domo_precio al cargar la página
        function setDomoPrecio() {
            var selectedDomoPrecio = $('select[name="domo"]').find('option:selected').data('precio');
            $('#domo_precio').val(selectedDomoPrecio);
        }

        // Cuando se cambie la opción seleccionada en el select
        $('select[name="domo"]').change(function() {
            var selectedDomoPrecio = $(this).find('option:selected').data('precio');
            
            // Actualiza el valor del input "domo_precio" con el precio seleccionado
            $('#domo_precio').val(selectedDomoPrecio);
        });

        setDomoPrecio();
    });
</script>

<script>
    document.getElementById('abrirModalervicios').addEventListener('click',function(){
        document.getElementById('caracteristicasModal').style.display = 'block';
        document.getElementById('enviarReserva').removeAttribute('disabled');
    })
</script>

<script>
    function checkDomoValue() {
        let domoSelect = $('#domoSelect');
        let domoAlert = $('#domo-alert');
        let selectedOption = domoSelect.find(':selected');
        
        if (selectedOption.data('estado') === 'I') {
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


@stop