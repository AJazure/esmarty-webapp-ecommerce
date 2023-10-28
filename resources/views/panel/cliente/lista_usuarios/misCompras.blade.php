{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Mis Compras')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>&nbsp;<strong>Mis Compras</strong></h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        
        </div>
        
        @if (session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col" class="text-uppercase">N° de Pedido</th>
                            <th scope="col" class="text-uppercase">Fecha de Pedido</th>
                            <th scope="col" class="text-uppercase">Costo Total</th>
                            <th scope="col" class="text-uppercase">N° de Seguimiento</th>
                            <th scope="col" class="text-uppercase">Pagado</th>
                            <th scope="col" class="text-uppercase">En Preparacion</th>
                            <th scope="col" class="text-uppercase">Cancelado</th>
                            <th scope="col" class="text-uppercase">Enviado</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr>
                        <td>{{ $pedido->num_pedido }}</td>
                        <td>{{ $pedido->created_at }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->num_seguimiento}}</td>
                        <td>{{ $pedido->pagado }}</td>
                        <td>{{ $pedido->en_preparacion }}</td>
                        <td>{{ $pedido->cancelado }}</td>
                        <td>{{ $pedido->enviado }}</td>
                        
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
    <script>
    var token = '{{ csrf_token() }}'; 
    </script>
    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/usuarios.js') }}"></script>
@stop