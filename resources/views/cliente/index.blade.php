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
                    <td>{{ $Cliente->cliente_cedula}}</td>
                    <td>{{ $Cliente->cliente_nombre }}</td>
                    <td>{{ $Cliente->cliente_apellido }}</td>
                    <td>{{ $Cliente->cliente_correo}}</td>
                    <td>{{ $Cliente->cliente_celular }}</td>
                    <td>{{ $Cliente->cliente_fech_nac }}</td>
                    <td>{{ $Cliente->cliente_ciudad }}</td>
                    <td>{{ $Cliente->cliente_direccion }}</td>
                    <td>
                        <a href="{{route('clientes.edit',$Cliente->cliente_cedula)}}" title="Edit" class="btn btn-xs btn-default text-primary mx-1 shadow"> <i class="fa fa-lg fa-fw fa-pen"></i></a>
                    </td>

                    <td>                                                                            
                        <form action="{{ route('clientes.destroy', $Cliente->cliente_cedula) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </td>
                                                                                                                                                
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<a href="{{route('clientes.create')}}" class="btn btn-success btn-lg float-right">Crear cliente</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop