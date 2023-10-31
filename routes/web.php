<?php

use App\Models\DetallePedidos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/categorias/cambiarEstado', [App\Http\Controllers\CategoriaController::class, 'cambiarEstado'])->name('cambiar.estado.categoria');

Route::post('/proveedores/cambiarEstado', [App\Http\Controllers\ProveedorController::class, 'cambiarEstado'])->name('cambiar.estado.proveedor');

Route::post('/productos/cambiarEstado', [App\Http\Controllers\ProductoController::class, 'cambiarEstado'])->name('cambiar.estado.producto');

Route::post('/marcas/cambiarEstado', [App\Http\Controllers\MarcaController::class, 'cambiarEstado'])->name('cambiar.estado.marcas');

Route::post('/metodosdepago/cambiarEstado', [App\Http\Controllers\MetodoDePagoController::class, 'cambiarEstado'])->name('cambiar.estado.metodosdepago');

Route::post('/users/cambiarEstado', [App\Http\Controllers\UserController::class, 'cambiarEstado'])->name('cambiar.estado.users');

//Carrito rutas
Route::get('/carrito', function () {
    return view('frontend.pages.cart');
});

Route::get('/miCarrito', [App\Http\Controllers\DetallePedidosController::class, 'miCarrito'])->name('carrito.miCarrito');
Route::get('/agregarProductos', [App\Http\Controllers\DetallePedidosController::class, 'index'])->name('carrito.agregarProductos');
Route::post('/miCarrito/quitarItem', [App\Http\Controllers\DetallePedidosController::class, 'quitarItem'])->name('carrito.quitarItem');
Route::post('/miCarrito/actualizarCantidad', [App\Http\Controllers\DetallePedidosController::class, 'actualizarCantidad'])->name('carrito.actualizarCantidad');
Route::post('/miCarrito/agregarAlCarrito', [App\Http\Controllers\DetallePedidosController::class, 'agregarAlCarrito'])->name('carrito.agregarAlCarrito');

//Pedido rutas
Route::post('/carrito/checkout', [App\Http\Controllers\PedidoController::class, 'checkout'])->name('carrito.checkout');
Route::get('/carrito/checkout', [App\Http\Controllers\PedidoController::class, 'create'])->name('carrito.create');
Route::any('/carrito/guardar', [App\Http\Controllers\PedidoController::class, 'store'])->name('pedido.store');
Route::any('/pedido/pago', [App\Http\Controllers\PedidoController::class, 'pago'])->name('pedido.pago');
