{{-- @extends('adminlte::page')

@section('title', 'Crear recomendaciones')

@section('content_header')
    <h1>Recomendaciones</h1>
@stop

@section('content')
<div class="card">
<div class="card-header">
    <h5>Agregar recomendaciones a la lista</h5>
</div>
<div class="card-body">
    <form action="{{url('recomendaciones')}}" method="POST">
        @csrf

       
{{-- Descripcion --}}
<x-adminlte-textarea name="descripcion" label="Descripcion" rows=3 label-class="text-lightblue"
igroup-size="sm" placeholder="Añade una descripción..." value="{{old('descripcion')}}">
<x-slot name="prependSlot">
    <div class="input-group-text bg-light">
        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
    </div>
</x-slot>
</x-adminlte-textarea>

    {{-- reserva id --}}
    <x-adminlte-select2 name="reserva" label="Reserva" label-class="text-lightblue"
    igroup-size="md" data-placeholder="Reserva" value="{{old('reserva')}}">
    <x-slot name="prependSlot">
        <div class="input-group-text text-lightblue">
            <i class="fas fa-check"></i>
        </div>
    </x-slot>
    <option>
    @foreach ($reservas as $reserva)
    <option value="{{$reserva->reserva_cod}}" @if (old('reserva') == $reserva->reserva_cod) selected @endif>{{$reserva->reserva_cod}}</option>
    @endforeach

</x-adminlte-select2>

{{-- Puntaje --}}
<x-adminlte-select2 name="puntaje" label="Puntaje" label-class="text-lightblue"
igroup-size="md" data-placeholder="Puntaje" value="{{old('puntaje')}}">
<x-slot name="prependSlot">
    <div class="input-group-text text-lightblue">
        <i class="fas fa-check"></i>
    </div>
</x-slot>
<option>
<option  value="1" @if (old('puntaje') == '1')  selected @endif>1</option>
<option value="2" @if (old('puntaje') == '2')  selected @endif>2</option>
<option value="3" @if (old('puntaje') == '3')  selected @endif>3</option>
<option value="4" @if (old('puntaje') == '4')  selected @endif>4</option>
<option value="5" @if (old('puntaje') == '5')  selected @endif>5</option>
</x-adminlte-select2>


{{-- botones --}}
<x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
<a href="{{route('recomendaciones.index')}}" class="btn btn-secondary m-3 float-right">Volver</a>

    </form> 
</div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}