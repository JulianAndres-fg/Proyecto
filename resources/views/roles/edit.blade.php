@extends('adminlte::page')

@section('title', 'Editar roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="card border-primary">
  <div class="card-header bg-primary">
    <h5>Editar Rol</h5>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @method('PUT')
        @csrf
    
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="name" value="{{ $role->name }}" class="form-control">
        </div>
    
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
                                    <input type="checkbox" name="permission[]" value="{{ $permissio->id }}" {{ in_array($permissio->id, $rolepermission) ? 'checked' : '' }}>
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
<script>

</script>
@stop