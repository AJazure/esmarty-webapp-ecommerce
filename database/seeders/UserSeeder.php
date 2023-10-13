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
            'name'=>'admin',
            'apellido' => '',
            'email'=>'admin@esmarty.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('admin');

        User::create([
            'name'=>'Vendedor Cristian Mené',
            'email'=>'vendedor@esmarty.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('vendedor');

        User::create([
            'name'=>'Operario Emanuel Hoyos',
            'email'=>'almacen@esmarty.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('almacen');

        User::create([
            'name'=>'Cajero Cristian Leyton',
            'email'=>'cajero@esmarty.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('cajero');

        User::create([
            'name'=>'Nicolás Juárez',
            'email'=>'juareznicozar@gmail.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('cliente');
    }
}
