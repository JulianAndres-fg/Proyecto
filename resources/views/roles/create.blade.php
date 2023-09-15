@extends('adminlte::page')

@section('title', 'Crear roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

<div class="card border-danger">
    <div class="card-header bg-primary">Crear roles</div>
  <div class="card-body">
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        
        <x-adminlte-input name="name" label="Nombre del Rol" placeholder="Nombre del Rol"  value="{{old('name')}}">
            <x-slot name="prependSlot">
                <div class="input-group-text text-info">
                    <i class="fas fa-chess"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <button class="btn btn-primary d-block my-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           Permisos
          </button>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="form-group">
                    <h3 class="text-primary">Permisos</h3>
                    @php
                        $categories = [];
                    @endphp
            
                    @foreach ($permission as $permissio)
                        @php
                            $parts = explode('-', $permissio->name);
                            $category = $parts[1] ?? 'Otro';
                            $categories[$category][] = $permissio;
                        @endphp
                    @endforeach
            
                    @foreach ($categories as $categoryName => $categoryPermissions)
                        <div class="category">
                            <h4 class="text-bold text-center bg-primary">{{ ucfirst($categoryName) }}</h3>
                            @foreach ($categoryPermissions as $permissio)
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permissio->id }}" id="flexCheckDefault">
                                    <label>
                                        {{ $permissio->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            
            
            
        </div>
    
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-secondary" href="{{route('roles.index')}}">Volver</a>

    </form>
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop