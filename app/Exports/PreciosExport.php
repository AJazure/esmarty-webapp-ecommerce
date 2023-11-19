<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PreciosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#', 'Nombre', 'Categoría', 'Marca', 'Precio', 
        ];
    }
    public function collection()
    {
        return Producto::select('codigo_producto','nombre', 'categorias.descripcion as categoria','marcas.descripcion as marca' ,'precio')
        ->join('categorias', 'categorias.id', 'productos.id_categoria')
        ->join('marcas', 'marcas.id', 'productos.id_marca')
            ->get();
    }
}
