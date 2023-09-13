@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Reservas</h1>
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
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>Lista de las reservas</h5>
        </div>
        <div class="card-body">
         


            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->reserva_cod }}</td>
                        <td>{{ $reserva->user->name }}</td>
                        <td>{{ $reserva->cliente->cliente_cedula }}</td>
                        <td>{{ $reserva->cliente->cliente_nombre }}</td>


                        @if ($reserva->domo_id)
                            @if ($reserva->domo->domo_estado == 'A')
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="El domo se encuentra activo">{{ $reserva->domo->domo_nombre }}</td></button>
                            @else
                             <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="El domo se encuentra inactivo">{{ $reserva->domo->domo_nombre }}</td></button></td>
                            @endif
                        @else
                            sin domo asociado
                        @endif

                        <td>
                            @can('editar-reserva')
                                <a href="{{ route('reservas.edit', $reserva->reserva_cod) }}" title="Edit"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                        class="fa fa-lg fa-fw fa-pen "></i></a>
                            @endcan

                            @can('borrar-reserva')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#deleteModal{{ $reserva->reserva_cod }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></button>
                            @endcan

                            @can('ver-reserva')
                                <a href="{{ route('reservas.show', $reserva->reserva_cod) }}"
                                    class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>

    @foreach ($reservas as $reserva)
        <div class="modal fade" id="deleteModal{{ $reserva->reserva_cod }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $reserva->reserva_cod }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $reserva->reserva_cod }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar la reserva <b>{{ $reserva->reserva_cod }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('reservas.destroy', $reserva->reserva_cod) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @can('crear-reserva')
        <a href="{{ route('reservas.create') }}" class="btn btn-success btn-lg float-right">Crear Reservas</a>
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
