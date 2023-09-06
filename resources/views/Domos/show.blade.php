@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PANEL DE CONTROL</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Domo <b>{{$domos->domo_nombre}}</b></h5>
        </div>
        <div class="card-body">
            <h5 class="text-primary"><b>Nombre del domo</b></h5>
            <p>{{$domos->domo_nombre}}</p>

            <h5 class="text-primary"><b>Precio del domo</b></h5>
            <p>{{$domos->domo_precio}}</p>
        </div> 
    </div>
    @stop



    ##   ##  #######  ##   ##  #######    ####    #####
    ##   ##   ##   #  ###  ##   ##   #   ##  ##  ##   ##
     ## ##    ## #    #### ##   ## #    ##       ##   ##
     ## ##    ####    ## ####   ####    ##       ##   ##
      ###     ## #    ##  ###   ## #    ##       ##   ##
      ###     ##   #  ##   ##   ##   #   ##  ##  ##   ##
       #     #######  ##   ##  #######    ####    #####
   
   


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop