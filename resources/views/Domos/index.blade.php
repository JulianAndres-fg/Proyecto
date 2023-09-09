@extends('adminlte::page')

@section('title', 'Domos')

@section('content_header')
    <h1>Domos</h1>
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
            <h5>Lista de domos</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($Domos as $Domo)
                    <tr>
                        <th scope="row">{{ $Domo->domo_cod }}</th>
                        <td>{{ $Domo->domo_nombre }}</td>
                        <td>{{ $Domo->domo_estado }}</td>
                        <td>${{ number_format($Domo->domo_precio, 0, '.', ',') }}</td>
                        <td>{{ $Domo->domo_ubicacion }}</td>
                        <td>{{ $Domo->domo_descripcion }}</td>
                        <td>{{ $Domo->domo_capacidad }}</td>
                        <td>
                            @can('editar-domo')
                            <a href="{{ route('domos.edit', $Domo->domo_cod) }}" title="Edit"
                                class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                    class="fa fa-lg fa-fw fa-pen "></i></a>
                            @endcan
                           
                                @can('borrar-domo')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                                data-target="#deleteModal{{ $Domo->domo_cod }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                                @endcan
                        
                                @can('ver-domo')
                                <a href="{{route('domos.show',$Domo->domo_cod)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                                @endcan               
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    @foreach ($Domos as $Domo)
        <div class="modal fade" id="deleteModal{{ $Domo->domo_cod }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $Domo->domo_cod }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $Domo->domo_cod }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar el domo <b>{{ $Domo->domo_nombre }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('domos.destroy', $Domo->domo_cod) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @can('crear-domo')
         <a href="{{ route('domos.create') }}" class="btn btn-success btn-lg float-right">Crear domo</a>
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
