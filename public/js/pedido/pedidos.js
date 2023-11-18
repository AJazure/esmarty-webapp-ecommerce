let configurationDataTable = {
    responsive: true,
	autoWidth: false,
	paging: true,
	destroy: true,
	deferRender: false,
	bLengthChange: true,
	select: false,
    searching: true,
	pageLength: 10,
	lengthMenu: [[5,10,20,-1],[5,10,20,'Todos']], 
	 dom: '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"B><"col-md-6"p>>', 
	          
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Excel <i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success',
				exportOptions: {
					columns: [0, 1, 2] // Índices de las columnas que quieres exportar (0-indexed)
				}
			},
			{
				extend:    'print',
				text:      'Imprimir <i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info',
				exportOptions: {
					columns: [0, 1, 2] // Índices de las columnas que quieres exportar (0-indexed)
				}
			},
		],
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
		"searchPlaceholder": "Buscar...",
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
		},	 
	},
}

$(function() {
    table = $('#tabla-pedidos').DataTable(configurationDataTable);
});


