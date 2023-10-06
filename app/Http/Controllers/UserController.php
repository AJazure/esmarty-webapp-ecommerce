<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = User::latest()->get();
        
        return view('panel.administrador.lista_usuarios.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //Creamos UN Usuario nuevo para cargarle datos
        $user = new User();
        
        //Recuperamos todas las categorias de la BD
        //$categorias = Categoria::get();//Recordar importar el modelo Categoria
        //$marcas = Marca::get();//Recordar importar el modelo Categoria

        //Retornamos la vista de creacion de users, enviamos al user y las categorias
        return view('panel.administrador.lista_users.create', compact('user')); //compact(mismo nombre de la variable)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        
        //$user->codigo_user = $request->get('codigo_user');
        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->telefono = $request->get('telefono');
        $user->direccion = $request->get('direccion');
        $user->email = $request->get('email');

        // Almacena la info del user en la BD
        $user->save();

        return redirect()
        ->route('user.index')
        ->with('alert', 'User "' . $user->nombre . '" agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('panel.administrador.lista_usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user_role = $user->getRoleNames();
        $all_roles = Role::all()->pluck('name'); //guardo todos los roles existentes
        //var_dump($all_roles_in_database);die();
        return view('panel.administrador.lista_usuarios.edit', compact('user', 'user_role', 'all_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->telefono = $request->get('telefono');
        $user->direccion = $request->get('direccion');
        $user->email = $request->get('email');
        
        $nuevaPassword = $user->password = $request->get('password'); //recibe el password ingresado

        if (!empty($nuevaPassword)) {
            // Si se ingresó una nueva contraseña entonces se encripta y actualiza
            $user->password = Hash::make($nuevaPassword);
        }

        // Actualiza la info del user en la BD
        $user->update();
        
        return redirect()
            ->route('user.index')
            ->with('alert', 'User "' .$user->name. '" actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()
        ->route('user.index')
        ->with('alert', 'User eliminado exitosamente');
    }
}
