<?php

namespace App\Http\Controllers;

use App\Models\MetodoDePago;
use Illuminate\Http\Request;

class MetodoDePagoController extends Controller
{
    public function index()
    {
        //
        $metodosDePago = MetodoDePago::latest()->get();
        // Retornamos una vista y enviamos la variable "productos"
        return view('panel.administrador.lista_mdp.index', compact('metodosDePago'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $marca = new MetodoDePago();
        return view('panel.administrador.lista_mdp.create', compact('marca')); //compact(mismo nombre de la variable)
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $marca = new MetodoDePago();
        $marca->descripcion = $request->get('descripcion');
        $marca->activo = $request->get('activo');


            // Almacena la info del producto en la BD
        $marca->save();
        return redirect()
        ->route('marca.index')
        ->with('alert', 'Marca "' . $marca->descripcion . '" agregada exitosamente.');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodoDePago $marca)
    {
        //
        return view('panel.administrador.lista_marcas.show', compact('marca'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodoDePago $marca)
    {
        //
        // $marcas = Marca::get();
        return view('panel.administrador.lista_marcas.edit', compact('marca'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodoDePago $marca)
    {
        //
        $marca->descripcion = $request->get('descripcion');
        $marca->activo = $request->get('activo');
        if ($request->hasFile('url_imagen')) {
            // Subida de la imagen nueva al servidor
            $url_imagen = $request->file('url_imagen')->store('public/marca');
            $marca->url_imagen = asset(str_replace('public', 'storage', $url_imagen));
        }
        // Actualiza la info del producto en la BD
        $marca->update();
        
        return redirect()
            ->route('marca.index')
            ->with('alert', 'Marca "' .$marca->descripcion. '" actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodoDePago $marca)
    {
        //
        
    }

    public function cambiarEstado(Request $request)
    {
        $marca = MetodoDePago::find($request->_id);

        if (!$marca) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $marca->activo = !$marca->activo; // Cambia el estado
        $marca->save();

        return response()->json(['message' => 'Estado de categoría cambiado con éxito']);
    }
}
