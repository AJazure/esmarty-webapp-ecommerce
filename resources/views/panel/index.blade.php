@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<h1>&nbsp;<strong>Panel Esmarty</strong></h1>
@stop

<!-- {{-- @section('content') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Bienvenido"{{-- {{ $cliente->name }} {{ $cliente->apellido }} --}}"</h1>
            <a href="{{-- {{  route('cliente.index') }} --}}#" class="btn btn-sm btn-primary text-uppercase">
                <i class="fas fa-shopping-cart"></i> Seguir comprando
            </a>
        </div>
    </div>
</div>
{{-- @stop  --}}-->


@section('js')
    <script> console.log('Hi!'); </script>
@stop
