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
        $mdp = new MetodoDePago();
        return view('panel.administrador.lista_mdp.create', compact('mdp ')); //compact(mismo nombre de la variable)
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $mdp  = new MetodoDePago();
        $mdp ->descripcion = $request->get('descripcion');
        $mdp ->activo = $request->get('activo');


            // Almacena la info del producto en la BD
        $mdp ->save();
        return redirect()
        ->route('MetodoDePago.index')
        ->with('alert', 'MetodoDePago "' . $mdp ->descripcion . '" agregada exitosamente.');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodoDePago $mdp )
    {
        //
        return view('panel.administrador.lista_mdp.show', compact('mdp '));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodoDePago $mdp )
    {
        //
        // $mdp  = MetodoDePago::get();
        return view('panel.administrador.lista_mdp.edit', compact('mdp '));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodoDePago $mdp )
    {
        //
        $mdp ->descripcion = $request->get('descripcion');
        $mdp ->activo = $request->get('activo');
        if ($request->hasFile('url_imagen')) {
            // Subida de la imagen nueva al servidor
            $url_imagen = $request->file('url_imagen')->store('public/mdp');
            $mdp ->url_imagen = asset(str_replace('public', 'storage', $url_imagen));
        }
        // Actualiza la info del producto en la BD
        $mdp ->update();
        
        return redirect()
            ->route('MetodoDePago.index')
            ->with('alert', 'MetodoDePago "' .$mdp ->descripcion. '" actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodoDePago $mdp )
    {
        //-
        
    }

    public function cambiarEstado(Request $request)
    {
        $mdp  = MetodoDePago::find($request->_id);

        if (!$mdp ) {
            return response()->json(['error' => 'metodo no encontrada'], 404);
        }

        $mdp ->activo = !$mdp ->activo; // Cambia el estado
        $mdp ->save();

        return response()->json(['message' => 'Estado de metodo cambiado con éxito']);
    }
}
