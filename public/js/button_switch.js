// Obtén una lista de todas las referencias a los interruptores
/* const interruptores = document.querySelectorAll('.miInterruptor'); */
  // Cambia el estado del interruptor dependiendo de su estado
/*   interruptores.forEach(interruptor => { */
    /* const p = interruptor.parentNode.querySelector(".slider").querySelector(".estadop"); */
    /* if (interruptor.value == 1) {
        interruptor.checked = true;
    } else {
        interruptor.checked = false;
      } */

    /* interruptor.addEventListener("change", ()=>{ 
      if (p.textContent == "1") {
      p.textContent = "0";} 
      else {
      p.textContent = "1";}
    })  */
/* }); */

$(document).on('click', '.miInterruptor', function(event) {
  // Evitar que el checkbox se marque o desmarque
  event.preventDefault();
  // Puedes agregar aquí tu lógica personalizada si es necesario

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger mx-2',
      cancelButton: 'btn btn-secondary mx-2'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: '¿Cambiar Estado?',
    /* text: "¿Seguro? ¡Esta accion no se puede revertir!", */
    type: 'question',
    showCancelButton: true,
    confirmButtonText: 'Cambiar estado!',
    cancelButtonText: 'Cerrar',
    reverseButtons: false
  }).then((result) => {
    var changeId = $(this).data('change-id');
    let urlDeCancelarPedido = cambiarEstadoUrl;
        console.log(urlDeCancelarPedido);
        fetch(urlDeCancelarPedido, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },

        })
            .then(response => {
                swalWithBootstrapButtons.fire(
                    'Cambiado',
                    'El estado fue cambiado con exito!',
                    'success'
                  )
                   /*  location.reload() */
            })

            .catch(error => {
                console.error('Error:', error);
            });
        
    } 
 )

});

//CAMBIA EL ESTADO EN LA BASE DE DATOS
/* $(document).on('change', '.miInterruptor', function(e) {


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
}); */
