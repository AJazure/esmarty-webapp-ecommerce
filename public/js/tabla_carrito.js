let configurationDataTable = {
	paging: true,
	pageLength: 8,
	destroy: true,
	deferRender: false,
	bLengthChange: false,
	select: false,
	responsive: true,
    searching: false, 
	language: {
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"search": "_INPUT_",
		"searchPlaceholder": "Buscar Usuario",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	},
};

console.log("Juarez estuvo aqui");

    fetch(base_url)
    .then(response => response.json())
    .then(data => {
        // Llenar la tabla DataTable con los datos
        $('#tabla_carrito').DataTable({
            data: data,
            columns: [
                { data: 'id' }, 
                { data: 'id_producto' } ,
                { data: 'subtotal' } ,
                { data: 'cant_producto' } ,
                { data: null, // No necesitas datos para esta columna, ya que se calculará usando render
                render: function(data, type, row) {
                    // Calcula la multiplicación de subtotal y cant_producto para cada fila
                    return row.subtotal * row.cant_producto;
                }} ,
                // Agrega más columnas según sea necesario
            ],
            responsive: true, // Para hacer la tabla sensible (responsive)
            lengthChange: false, // Deshabilita el control para cambiar la cantidad de resultados mostrados por página
            searching: false, // Habilita la barra de búsqueda
            ordering: false, // Habilita la ordenación por columna
            paging: false, // Habilita la paginación
            info: false, // Muestra la información del estado de la tabla (por ejemplo, "Mostrando 1 a 10 de 20 entradas")
        });
        console.log(data);
    })
    .catch(error => console.error('Error:', error));
    
    