@extends('adminlte::page')

@section('title', 'Domo caracteristica')

@section('content_header')
    <h1>Domo_Caracteristica</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Domos_caracteristicas as $Domo_caracteristica)
        <tr>
        <td>{{$Domo_caracteristica ->domo_caracteristica_cod}}</td>
        <td>{{$Domo_caracteristica->domo->domo_nombre}}</td>
        <td>{{$Domo_caracteristica->caracteristica->caracteristica_nombre }}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop