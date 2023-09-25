// Obtén una referencia al elemento de entrada checkbox
const miInterruptor = document.getElementById('miInterruptor');

// Agrega un evento change al checkbox para detectar cuando cambia de estado
miInterruptor.addEventListener('change', function() {
    // Verifica si el checkbox está marcado (activado)
    if (this.checked) {
        // Cuando está activado, haz algo aquí
        console.log('El interruptor está activado.');
        // Puedes colocar tu lógica aquí, por ejemplo, mostrar un mensaje o realizar una acción.
    } else {
        // Cuando está desactivado, haz algo aquí
        console.log('El interruptor está desactivado.');
        // Puedes colocar tu lógica aquí, por ejemplo, ocultar un elemento o realizar otra acción.
    }
});
