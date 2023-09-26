<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_vendedor = Role::create(['name' => 'vendedor']);
        $rol_almacen = Role::create(['name' => 'almacen']);
        $rol_cajero = Role::create(['name' => 'cajero']);

        $rol_cliente = Role::create(['name' => 'cliente']);

        // Permisos para cada rol
        Permission::create(['name' => 'lista_usuarios'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_productos'])->assignRole($rol_vendedor);
        Permission::create(['name' => 'lista_almacen'])->assignRole($rol_almacen);
        Permission::create(['name' => 'lista_caja'])->assignRole($rol_cajero);

        Permission::create(['name' => 'lista_compras'])->assignRole($rol_cliente);
    }
}
