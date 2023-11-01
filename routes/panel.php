<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('panel.index');
});
Route::resource('/proveedores', ProveedorController::class)->names('proveedor'); 
Route::resource('/productos', ProductoController::class)->names('producto');

Route::resource('/marcas', MarcaController::class)->names('marca'); //como es un controlador tipo resource usaré solo esta línea
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