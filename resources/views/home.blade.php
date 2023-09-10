@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>PANEL DE CONTROL</h1>
@stop

@section('content')
    <p>Bienvenidos al sistema administrativo de DOMUX.</p>
    
    <div style="display: flex; justify-content: center; align-items: center; height: 600px;">
        <img src= " vendor/adminlte/dist/img/logoDomux.png " alt="LOGO DOMUX NO DISPONIBLE" style="max-width: 100%; max-height: 100%; vertical-align: middle;">
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop