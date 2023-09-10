@extends('adminlte::page')

@section('title', 'Ver domo')

@section('content_header')
    <h1>{{ $domos->domo_nombre }}</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header bg-primary">
            <h5>Detalles de los domos</h5>
        </div>
        <div class="col">
            <div class="container">
                <div class="float-right mb-2 mt-5">
                    <a class="btn btn-warning d-block w-100 mb-2 " data-toggle="collapse" href="#multiCollapseExample1"
                        role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detalles del domo</a>
                    <button class="btn btn-primary d-block w-100 mb-2" type="button" data-toggle="collapse"
                        data-target="#multiCollapseExample2" aria-expanded="false"
                        aria-controls="multiCollapseExample2">Caracteristicas</button>
                    <button class="btn btn-info d-block w-100" type="button" data-toggle="collapse"
                        data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">Domo</button>
                        <a href="{{route('domos.index')}}" class="btn btn-secondary d-block w-100 mb-2 mt-2">Volver</a>
                </div>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <div class="card-header bg-primary">
                        <h5 class="float-left">Detalles del domo</h5>
                        <b class="float-right">{{ $domos->domo_cod }}</b>
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary"><b>Nombre del domo</b></h5>
                        <p>{{ $domos->domo_nombre }}</p>

                        <h5 class="text-primary"><b>Estado del domo</b></h5>
                        @if ($domos->domo_estado == 'A')
                            <p class="bg-success w-25 text-center p-2">Activo</p>
                        @else
                            <p class="bg-danger w-25 text-center p-2">Inactivo</p>
                        @endif

                        <h5 class="text-primary"><b>Precio del domo</b></h5>
                        <p>${{ $domos->domo_precio }}</p>

                        <h5 class="text-primary"><b>Ubicacion del domo</b></h5>
                        <p>{{ $domos->domo_ubicacion }}</p>
                        
                        <h5 class="text-primary"><b>Descripcion</b></h5>
                        <p>{{ $domos->domo_descripcion }}</p>
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample2">
         
                <div class="card card-body">
                    <div class="card-header bg-primary">
                        <h5 class="float-left">Caracteristicas del domo</h5>
                        <b class="float-right">{{ $domos->domo_cod }}</b>
                    </div>

                    <div class="card-body">
                
                            @foreach ($caracteristicas as  $index => $caracteristica)
                            @if($domos->caracteristicas->contains('caracteristica_cod', $caracteristica->caracteristica_cod))
                            <h5 class="text-primary"><b>Caracteristica {{$index + 1}}</b></h5>
                            <p>{{ $caracteristica->caracteristica_nombre }}</p>
                            @endif

                            
                            @endforeach  
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
