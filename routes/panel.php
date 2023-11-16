<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
	if (auth()->user()->hasRole('cliente')) {
		return redirect()->route('MandarDatosPaginaInicio');
	}

	return view('panel.index');
})->middleware(['verified'])->name('Welcome'); */

Route::get('/', function () {
	return view('panel.index');
})->middleware(['verified'])->name('Welcome');

Route::resource('/proveedores', ProveedorController::class)->names('proveedor');
Route::resource('/productos', ProductoController::class)->names('producto');

Route::get('/pedidos/preparacion', [PedidoController::class, 'pedidosPagados'])->name('pedidosPagados');
Route::get('/pedidos/enviados', [PedidoController::class, 'pedidosEnviados'])->name('pedidosEnviados');
Route::get('/preparar-pedido/{id}', [PedidoController::class, 'prepararPedido'])->name('prepararPedido');
Route::post('/guardar-numero/{id}', [PedidoController::class, 'guardarNumero'])->name('guardarNumero');


Route::resource('/marcas', MarcaController::class)->names('marca'); 
Route::resource('/categorias', CategoriaController::class)->names('categoria');
Route::resource('/users', UserController::class)->names('user');


Route::get('/cliente/editar', [ClienteController::class, 'editar'])->name('cliente.editar'); 
Route::put('/cliente/actualizar/{cliente}', [ClienteController::class, 'actualizar'])->name('cliente.actualizar'); 
Route::resource('/cliente', ClienteController::class)->names('cliente');
Route::resource('/metodosdepago', MetodoDePagoController::class)->names('metodosdepago');
Route::get('exportar-productos-excel', [ProductoController::class, 'exportarProductosExcel'])->name('exportar-productos-excel');
Route::get('exportar-productos-pdf', [ProductoController::class, 'exportarProductosPDF'])->name('exportar-productos-pdf');
Route::resource('/pedidos', PedidoController::class)->names('pedidos'); 
Route::get('/pedidos/itemsPedido/{pedido}', [PedidoController::class, 'itemsPedido'])->name('pedidos.itemsPedido');
Route::post('/pedidos/cancelarPedido/{pedido}', [PedidoController::class, 'cancelarPedido'])->name('pedidos.cancelarPedido');
Route::get('/ventas', [VentaController::class, 'index'])->name('venta.index');
Route::get('/ventas/venta-diaria', [VentaController::class, 'ventasDiarias'])->name('venta.ventasDiarias');
Route::get('/ventas/exportarExcel', [VentaController::class, 'exportarExcel'])->name('venta.exportarExcel');
Route::get('/ventas/venta-mensual', [VentaController::class, 'ventasMensuales'])->name('venta.ventasMensuales');
Route::resource('/stock', StockController::class)->names('stock');
Route::get('/historico', [StockController::class, 'historicoVista'])->name('stock.historico');
Route::get('/showDetalle', [StockController::class, 'showDetalle'])->name('stock.showDetalle');

