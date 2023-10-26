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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetallePedidos $DetallePedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetallePedidos $DetallePedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetallePedidos $DetallePedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function quitarItem(Request $id)
    {

        $item = DetallePedidos::find($id->_id);

        if (!$item) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }


    public function miCarrito()
    {
        $user_id = Auth::id();
        $detallePedidos = DetallePedidos::latest()->where('id_cliente', $user_id)->with('productos')->get();
        return response()->json($detallePedidos);
    }
}
