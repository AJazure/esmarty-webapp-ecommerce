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

//Rutas del panel del cliente
Route::middleware(['cliente','verified'])->group(function () {
	//Rutas del perfil del cliente
	Route::get('/cliente/editar', [ClienteController::class, 'editar'])->name('cliente.editar'); 
	Route::put('/cliente/actualizar/{cliente}', [ClienteController::class, 'actualizar'])->name('cliente.actualizar'); 
	Route::resource('/cliente', ClienteController::class)->names('cliente');
	Route::resource('/pedidos', PedidoController::class)->names('pedidos'); 
	Route::post('/pedidos/cancelarPedido/{pedido}', [PedidoController::class, 'cancelarPedido'])->name('pedidos.cancelarPedido');
});

//Ruta para ver detalles del pedido
Route::get('/pedidos/itemsPedido/{pedido}', [PedidoController::class, 'itemsPedido'])->middleware(['verified'])->name('pedidos.itemsPedido');

//Rutas del panel del almacen
Route::middleware(['almacen','verified'])->group(function () {
//Rutas de los CRUD basicos
Route::resource('/proveedores', ProveedorController::class)->names('proveedor');
//Rutas del stock
Route::resource('/stock', StockController::class)->names('stock');
Route::get('/historico-stock', [StockController::class, 'historicoVista'])->name('stock.historico');
Route::get('/showDetalle', [StockController::class, 'showDetalle'])->name('stock.showDetalle');
//Rutas para preparar pedidos
Route::get('/preparacion', [PedidoController::class, 'pedidosPagados'])->name('pedidosPagados');
Route::get('/enviados', [PedidoController::class, 'pedidosEnviados'])->name('pedidosEnviados');
Route::get('/preparar-pedido/{id}', [PedidoController::class, 'prepararPedido'])->name('prepararPedido');
Route::post('/guardar-numero/{id}', [PedidoController::class, 'guardarNumero'])->name('guardarNumero');
});

//Rutas del panel del vendedor
Route::middleware(['vendedor','verified'])->group(function () {
//Rutas de los CRUD basicos
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/marcas', MarcaController::class)->names('marca'); 
Route::resource('/categorias', CategoriaController::class)->names('categoria');
Route::get('exportar-productos-excel', [ProductoController::class, 'exportarProductosExcel'])->name('exportar-productos-excel');
Route::get('exportar-productos-pdf', [ProductoController::class, 'exportarProductosPDF'])->name('exportar-productos-pdf');
});


//Rutas del panel del cajero
Route::middleware(['cajero','verified'])->group(function () {
//Rutas de las cajas
Route::get('/ventas', [VentaController::class, 'index'])->name('venta.index');
Route::get('/ventas/venta-diaria', [VentaController::class, 'ventasDiarias'])->name('venta.ventasDiarias');
Route::get('/ventas/exportarExcel', [VentaController::class, 'exportarExcel'])->name('venta.exportarExcel');
Route::get('/ventas/venta-mensual', [VentaController::class, 'ventasMensuales'])->name('venta.ventasMensuales');
});

//Rutas del panel del admin 
Route::middleware(['admin','verified'])->group(function () {
Route::resource('/metodosdepago', MetodoDePagoController::class)->names('metodosdepago');
Route::resource('/users', UserController::class)->names('user');
});

Route::get('/', function () {//Ruta principal del panel
	return view('panel.index');
})->middleware(['verified'])->name('Welcome');
