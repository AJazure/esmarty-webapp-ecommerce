<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //$users = User::latest()->get();
        $users = User::with('roles')->role(['admin', 'vendedor', 'almacen', 'cajero'])->get();
        //return $users;

        return view('panel.administrador.lista_usuarios.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Creamos UN Usuario nuevo para cargarle datos
        $user = new User();
        
        $user_role = $user->getRoleNames();
        $all_roles = Role::all()->pluck('name'); //guardo todos los roles existentes

        //Retornamos la vista de creacion de users, enviamos al user y las categorias
        return view('panel.administrador.lista_usuarios.create', compact('user', 'user_role', 'all_roles')); //compact(mismo nombre de la variable)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();

        $reglas = [
            //'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%^&*()_+-])[A-Za-z\d@#$%^&*()_+-]+$/|confirmed', //regex indica que almenos contenga un valor de ellos
            'email'	=> 'required|email|unique:users,email', //reglas de correos únicos
            'dni' => 'required|unique:users,dni', //reglas de numeros de dni
            'rol_id' => 'required', //es obligatorio que seleccionen una opción que no sea  "seleccione un rol"
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
       ];

        // Definir mensajes de error personalizados
        $messages = [
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos un número y un signo.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'email.required' => 'El campo de correo electrónico es obligatorio para continuiar.',
            'email.email' => 'El correo ingresado no es válido o no es un correo.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'dni.required' => 'Ingresar un DNI válido es obligatorio.',
            'dni.unique' => 'Este número de DNI ya está en uso.',
            'rol_id.required' => 'Por favor seleccione un rol para el usuario.',
            'name.required' => 'Debe ingresar los nombres del usuario.',
            'apellido.required' => 'Debe ingresar el apellido del usuario',
            'telefono.required' => 'El campo de teléfono es obligatorio.',
        ];

        // Realizar la validación
        $validator = Validator::make($request->all(), $reglas, $messages);
        
        // Comprobar si la validación falla
        if ($validator->fails()) {
            return redirect()
                ->route('user.create', $user)
                ->withErrors($validator)
                ->withInput();
        }

        //Si pasa la validación prosigue a crear el nuevo user en la BD y asignar el rol
        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->telefono = $request->get('telefono');
        $user->direccion = $request->get('direccion');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        //asignación de nuevo rol
        $rolSeleccionado = $request->get('rol_id'); //obtengo el rol seleccionado del form (siempre debe llamarse rol_id)
        $nuevoRol = Role::where('name', $rolSeleccionado)->first(); //busca el nuevo rol traido del form en la bd de spatie
        $user->roles()->detach(); //elimino el rol del usuario
        $user->assignRole($nuevoRol); //asigno rol

        // Almacena la info del user en la BD
        $user->save();

        return redirect()
        ->route('user.index')
        ->with('alert', 'User "' . $user->name. " " .$user->apellido . '" agregado exitosamente.');
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

        $reglas = [
            'password' => 'nullable|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%^&*()_+-])[A-Za-z\d@#$%^&*()_+-]+$/|confirmed', //regex indica que almenos contenga un valor de ellos
            'rol_id' => 'required', //es obligatorio que seleccionen una opción que no sea  "seleccione un rol"
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos un número y un signo.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'email.required' => 'El campo de correo electrónico es obligatorio para continuiar.',
            'email.email' => 'El correo ingresado no es válido o no es un correo.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'rol_id.required' => 'Por favor seleccione un rol para el usuario.',
            'name.required' => 'Debe ingresar los nombres del usuario.',
            'apellido.required' => 'Debe ingresar el apellido del usuario',
            'telefono.required' => 'El campo de teléfono es obligatorio.',
        ];

        //Si se modificó la contraseña en el input, se agrega una nueva regla que verifica que sea único el correo
        if ($user->email !== $request->input('email')) {

            $reglas = [
                'email'	=> 'required|email|unique:users,email',
            ];
            
        }

        // Realiza la validación conforme a las reglas
        $validator = Validator::make($request->all(), $reglas, $messages);
        
        // Comprueba si la validación falla
        if ($validator->fails()) {
            return redirect()
                ->route('user.edit', $user)
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->telefono = $request->get('telefono');
        $user->direccion = $request->get('direccion');
        $user->email = $request->get('email');
        $nuevaPassword = $request->get('password'); //no se asigna directamente al obj $user

        // Verifica si se rellenó el campo de contraseña para encriptarla
        if (!empty($nuevaPassword)) {
            $user->password = Hash::make($nuevaPassword);    
        }

        //asignación de nuevo rol
        $rolSeleccionado = $request->get('rol_id'); //obtengo el rol seleccionado del form (siempre debe llamarse rol_id)
        $nuevoRol = Role::where('name', $rolSeleccionado)->first(); //busca el nuevo rol traido del form en la bd de spatie
        $user->roles()->detach(); //elimino el rol del usuario
        $user->assignRole($nuevoRol); //asigno rol
        

        // Actualiza la info del user en la BD
        $user->update();
        
        return redirect()
            ->route('user.index')
            ->with('alert', 'User "' .$user->name. " " .$user->apellido. '" actualizado exitosamente.');
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
