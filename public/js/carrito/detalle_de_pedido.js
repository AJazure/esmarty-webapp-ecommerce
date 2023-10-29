$(document).on('click', '.cargarItems', function () {
	var pedidoId = $(this).data('idpedido');
	let urlDeConsulta = rutaParaConsulta + "/" + pedidoId;
	console.log(urlDeConsulta);
	console.log(pedidoId);
	fetch(urlDeConsulta, {
		method: 'GET',
		headers: {
			'X-CSRF-TOKEN': token
		},
		// Puedes agregar más opciones según tus necesidades
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			return response.json();
		})
		.then(data => {
			console.log('Respuesta exitosa:');
			console.log(data);

			let tbody = document.getElementById('cart_item_list');

			// Vacía el tbody antes de agregar nuevos elementos
			tbody.innerHTML = '';
			data.forEach(item => {
				// Accede a las propiedades de cada objeto
				console.log('Imagen:', item.productos.url_imagen);
				console.log('Producto:', item.productos.nombre);
				console.log('Precio:', item.productos.precio);
				console.log('Cantidad:', item.cant_producto);
				console.log('Total:', item.subtotal * item.cant_producto);
				// ... y así sucesivamente para otras propiedades

				let row = document.createElement('tr');

				// Crea las celdas y asigna los valores de las propiedades
				let imagenCell = document.createElement('td');
				let imagen = document.createElement('img');
				imagen.src = item.productos.url_imagen;
				imagen.width = '120';
				imagenCell.appendChild(imagen);
				row.appendChild(imagenCell); // Agrega la celda a la fila

				let productoCell = document.createElement('td');
				productoCell.textContent = item.productos.nombre; // Asigna el valor de la propiedad del producto
				row.appendChild(productoCell); // Agrega la celda a la fila

				let precioCell = document.createElement('td');
				precioCell.textContent = item.productos.precio; // Asigna el valor de la propiedad del precio
				row.appendChild(precioCell); // Agrega la celda a la fila

				let cantidadCell = document.createElement('td');
				cantidadCell.textContent = item.cant_producto; // Asigna el valor de la propiedad de la cantidad
				row.appendChild(cantidadCell); // Agrega la celda a la fila

				let totalCell = document.createElement('td');
				totalCell.textContent = item.subtotal * item.cant_producto; // Calcula el total y asigna el valor
				row.appendChild(totalCell); // Agrega la celda a la fila

				// Agrega la fila al tbody
				tbody.appendChild(row);
			});

		})
		.catch(error => {
			console.error('Error:', error);
		});
});
