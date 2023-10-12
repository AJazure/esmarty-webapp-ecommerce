// Obtén una lista de todas las referencias a los interruptores
const interruptores = document.querySelectorAll('.miInterruptor');
  // Cambia el estado del interruptor dependiendo de su estado
  interruptores.forEach(interruptor => {
    /* const p = interruptor.parentNode.querySelector(".slider").querySelector(".estadop"); */
    if (interruptor.value == 1) {
        interruptor.checked = true;
    } else {
        interruptor.checked = false;
      }

    /* interruptor.addEventListener("change", ()=>{ 
      if (p.textContent == "1") {
      p.textContent = "0";} 
      else {
      p.textContent = "1";}
    })  */
});

//CAMBIA EL ESTADO EN LA BASE DE DATOS
$(document).on('change', '.miInterruptor', function() {
  var changeId = $(this).data('change-id');

  $.ajax({
    url: cambiarEstadoUrl,
      type: 'POST',
      data: {
          _token: token,
          _id: changeId
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
