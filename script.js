
// Evento al pulsar el botón 'bton' y se ejecuta la función saludar()

function cambiarFormulario()
{
    var select = document.getElementById("service");
    var opcionSeleccionada = select.options[select.selectedIndex].value;

    document.getElementById("formulario-All").style.display = "none";
    document.getElementById("formulario-IdNombre").style.display = "none";
    document.getElementById("formulario-Category").style.display = "none";
    if (opcionSeleccionada !== "default") {
        document.getElementById("formulario-" + opcionSeleccionada).style.display = "block";
    }
}