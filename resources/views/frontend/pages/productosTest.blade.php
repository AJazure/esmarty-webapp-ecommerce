@extends('frontend.layouts.header')
@section('title', 'Cart Page')
@section('main-content')
    <!-- Breadcrumbs -->


    <!-- Shopping Cart -->
    <div class="shopping-cart section ">
        @if (session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                </div>
            </div>
        @endif
        <div class="container border p-2">
            <div class="row ">
                <div class="col-12 ">
                    <!-- Shopping Summery -->
                    <h4 class="p-4">Agregar algun producto de la base de datos al carrito</h4>
                    <a href="{{ url('carrito') }}" class="btn btn-warning" style="float: right">Ir al carrito</a>
                    <table id="tabla-productos" class="table table-striped table-hover w-100">

                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase">Nombre</th>
                                <th scope="col" class="text-uppercase">Precio</th>
                                <th scope="col" class="text-uppercase">Imagen</th>
                                <th scope="col" class="text-uppercase">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>
                                        <img src="{{ $producto->url_imagen }}" alt="{{ $producto->nombre }}"
                                            class="img-fluid" style="width: 150px;">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button href="#" data-agregar-id="{{ $producto->id }}"
                                                class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2 agregarAlCarrito">
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ End Shopping Cart -->

        @endsection
        @section('styles')
            <style>
                .cantidades {
                    padding: 5px;
                }

                .columnaCantidad {
                    display: flex;
                    flex-wrap: nowrap;
                }

                .btn-warning {
                    color: #fff;
                    font-weight: bold;
                }

                .btn-warning:hover {
                    color: #fff;
                    font-weight: bold;
                }

                .btn-warning:active {
                    color: #fff !important;
                    font-weight: bold;
                }

                .btn-warning:focus {
                    color: #fff;
                    font-weight: bold;
                }
            </style>
        @endsection


        @section('js')
            <script>
                // Verificar si hay una URL de redirección adicional
                var redirectUrl = '{{ session('redirectUrl') }}';

                if (redirectUrl) {
                    // Redirigir al usuario a la URL adicional
					
                    window.location.href = redirectUrl;
                }

                let rutaParaAgregar = '{{ route('carrito.agregarAlCarrito') }}';
                var token = '{{ csrf_token() }}';
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
                integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
            </script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{ asset('js/productos.js') }}"></script>
            <script src="{{ asset('js/carrito/agregar_al_carrito.js') }}"></script>
        @stop
