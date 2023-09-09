@extends('adminlte::page')

@section('title', 'Metodos de pago')

@section('content_header')
    <h1>Metodos de pago</h1>
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
        <div class="card-header">
            <h5>lista de metodos de pago</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$header">
                @foreach ($MetodosDePagos as $MetodosDePago)
                    <tr>
                        <td>{{ $MetodosDePago->metodo_de_pago_cod }}</td>
                        <td>{{ $MetodosDePago->metodo_de_pago_nombre }}</td>
                        <td>
                        <td>
                            @can('editar-metododepago')
                                <a href="{{ route('metodosdepago.edit', $MetodosDePago->metodo_de_pago_cod) }}" title="Edit"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                        class="fa fa-lg fa-fw fa-pen"></i></a>
                            @endcan

                            @can('borrar-metododepago')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                                data-target="#deleteModal{{ $MetodosDePago->metodo_de_pago_cod }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                            @endcan

                        </td>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>

    @foreach ($MetodosDePagos as $MetodosDePago)
        <div class="modal fade" id="deleteModal{{ $MetodosDePago->metodo_de_pago_cod }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $MetodosDePago->metodo_de_pago_cod }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $MetodosDePago->metodo_de_pago_cod }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar el metodo de pago <b>{{ $MetodosDePago->metodo_de_pago_nombre }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('metodosdepago.destroy', $MetodosDePago->metodo_de_pago_cod) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @can('crear-metododepago')
        <a href="{{ route('metodosdepago.create') }}" class="btn btn-success btn-lg float-right">Crear metodo de pago</a>
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
