@extends('adminlte::page')

@section('title', 'Crear reserva')

@section('content_header')
    <h1>Agregar reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Agregar reserva a la lista</h5>
        </div>
        <div class="card-body">

            <form action="{{ url('reservas') }}" method="POST">
                @csrf
                {{-- Fecha inicio --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fechaini" label="Fecha inicio reserva" label-class="text-lightblue" :config="$config"
                    placeholder="Seleccione la fecha de inicio de reserva.." value="{{old('fechaini')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>

                    {{-- Fecha inicio --}}
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fechafin" label="Fecha fin reserva" label-class="text-lightblue" :config="$config"
                    placeholder="Seleccione la fecha de fin de reserva.." value="{{old('fechafin')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-lightblue">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>

                {{-- usuario --}}
                <x-adminlte-select2 name="usuario" label="Usuario" label-class="text-lightblue"
                igroup-size="md" data-placeholder="Usuario" value="{{old('usuario')}}">
                <x-slot name="prependSlot">
                    <div class="input-group-text text-lightblue">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
                <option>
                @foreach ($usuarios as $usuario)
                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
         
            </x-adminlte-select2>

            {{-- fecha registro --}}

            <x-adminlte-input-date name="fechareg" label="Fecha de registro reserva" label-class="text-lightblue" :config="$config"
            placeholder="Seleccione la fecha de registro de la reserva.." :value="$fechhoy" :disabled="true">
            <x-slot name="prependSlot">
                <div class="input-group-text text-lightblue">
                    <i class="fas fa-calendar"></i>
                </div>
            </x-slot>
        </x-adminlte-input-date>

          {{-- Precio --}}

          <x-adminlte-input name="subtotal" label="Subtotal" placeholder="Subtotal de la reserva" type='number' label-class="text-lightblue" value="{{old('subtotal')}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-dollar-sign text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        
        <x-adminlte-input name="descuento" label="Descuento" placeholder="Descuento de la reserva" type='number' label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-percent text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

           {{-- Cliente --}}
           <x-adminlte-select2 name="cliente" label="Cliente" label-class="text-lightblue"
           igroup-size="md" data-placeholder="Cliente" value="{{old('cliente')}}">
           <x-slot name="prependSlot">
               <div class="input-group-text text-lightblue">
                   <i class="fas fa-user"></i>
               </div>
           </x-slot>
           <option>
           @foreach ($clientes as $cliente)
           <option value="{{$cliente->cliente_cedula}}">{{$cliente->cliente_nombre}}</option>
           @endforeach
    
       </x-adminlte-select2>


      


                {{-- botones --}}
                <x-adminlte-button class="btn-flat m-3 float-right" type="submit" label="Guardar" theme="success"
                    icon="fas fa-lg fa-save" />
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary m-3 float-right">Volver</a>

            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
