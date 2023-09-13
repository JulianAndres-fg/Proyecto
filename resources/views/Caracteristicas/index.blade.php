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
            <h5>Lista de caracteristicas</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($Caracteristicas as $Caracteristica)
                    <tr>
                        <th>{{ $Caracteristica->caracteristica_cod }}</th>
                        <td>{{ $Caracteristica->caracteristica_nombre }}</td>
                        <td>$ {{ number_format($Caracteristica->caracteristica_precio, 0, '.', ',') }}</td>
                        <td>
                            @if ($Caracteristica->caracteristica_descripcion)
                                {{$Caracteristica->caracteristica_descripcion}}
                            @else
                                Ninguna descripcion
                            @endif
                        </td>
                        <td>{{ $Caracteristica->caracteristica_estado }}</td>
                        <td>
                            @can('editar-caracteristica')
                            <a href="{{route('caracteristicas.edit',$Caracteristica->caracteristica_cod)}}" title="Edit" class="btn btn-xs btn-default text-primary mx-1 shadow"> <i class="fa fa-lg fa-fw fa-pen"></i></a>
                            @endcan

                            @can('borrar-caracteristica')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                                data-target="#deleteModal{{ $Caracteristica->caracteristica_cod }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                                @endcan
                       </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    @foreach ($Caracteristicas as $Caracteristica)
        <div class="modal fade" id="deleteModal{{ $Caracteristica->caracteristica_cod }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $Caracteristica->caracteristica_cod }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $Caracteristica->caracteristica_cod }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar la caracteristica <b>{{ $Caracteristica->caracteristica_nombre }}</b>?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('caracteristicas.destroy', $Caracteristica->caracteristica_cod) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @can('crear-caracteristica')
    <a href="{{ route('caracteristicas.create') }}" class="btn btn-success btn-lg float-right">Crear caracteristica</a>
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
