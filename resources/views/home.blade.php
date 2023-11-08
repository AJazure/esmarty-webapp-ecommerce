@extends('adminlte::page')

@section('title', 'Inicio Ecore Admin')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido a este admin</p>
    <div class="card">
        <div class="card-header">
            <h1>Bienvenido a la Prueba</h1>
        </div>

        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam voluptas modi enim qui odit, quia possimus, inventore commodi vitae soluta similique ducimus hic! Minus saepe nostrum deserunt quam eum!</p>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('hola'); </script>
@stop