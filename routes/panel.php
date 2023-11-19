<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PrecioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->user()->hasRole('cliente')) {
        return redirect()->route('MandarDatosPaginaInicio');
    }

    return view('panel.index');
})->middleware(['verified'])->name('Welcome');

Route::resource('/proveedores', ProveedorController::class)->names('proveedor');
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/precios', PrecioController::class)->names('precio');
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
Route::get('exportar-precios-excel', [PrecioController::class, 'exportarPreciosExcel'])->name('exportar-precios-excel');
Route::get('exportar-precios-pdf', [PrecioController::class, 'exportarPreciosPDF'])->name('exportar-precios-pdf');


Route::post('/precios/actualizar-lote', [PrecioController::class, 'updateProveedor'])->name('precio.actualizarProveedor');
Route::post('/precios/actualizar2-lote', [PrecioController::class, 'updateCategoria'])->name('precio.actualizarCategoria');
Route::post('/precios/actualizar3-lote', [PrecioController::class, 'updateMarca'])->name('precio.actualizarMarca');
// Agregado
// Route::get('/getCategoriasMarcas/{proveedor_id}', 'ProductoController@getCategoriasMarcas');
