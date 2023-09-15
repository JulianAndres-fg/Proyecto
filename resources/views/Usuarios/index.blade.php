@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
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
       
            <div class="card-header bg-primary">
                <h5>Lista de Usuarios</h5>
            </div>

        </div>
    
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" striped hoverable with-buttons>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if (!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolName)
                            <div class="d-grid gap-2">
                                @if ($rolName === 'El care chimba')
                                    <button type="button" class="btn btn-success" >{{$rolName}}</button>      
                                @else
                                <button type="button"  class="btn btn-primary" >{{$rolName}}</button>      
                
                                @endif
                            </div>
                            @endforeach
                        @endif
                        </td>
                        <td>
                            @can('editar-usuario')
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" title="Edit"
                                class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                    class="fa fa-lg fa-fw fa-pen "></i></a>
                            @endcan
                                @can('borrar-usuario')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                                data-target="#deleteModal{{ $usuario->id }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                                @endcan
                                
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    @foreach ($usuarios as $usuario)
        <div class="modal fade" id="deleteModal{{ $usuario->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $usuario->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $usuario->id }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar el usuario <b>{{ $usuario->name }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @can('crear-usuario')
    <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-lg float-right">Crear usuario</a>
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
