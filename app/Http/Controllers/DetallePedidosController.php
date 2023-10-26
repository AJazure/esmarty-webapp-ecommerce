<?php

namespace App\Http\Controllers;

use App\Models\DetallePedidos;
use Illuminate\Http\Request;

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
    public function destroy(DetallePedidos $DetallePedidos)
    {
        //
    }

    public function miCarrito() {
        $detallePedidos = DetallePedidos::latest()->get();
        return response()->json($detallePedidos);
    }
}
