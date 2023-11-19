<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creación de usuarios para roles de prueba
        User::create([
            'name'=>'Marecelo',
            'apellido' => 'Zenzano',
            'email'=>'admin@esmarty.com',
            'dni' => '28034723',
            'telefono' => '3875154423',
            'password'=> Hash::make('a12345-'),
        ])->assignRole('admin');

        User::create([
            'name'=>'Cristian',
            'apellido' => 'Mené',
            'email'=>'vendedor@esmarty.com',
            'dni' => '32034723',
            'telefono' => '3875156623',
            'password'=> Hash::make('a12345-'),
        ])->assignRole('vendedor');

        User::create([
            'name'=>'Emanuel',
            'apellido' => 'Hoyos',
            'email'=>'almacen@esmarty.com',
            'dni' => '40034723',
            'telefono' => '3875154122',
            'password'=> Hash::make('a12345-'),
        ])->assignRole('almacen');

        User::create([
            'name'=>'Martín Emanuel',
            'apellido' => 'Fernández',
            'email'=>'cajero@esmarty.com',
            'dni' => '38034123',
            'telefono' => '3875154422',
            'password'=> Hash::make('a12345-'),
        ])->assignRole('cajero');

        User::create([
            'name'=>'Nicolás',
            'apellido' => 'Juárez',
            'email'=>'juareznicozar@gmail.com',
            'dni' => '32000723',
            'telefono' => '3875112534',
            'password'=> Hash::make('a12345-'),
        ])->assignRole('cliente');

        User::create([
            'name'=>'Nicolas',
            'apellido' => 'Juarez',
            'email'=>'juareznicozar2@gmail.com',
            'dni' => '32000723',
            'telefono' => '3875112534',
            'password'=> Hash::make('a123456-'),
        ])->assignRole('cliente');
    }
}
