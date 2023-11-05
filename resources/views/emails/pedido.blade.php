<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Document</title>
</head>
<body>
 <p>Estimado/a {{ $user['name'] }} su pedido fue creado con éxito. </p>
 <p>Fue guardado con el número de pedido N°{{ $user['num_pedido'] }}, recuerde que tiene 3 dias para realizar el pago, de lo contrario se cancelara el pedido automaticamente.  </p>
 <p>Fecha de creación del pedido {{ $user['fecha'] }}.</p>

 Este correo fue generado automaticamente. No conteste este correo. 
</body>
</html>
