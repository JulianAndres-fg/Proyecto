@extends('adminlte::page')

@section('title', 'Metodos de pago')

@section('content_header')
    <h1>Metodos de pago</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
@if(session('update'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('update') }}
</div>
@endif
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($MetodosDePagos as $MetodosDePago)
        <tr>
        <td>{{$MetodosDePago ->metodo_de_pago_cod}}</td>
        <td>{{$MetodosDePago->metodo_de_pago_nombre}}</td>
        <td>
            <a href="{{route('metodosdepago.edit',$MetodosDePago->metodo_de_pago_cod)}}" class="btn btn-primary btn-sm d-inline-block">Editar</a>
        </td>
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