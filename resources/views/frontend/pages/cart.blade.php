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
					<table class="table shopping-summery ">
						<thead>
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
							<td class="text-center">Imagen</td>
							<td class="text-center">Producto</td>
							<td class="text-center">Precio</td>
							<td class="text-center">Cantidad</td>
							<td class="text-center">Total</td>
							<td class="text-center">Quitar</td>
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
						<span><strong>Total:</strong></span> $9999.99
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
@push('styles')
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
@endpush
@push('scripts')
	

@endpush