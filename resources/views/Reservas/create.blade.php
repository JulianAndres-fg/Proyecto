@extends('adminlte::page')

@section('title', 'Crear reserva')

@section('content_header')
    <h1>Agregar reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Agregar reserva a la lista</h5>
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

                {{-- usuario --}}
                <x-adminlte-select2 name="usuario" label="Usuario" label-class="text-lightblue" igroup-size="md"
                    data-placeholder="Usuario" value="{{ old('usuario') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                    <option>
                        @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" @if (old('usuario') == $usuario->id) selected @endif>{{ $usuario->name }}</option>
                    @endforeach

                </x-adminlte-select2>

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
                            {{-- Formulario para características --}}
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












@stop
