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
                <table id="tabla-productos" class="table table-striped table-hover w-100 text-center">
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
                            <th scope="col" class="text-uppercase">Ver Detalle</th>
                            
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
                        <td><a href="#" class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2 cargarItems"
                            data-toggle="modal" data-target="#showDetallePedidoModal"
                            data-idpedido="{{ $pedido->id }}"
                            data-num-pedido="{{ $pedido->num_pedido }}"
                            data-nombre="{{ $pedido->nombre }}"
                            data-apellido="{{ $pedido->apellido }}"
                            data-email="{{ $pedido->correo }}"
                            data-dni="{{ $pedido->dni }}"
                            data-direccion="{{ $pedido->direccion }}"
                            data-codigopostal="{{ $pedido->codigo_postal }}"
                            data-telefono="{{ $pedido->telefono }}"
                            data-total="{{ $pedido->total }}">
                             Detalles
                         </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('panel.cliente.lista_usuarios.showDetallePedido')
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
    <script>



    $('#showDetallePedidoModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var numPedido = button.data('num-pedido');
        var email = button.data('email');
        var dni = button.data('dni');
        var telefono = button.data('telefono');
        var nombre = button.data('nombre');
        var apellido = button.data('apellido');
        var direccion = button.data('direccion');
        var codigopostal = button.data('codigopostal');
        var total = button.data('total');

        $('#modal-nombre').text(nombre);
        $('#modal-apellido').text(apellido);
        $('#modal-num-pedido').text(numPedido);
        $('#modal-email').text(email);
        $('#modal-dni').text(dni);
        $('#modal-telefono').text(telefono);
        $('#modal-direccion').text(direccion);
        $('#modal-codigopostal').text(codigopostal);
        $('#modal-total').text(total);

        var idPedido = button.data('idpedido');
        $('#modal-idPedido').text(idPedido);
        
    });
            let rutaParaConsulta = '{{ route('pedidos.itemsPedido' , '') }}';
            var token = '{{ csrf_token() }}';
    </script>
    <script src="{{asset('js/carrito/detalle_de_pedido.js')}}"></script>
@stop