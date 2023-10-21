<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
<title>Reporte PDF</title>
</head>
<body>
<h3 class="text-center"> Productos de {{ auth()->user()->name }}</h3>
<table class="table table-striped w-100">
<thead class="bg-primary text-center text-white">
<tr>
<th scope="col" class="text-uppercase">Nombre</th>
<th scope="col" class="text-uppercase">Descripción</th>
<th scope="col" class="text-uppercase">Precio</th>

</tr>
</thead>
<tbody class="text-center">
@foreach ($productos as $producto)
<tr>
<td>{{ $producto->nombre }}</td>
<td>{{ Str::limit($producto->descripcion, 30) }}</td> <!-- Corta el string a 30 
caracteres -->
<td>{{ $producto->precio}}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>
