@extends('adminlte::page')

@section('title', 'Plan oferta')

@section('content_header')
    <h1>Plan oferta</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Plan_ofertas as $Plan_oferta)
        <tr>
        <td>{{$Plan_oferta ->plan_oferta_cod}}</td>
        <td>{{$Plan_oferta ->plan_oferta_fech_ini}}</td>
        <td>{{$Plan_oferta ->plan_oferta_fech_fin}}</td>
        <td>{{$Plan_oferta ->plane->plan_nombre }}</td>
        <td>{{$Plan_oferta ->oferta->oferta_nombre }}</td>
        <td>{{$Plan_oferta ->plan_oferta_nombre}}</td>
        <td>{{$Plan_oferta ->plan_oferta_estado}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('planoferta.create')}}" class="btn btn-success btn-lg float-right">Crear plan oferta</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop