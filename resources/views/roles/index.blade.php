@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Roles as $Rol)
        <tr>
        <td>{{$Rol ->rol_cod}}</td>
        <td>{{$Rol->rol_nombre}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('roles.create')}}" class="btn btn-success btn-lg float-right">Crear rol</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop