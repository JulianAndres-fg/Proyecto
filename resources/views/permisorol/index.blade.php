@extends('adminlte::page')

@section('title', 'Permiso Roles')

@section('content_header')
    <h1>Permiso_rol</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$header">
    @foreach($Permisos_Roles as $Permiso_rol)
        <tr>
        <td>{{$Permiso_rol ->permiso_rol_cod}}</td>
        <td>{{$Permiso_rol->permiso->permiso_nombre}}</td>
        <td>{{$Permiso_rol->role->rol_nombre }}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('permisoroles.create')}}" class="btn btn-success btn-lg float-right">Crear permiso_rol</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop