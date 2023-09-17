@extends('adminlte::page')

@section('title', 'Ver cliente')

@section('content_header')
    <h1>Clientes</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header bg-primary">
            <h5>Detalles del cliente</h5>
        </div>
        <div class="col">
            <div class="container">
                <div class="float-right mb-2 mt-5">
                    
                    <a class="btn btn-warning d-block w-100 mb-2 " data-toggle="collapse" href="#multiCollapseExample1"
                        role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detalles de el cliente</a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary d-block w-100 mb-2 mt-2">Volver</a>
                </div>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <div class="card-header bg-primary">
                        <h5 class="float-left">Detalle de el cliente</h5>
                        <b class="float-right">{{ $Cliente->cliente_cedula }}</b>
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary"><b>Cedula del cliente</b></h5>
                        <p>{{ $Cliente->cliente_cedula }}</p>

                        <h5 class="text-primary"><b>Nombre del cliente</b></h5>
                        <p>{{ $Cliente->cliente_nombre }}</p>

                        <h5 class="text-primary"><b>Correo del cliente</b></h5>
                        <p>{{ $Cliente->cliente_correo }}</p>

                        <h5 class="text-primary"><b>Celular del cliente</b></h5>
                        <p>{{ $Cliente->cliente_celular }}</p>

                        <h5 class="text-primary"><b>Fecha de nacimiento</b></h5>
                        <p>{{ $Cliente->cliente_fech_nac }}</p>

                        <h5 class="text-primary"><b>Ciudad de residencia</b></h5>
                        <p>{{ $Cliente->cliente_ciudad }}</p>

                        <h5 class="text-primary"><b>Direccion</b></h5>
                        <p>{{ $Cliente->cliente_direccion }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
