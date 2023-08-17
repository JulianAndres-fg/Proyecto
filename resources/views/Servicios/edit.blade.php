@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PANEL DE CONTROL</h1>
@stop

@section('content')
    <p>Bienvenidos al sistema administrativo de DOMUX.</p>
    <img src=" vendor/adminlte/dist/img/logoDomux.png         " alt=""> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop