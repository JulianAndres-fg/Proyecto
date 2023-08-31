@extends('adminlte::page')

@section('title', 'Ofertas')

@section('content_header')
    <h1>Ofertas</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Ofertas as $Oferta)
        <tr>
        <td>{{$Oferta ->oferta_cod}}</td>
        <td>{{$Oferta ->oferta_nombre}}</td>
        <td>{{$Oferta->oferta_descuento}}%</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('ofertas.create')}}" class="btn btn-success btn-lg float-right">Crear oferta</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop