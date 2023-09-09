@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Lista servicio</h1>
@stop

@section('content')
    @if (session('success'))
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
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$header" head-theme="bg-secondary">
                @foreach ($Servicios as $Servicio)
                    <tr>
                        <th scope="row">{{ $Servicio->servicio_cod }}</th>
                        <td>{{ $Servicio->servicio_nombre }}</td>
                        <td>{{ $Servicio->servicio_estado }}</td>
                        <td>$ {{ number_format($Servicio->servicio_precio, 0, '.', ',') }}</td>
                        <td>{{ $Servicio->servicio_cantidad }}</td>
                        <td>
                            @can('editar-servicio')
                                <a href="{{ route('servicios.edit', $Servicio->servicio_cod) }}" title="Edit"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                        class="fa fa-lg fa-fw fa-pen"></i></a>
                            @endcan

                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    @can('crear-servicio')
        <a href="{{ route('servicios.create') }}" class="btn btn-success btn-lg float-right">Crear servicio</a>
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
