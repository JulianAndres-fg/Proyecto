@extends('adminlte::page')

@section('title', 'Caracteristicas')

@section('content_header')
    <h1>Caracteristicas</h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif  @if (session('update'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('update') }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h5>Lista de caracteristicas</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($Caracteristicas as $Caracteristica)
                    <tr>
                        <th>{{ $Caracteristica->caracteristica_cod }}</th>
                        <td>{{ $Caracteristica->caracteristica_estado }}</td>
                        <td>
                            @if ($Caracteristica->caracteristica_descripcion)
                                {{$Caracteristica->caracteristica_descripcion}}
                            @else
                                Ninguna descripcion
                            @endif
                        </td>
                        <td>{{ $Caracteristica->caracteristica_nombre }}</td>
                        <td>$ {{ number_format($Caracteristica->caracteristica_precio, 0, '.', ',') }}</td>
                        <td>
                            <a href="{{route('caracteristicas.edit',$Caracteristica->caracteristica_cod)}}" title="Edit" class="btn btn-xs btn-default text-primary mx-1 shadow"> <i class="fa fa-lg fa-fw fa-pen"></i></a>
                       </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    <a href="{{ route('caracteristicas.create') }}" class="btn btn-success btn-lg float-right">Crear caracteristica</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
