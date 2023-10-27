<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DetallePedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetallePedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::latest()->get();
        // Retornamos una vista y enviamos la variable "productos"
        return view('frontend.pages.productosTest', compact('productos'));
    }



    public function agregarAlCarrito(Request $request) //Busca un item especifico en los pedidos y actualiza la cantidad pedida
    {

        $producto = Producto::find($request->_id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $itemViejo = DetallePedidos::where('id_producto', $producto->id)->whereNull('id_pedido')->first(); //Se fija si ya hay un producto igual cargado en el carrito

        if ($itemViejo) { //Si ya existe ese producto en el carrito, solo aumenta la cantidad en +1
            // El registro fue encontrado, puedes acceder a sus propiedades
             $itemViejo->cant_producto += 1;
             $itemViejo->save();
             return response()->json(['message' => '+1 agregado al carrito correctamente']);
        } else { //Si no existe, entonces lo agrega
            // El registro no fue encontrado
            $nuevoItem = new DetallePedidos();
            $nuevoItem->id_cliente = Auth::id();
            $nuevoItem->id_pedido = null;
            $nuevoItem->id_producto = $producto->id;
            $nuevoItem->cant_producto = 1;
            $nuevoItem->subtotal = $producto->precio * $nuevoItem->cant_producto;

            $nuevoItem->save();
            return response()->json(['message' => 'Producto agregado al carrito correctamente']);
        }
        
    }

    public function miCarrito() //Trae todos los productos que esten en un carrito, pero no en un pedido, dependiendo del cliente 
    {
        $user_id = Auth::id();
        $detallePedidos = DetallePedidos::latest()->where('id_cliente', $user_id)->whereNull('id_pedido')->with('productos')->get();
        return response()->json($detallePedidos);
    }


    public function actualizarCantidad(Request $request) //Busca un item especifico en los pedidos y actualiza la cantidad pedida
    {

        $item = DetallePedidos::find($request->_id);

        if (!$item) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $item->cant_producto = $request->cantidad;

        $item->update();
        return response()->json(['message' => 'Producto actualizado correctamente']);
    }


    public function quitarItem(Request $id) //Elimina una fila de detalle_pedidos, borra un item de un carrito
    {

        $item = DetallePedidos::find($id->_id);

        if (!$item) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
