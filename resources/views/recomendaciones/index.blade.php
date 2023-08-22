@extends('adminlte::page')

@section('title', 'Recomendaciones')

@section('content_header')
    <h1>Recomendaciones</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($recomendaciones as $recomendacion)
        <tr>
        <td>{{$recomendacion ->recomendacion_cod}}</td>
        <td>{{$recomendacion ->recomendacion_descripcion}}</td>
        <td>{{$recomendacion ->reserva->reserva_cod }}</td>
        <td>{{$recomendacion ->recomendacion_puntaje}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('recomendaciones.create')}}" class="btn btn-success btn-lg float-right">Crear recomendacion</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop