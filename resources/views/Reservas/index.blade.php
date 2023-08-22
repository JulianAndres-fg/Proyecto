@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Lista de las reservas</h5>
    </div>
    <div class="card-body">

        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->reserva_cod}}</td>
                    <td>{{ $reserva->reserva_fech_ini }}</td>
                    <td>{{ $reserva->reserva_fech_fin }}</td>
                    <td>{{ $reserva->user->name}}</td>
                    <td>{{ $reserva->reserva_fech_registro }}</td>
                    <td>{{number_format($reserva->reserva_subtotal, 2, '.', ',')}}</td>
                    <td>{{ $reserva->reserva_descuento }}%</td>
                    <td>{{number_format($reserva->reserva_iva, 2, '.', ',')}}</td>
                    <td>{{number_format($reserva->reserva_total, 2, '.', ',') }}</td>
                    <td>{{ $reserva->cliente->cliente_nombre }}</td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
        <a href="{{route('reservas.create')}}" class="btn btn-success btn-lg float-right">Crear reserva</a>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop