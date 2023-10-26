function cargarTabla() {
	return new Promise((resolve, reject) => {

fetch(base_url)
	.then(response => response.json())
	.then(data => {
		// Llenar la tabla DataTable con los datos
		$('#tabla_carrito').DataTable({
			data: data,
			columns: [
				{
					data: 'productos.url_imagen',
					render: function (data, type, row) {
						return `<img src="${data}" class="image" width=100px>`
					}
				},
				{ data: 'productos.nombre' },
				{ data: 'subtotal' },
				{ data: 'cant_producto' },
				{
					data: null, // No necesitas datos para esta columna, ya que se calculará usando render
					render: function (data, type, row) {
						// Calcula la multiplicación de subtotal y cant_producto para cada fila
						return  `<span id='totales'>${row.subtotal * row.cant_producto}</span>`;
					}
				},
				{
					data: null,
					render: function (data, type, row) {
						return '<button class="btn btn-danger eliminar-btn">Eliminar</button>';
					}
				},
				// Agrega más columnas según sea necesario
			],
			rowId: 'id',
			responsive: true, // Para hacer la tabla sensible (responsive)
			lengthChange: false, // Deshabilita el control para cambiar la cantidad de resultados mostrados por página
			searching: false, // Habilita la barra de búsqueda
			ordering: false, // Habilita la ordenación por columna
			paging: false, // Habilita la paginación
			info: false, // Muestra la información del estado de la tabla (por ejemplo, "Mostrando 1 a 10 de 20 entradas")
			language: {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún producto en el carrito",
			},
			initComplete: function() {
				// Resolve la promesa con los datos de la tabla
				resolve(data);
			}
			
		});
		
	})
	.catch(error => reject('Error:', error));
});
}
var  valorTotal = document.getElementById("valorTotal");
function sumarTotales(data) {
    var  totalSuma = data.reduce((total, item) => total + item.subtotal * item.cant_producto, 0);
    console.log('Total de los totales:', totalSuma);
	 valorTotal.textContent = totalSuma;
}

async function mostrarTabla() {
	try {
		const data = await cargarTabla();
        sumarTotales(data);
	} catch (error) {
	  console.error(error); // Se ejecutará si la promesa es rechazada
	}
  }
  
  mostrarTabla();

  //ElominarItems del carrito

	$('#tabla_carrito').on('click', '.eliminar-btn', function() {
		var table = $('#tabla_carrito').DataTable();
    	var fila = table.row($(this).parents('tr')); // Obtener la fila
    	var datosFila = fila.data(); // Obtener los datos de la fila
    	var rowId = fila.id(); // Obtener el ID de la fila
		
		console.log("ID de la fila:", rowId);
    	console.log("Datos de la fila:", datosFila);

		//Recalcular el total del carrito
		var totalMenos = datosFila.subtotal * datosFila.cant_producto;
		valorTotal.textContent -= totalMenos;
		console.log('Total de los totales nuevo:', valorTotal.textContent);
		table.row($(this).parents('tr')).remove().draw(); // Eliminar la fila
		
		

		// Solicitud AJAX para eliminar el producto del carrito en el backend:
		  $.ajax({
		url: rutaParaEliminar,
		type: 'POST',
		data: {
			_token: token,
			_id: rowId
		},
		success: function(response) {
			// Maneja la respuesta exitosa, actualiza la interfaz de usuario, si es necesario.

                console.log(response.message);
            
		},
		error: function(xhr) {
			// Maneja errores, si es necesario.
			var errors = xhr.responseJSON;
			console.log(errors.error);
		}
		
		});  
	});

	
	