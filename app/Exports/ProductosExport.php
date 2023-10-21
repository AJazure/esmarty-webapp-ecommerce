<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ProductosExport implements FromCollection, WithHeadings
{
public function headings(): array
{
return [
'nombre', 'descripcion', 'precio'
];
}
public function collection()
{
return Producto::select('productos.nombre', 'descripcion', 'precio')
->get();
}
}

