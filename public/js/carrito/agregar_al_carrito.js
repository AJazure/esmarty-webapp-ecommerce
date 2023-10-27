//CAMBIA EL ESTADO EN LA BASE DE DATOS
$(document).on('click', '.agregarAlCarrito', function() {
  var agregarId = $(this).data('agregar-id');
    console.log(agregarId);
   $.ajax({
    url: rutaParaAgregar,
      type: 'POST',
      data: {
          _token: token,
          _id: agregarId
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
