@extends('adminlte::page')

@section('title', 'Caracteristicas')

@section('content_header')
    <h1>Lista caracteristicas</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table id="ejemplo" class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Caracteristicas as $Caracteristica)
                <tr>
                    <th scope="row">{{$Caracteristica->caracteristica_cod}}</th>
                    <td>{{$Caracteristica->caracteristica_estado}}</td>
                    <td>{{$Caracteristica->caracteristica_descripcion}}</td>
                    <th scope="row">{{$Caracteristica->caracteristica_nombre}}</th>
                    <td>$ {{$Caracteristica->caracteristica_precio}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
<a href="{{route('caracteristicas.create')}}" class="btn btn-success btn-lg float-right">Crear caracteristica</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
           new DataTable('#ejemplo');
    </script>
@stop




