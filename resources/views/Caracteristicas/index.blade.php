@extends('adminlte::page')

@section('title', 'Caracteristicas')

@section('content_header')
    <h1>Caracteristicas</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($Caracteristicas as $Caracteristica)
                <tr>
                    <th>{{$Caracteristica->caracteristica_cod}}</th>
                    <td>{{$Caracteristica->caracteristica_estado}}</td>
                    <td>{{$Caracteristica->caracteristica_descripcion}}</td>
                    <td>{{$Caracteristica->caracteristica_nombre}}</td>
                    <td>$ {{number_format($Caracteristica->caracteristica_precio, 2, '.', ',')}}</td>
                  </tr>
                @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<a href="{{route('caracteristicas.create')}}" class="btn btn-success btn-lg float-right">Crear caracteristica</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




