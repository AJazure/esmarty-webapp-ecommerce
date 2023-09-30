const switchElements = document.querySelectorAll('.miInterruptor');

switchElements.forEach(function(switchElement) {
    // Verifica si hay un estado previo en localStorage y configura el interruptor en consecuencia
    const savedSwitchState = localStorage.getItem(switchElement.id);

    if (savedSwitchState !== null) {
        switchElement.checked = JSON.parse(savedSwitchState);
    } else {
        // Si no hay un estado en localStorage, usa el valor de la base de datos
        switchElement.checked = switchElement.value === '1';
    }
});
