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
            'descripcion' => 'Celulares y Tablets'
        ]);
        Categoria::create([
            'descripcion' => 'Componentes PC'
        ]);
        Categoria::create([
            'descripcion' => 'Tvs y Monitores'
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
        Categoria::create([
            'descripcion' => 'Consolas'
        ]);
        Categoria::create([
            'descripcion' => 'Periféricos'
        ]);
        Categoria::create([
            'descripcion' => 'Watches'
        ]);
    }
}
