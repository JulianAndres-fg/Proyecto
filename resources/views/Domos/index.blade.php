@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista domos</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Precio</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Capacidad</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Domos as $Domo)
                <tr>
                    <th scope="row">{{$Domo->domo_cod}}</th>
                    <td>{{$Domo->domo_nombre}}</td>
                    <td>{{$Domo->domo_estado}}</td>
                    <td>$ {{$Domo->domo_precio}}</td>
                    <td>{{$Domo->domo_ubicacion}}</td>
                    <td>{{$Domo->domo_descripcion}}</td>
                    <td>{{$Domo->domo_capacidad}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
<a href="{{route('domos.create')}}" class="btn btn-success btn-lg float-right">Crear domo</a>
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
           new DataTable('#example');
    </script>
@stop