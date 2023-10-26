@extends('frontend.layouts.header')
@section('title','Cart Page')
@section('main-content')
	<!-- Breadcrumbs -->


	<!-- Shopping Cart -->
	<div class="shopping-cart section ">
		<div class="container border p-2">
			<div class="row ">
				<div class="col-12 ">
					<!-- Shopping Summery -->
                    <h4 class="p-4">Carrito de compras</h4>
					<table id="tabla_carrito" class="table shopping-summery table-striped" style="width: 100%;">
						<thead class="table-dark">
							<tr class="main-hading">
								<th class="text-center">Imagen</th>
								<th class="text-center">Producto</th>
								<th class="text-center">Precio</th>
								<th class="text-center">Cantidad</th>
								<th class="text-center">Total</th>
								<th class="text-center">Quitar</th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							{{-- <td class="text-center">Imagen</td>
							<td class="text-center">Producto</td>
							<td class="text-center">Precio</td>
							<td class="text-center">Cantidad</td>
							<td class="text-center">Total</td>
							<td class="text-center">Quitar</td> --}}
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
            <hr>
			<div class="row">
				<div class="col-12 d-flex justify-content-end">
					<!-- Total Amount -->
                    
					<div class="total-amount border p-2">
						<span><strong>Total:</strong></span> $<span id="valorTotal"></span>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
            <div class="row pt-3">
                <div class="col-12 d-flex justify-content-between">
                <a href="#" class="btn btn-secondary"><- Seguir comprando</a>
                <a href="#" class="btn btn-primary">Ir a pagar</a>
                </div>
            </div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

@endsection
@section('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endsection


@section('js')
        <script>
			let rutaParaEliminar = '{{ route('carrito.quitarItem' , '') }}';
			let base_url = '{{ route('carrito.miCarrito') }}';
            var token = '{{ csrf_token() }}';
        </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="{{asset('js/tabla_carrito.js')}}"></script>
    @stop