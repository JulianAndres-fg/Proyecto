@extends('adminlte::page')

@section('title', 'Lista-domos')

@section('content_header')
    <h1>Domos</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h5>Lista de domos disponibles</h5>
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach ($Domos as $Domo)
            <tr>
                <th scope="row">{{$Domo->domo_cod}}</th>
                <td>{{$Domo->domo_nombre}}</td>
                <td>{{$Domo->domo_estado}}</td>
                <td>${{ number_format($Domo->domo_precio, 2, '.', ',') }}</td>
                <td>{{$Domo->domo_ubicacion}}</td>
                <td>{{$Domo->domo_descripcion}}</td>
                <td>{{$Domo->domo_capacidad}}</td>
              </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<a href="{{route('domos.create')}}" class="btn btn-success btn-lg float-right">Crear domo</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop