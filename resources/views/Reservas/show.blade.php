@extends('adminlte::page')

@section('title', 'Ver reserva')

@section('content_header')
    <h1>Reservas</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header bg-primary">
            <h5>Detalles de la reserva</h5>
        </div>
        <div class="col">
            <div class="container">
                <div class="float-right mb-2 mt-5">
                    <a class="btn btn-warning d-block w-100 mb-2 " data-toggle="collapse" href="#multiCollapseExample1"
                        role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detalles de la reserva</a>
                    <button class="btn btn-primary d-block w-100 mb-2" type="button" data-toggle="collapse"
                        data-target="#multiCollapseExample2" aria-expanded="false"
                        aria-controls="multiCollapseExample2">Servicios</button>
                    <button class="btn btn-info d-block w-100" type="button" data-toggle="collapse"
                        data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">Reserva</button>
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary d-block w-100 mb-2 mt-2">Volver</a>
                </div>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <div class="card-header bg-primary">
                        <h5 class="float-left">Detalles de la reserva</h5>
                        <b class="float-right">{{ $reservas->reserva_cod }}</b>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <h5 class="text-primary"><b>Fecha inicio de la reserva</b></h5>
                            <p class="text-right">{{ $reservas->reserva_fech_ini }}</p>

                        </div>


                        <h5 class="text-primary"><b>Fecha fin de la reserva</b></h5>
                        <p>{{ $reservas->reserva_fech_fin }}</p>

                        <div class="float-right">
                            <h5 class="text-primary"><b>Usuario que creo la reserva</b></h5>
                            @foreach ($usuarios as $usuario)
                                @if ($usuario->id === $reservas->usuario_id)
                                    <p class="text-right">{{ $usuario->name }}</p>
                                @endif
                            @endforeach
                        </div>



                        <h5 class="text-primary"><b>Fecha registro</b></h5>
                        <p>{{ $reservas->reserva_fech_registro }}</p>


                        <div class="float-right">
                            <h5 class="text-primary"><b>subtotal</b></h5>
                            <p class="text-right">${{ number_format($reservas->reserva_subtotal, 0, '.', ',') }}</p>
                        </div>


                        <h5 class="text-primary"><b>Descuento</b></h5>
                        <p>{{ $reservas->reserva_descuento }}%</p>

                        <div class="float-right">

                            <h5 class="text-primary"><b>Domos</b></h5>
                            @foreach ($domos as $domo)
                                @if ($domo->domo_cod === $reservas->domo_id)
                                    <p class="text-right">{{ $domo->domo_nombre }}</p>
                                @endif
                            @endforeach
                        </div>


                        <h5 class="text-primary"><b>IVA</b></h5>
                        <p>${{ number_format($reservas->reserva_iva, 0, '.', ',') }}</p>

                        <div class="float-right">
                            <h5 class="text-primary"><b>Total</b></h5>
                            <p class="text-right">${{ number_format($reservas->reserva_total, 0, '.', ',') }}</p>
                        </div>



                        <h5 class="text-primary"><b>Cliente</b></h5>
                        @foreach ($clientes as $cliente)
                            @if ($cliente->cliente_cedula == $reservas->cliente_id)
                                <p>{{ $cliente->cliente_nombre }}</p>
                            @endif
                        @endforeach


                        <div class="float-right">
                            <h5 class="text-primary"><b>Metodo de pago</b></h5>
                            @foreach ($metodos_de_pagos as $metodo_de_pago)
                                @if ($metodo_de_pago->metodo_de_pago_cod == $reservas->metodo_de_pago_id)
                                    <p class="text-right">{{ $metodo_de_pago->metodo_de_pago_nombre }}</p>
                                @endif
                            @endforeach
                        </div>
                        

                    <h5 class="text-primary"><b>Creado</b></h5>
                            <p>{{$reservas->created_at }}</p>

                            <h5 class="text-primary"><b>Actualizado</b></h5>
                            <p>{{$reservas->updated_at }}</p>
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample2">

                <div class="card card-body">
                    <div class="card-header bg-primary">
                        <h5 class="float-left">servicios de la reserva</h5>
                        <b class="float-right">{{ $reservas->reserva_cod }}</b>
                    </div>

                    <div class="card-body">

                        @foreach ($servicios as $index => $servicio)
                            @if ($reservas->servicio->contains('servicio_cod', $servicio->servicio_cod))
                                <h5 class="text-primary"><b>Servicio {{ $index + 1 }}</b></h5>
                                <p>{{ $servicio->servicio_nombre }}</p>
                                @else
                                <h2 class="text-center opacity-50">Sin ningun servicio asociado</h2>
                            @endif
                        @endforeach

                
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
