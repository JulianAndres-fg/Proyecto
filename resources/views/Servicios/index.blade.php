@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Lista servicio</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table id="servicio" class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Servicios as $Servicio)
                <tr>
                    <th scope="row">{{$Servicio->servicio_cod}}</th>
                    <td>{{$Servicio->servicio_nombre}}</td>
                    <td>{{$Servicio->servicio_estado}}</td>
                    <td>$ {{$Servicio->servicio_precio}}</td>
                    <td>{{$Servicio->servicio_cantidad}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
<a href="{{route('servicios.create')}}" class="btn btn-success btn-lg float-right">Crear servicio</a>
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
           new DataTable('#servicio');
    </script>
@stop