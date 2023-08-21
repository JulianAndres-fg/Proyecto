@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista clientes</h1>
@stop

@section('content')
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach ($Clientes as $Cliente)
        <tr>
            <td>{{ $Cliente->cliente_cedula}}</td>
            <td>{{ $Cliente->cliente_nombre }}</td>
            <td>{{ $Cliente->cliente_apellido }}</td>
            <td>{{ $Cliente->cliente_correo}}</td>
            <td>{{ $Cliente->cliente_celular }}</td>
            <td>{{ $Cliente->cliente_fech_nac }}</td>
            <td>{{ $Cliente->cliente_ciudad }}</td>
            <td>{{ $Cliente->cliente_direccion }}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>
<a href="{{route('clientes.create')}}" class="btn btn-success btn-lg float-right">Crear cliente</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop