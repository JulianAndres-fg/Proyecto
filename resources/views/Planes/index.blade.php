{{-- @extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <h1>Planes</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h5>Lista de planes</h5>
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$header" head-theme="bg-secondary">
            @foreach ($planes as $plan)
                <tr>
                    <td>{{ $plan->plan_cod }}</td>
                    <td>{{ $plan->plan_nombre }}</td>
                    <td>$ {{ number_format($plan->plan_precio, 0, '.', ',') }}</td>
                    <td>{{ $plan->domo->domo_nombre }}</td>
                    <td>{{ $plan->plan_estado }}</td>
                    <td>{{ $plan->plan_descripcion }}</td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<a href="{{route('planes.create')}}" class="btn btn-success btn-lg float-right">Crear plan</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}