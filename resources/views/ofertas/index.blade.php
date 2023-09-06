@extends('adminlte::page')

@section('title', 'Ofertas')

@section('content_header')
    <h1>Ofertas</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('update'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('update') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <h5>Lista de ofertas</h5>
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$header">
            @foreach($Ofertas as $Oferta)
                <tr>
                <td>{{$Oferta ->oferta_cod}}</td>
                <td>{{$Oferta ->oferta_nombre}}</td>
                <td>{{$Oferta->oferta_descuento}}%</td>
                <td>
                    <a href="{{route('ofertas.edit',$Oferta->oferta_cod)}}" title="Edit" class="btn btn-xs btn-default text-primary mx-1 shadow"> <i class="fa fa-lg fa-fw fa-pen"></i></a>
                </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>

<a href="{{route('ofertas.create')}}" class="btn btn-success btn-lg float-right">Crear oferta</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop