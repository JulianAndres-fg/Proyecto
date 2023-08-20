@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Permisos</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Permisos as $Permiso)
        <tr>
        <td>{{$Permiso ->permiso_cod}}</td>
        <td>{{$Permiso->permiso_nombre}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('permisos.create')}}" class="btn btn-success btn-lg float-right">Crear permiso</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop