@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
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
            <h5>Lista de clientes</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($Clientes as $Cliente)
                    <tr>
                        <td>{{ $Cliente->cliente_cedula }}</td>
                        <td>{{ $Cliente->cliente_nombre }}</td>
                        <td>{{ $Cliente->cliente_apellido }}</td>
                        <td>{{ $Cliente->cliente_correo }}</td>
                        <td>{{ $Cliente->cliente_celular }}</td>
                        <td>{{ $Cliente->cliente_fech_nac }}</td>
                        <td>{{ $Cliente->cliente_ciudad }}</td>
                        <td>{{ $Cliente->cliente_direccion }}</td>
                        <td>
                            @can('editar-cliente')
                                <a href="{{ route('clientes.edit', $Cliente->cliente_cedula) }}" title="Edit"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                        class="fa fa-lg fa-fw fa-pen"></i></a>
                            @endcan

                            @can('borrar-cliente')
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                            data-target="#deleteModal{{ $Cliente->cliente_cedula }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                            @endcan
                        </td>

                            
                        

                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    @foreach ($Clientes as $Cliente)
        <div class="modal fade" id="deleteModal{{ $Cliente->cliente_cedula }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $Cliente->cliente_cedula }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $Cliente->cliente_cedula }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar el cliente <b>{{ $Cliente->cliente_nombre }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('clientes.destroy', $Cliente->cliente_cedula) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @can('crear-cliente')
        <a href="{{ route('clientes.create') }}" class="btn btn-success btn-lg float-right">Crear cliente</a>
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
