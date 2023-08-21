@extends('adminlte::page')

@section('title', 'Metodos de pago')

@section('content_header')
    <h1>Metodos de pago</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($MetodosDePagos as $MetodosDePago)
        <tr>
        <td>{{$MetodosDePago ->metodo_de_pago_cod}}</td>
        <td>{{$MetodosDePago->metodo_de_pago_nombre}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('metodosdepago.create')}}" class="btn btn-success btn-lg float-right">Crear metodo de pago</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop