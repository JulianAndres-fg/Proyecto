@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
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
            <h5>Lista de Roles</h5>
        </div>
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        @can('editar-rol')
                        <a href="{{ route('roles.edit', $role->id) }}" title="Edit"
                            class="btn btn-xs btn-default text-primary mx-1 shadow"> <i
                                class="fa fa-lg fa-fw fa-pen "></i></a>
                        @endcan
                        @can('borrar-rol')
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal"
                        data-target="#deleteModal{{ $role->id }}">  <i class="fa fa-lg fa-fw fa-trash"></i></button>
                        @endcan
                    </td>
                </tr>
                @endforeach
        </x-adminlte-datatable>
        </div>
    </div>
    @foreach ($roles as $role)
        <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal{{ $role->id }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            ¿Estas seguro de eliminar el rol <b>{{ $role->name }}</b>?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @can('crear-rol')
    <a href="{{ route('roles.create') }}" class="btn btn-success btn-lg float-right">Crear rol</a>
    @endcan
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
