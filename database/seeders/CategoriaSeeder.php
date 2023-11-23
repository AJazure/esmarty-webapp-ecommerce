<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Categoria::create([
            'descripcion' => 'Notebook'
        ]);
        Categoria::create([
            'descripcion' => 'Celulares'
        ]);
        Categoria::create([
            'descripcion' => 'Componentes PC'
        ]);
        Categoria::create([
            'descripcion' => 'Televisores'
        ]);
        Categoria::create([
            'descripcion' => 'Proyectores'
        ]);
        Categoria::create([
            'descripcion' => 'Audio'
        ]);
        Categoria::create([
            'descripcion' => 'Sin Categoría'
        ]);
    }
}
