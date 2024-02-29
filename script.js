
// Evento al pulsar el botón 'bton' y se ejecuta la función saludar()
/*$("#service").change(function () {
    // Atributos
    // Recoger el VALOR del input de texto 'nombre'
    let eleccion = $("#service").val();
    console.log(eleccion);


    if (eleccion == 'IdNombre') {
        $('#formRest').append('<label for="idNombre">Buscar por ID o Nombre</label> <br> <br><input type="text" name="idNombre" id="idNombre" required></input>');
    }
    else {
        let opciones = ['Creatures', 'Equipment', 'Materials', 'Monsters', 'Treasure'];
        let strOp = "";

        for (let i = 0; i < opciones.length; i++) {
            strOp += "<option value='" + opciones[i] + "'>" + opciones[i] + "</option>";
        }

        $('#formRest').append('<label for="Categories">Buscar por Categoría</label> <br> <br><select name="categories" id="categories" required>' + strOp + '</select>');
    }


    $('#formRest').append('<input type="submit" id="botonEnviar" name="botonEnviar" value="Enviar"/><br><br>');

});*/

// Evento al pulsar el botón 'bton' y se ejecuta la función saludar()
// Evento al cambiar la selección en el campo 'service'
$("#service").change(function () {
    let select = $("#service");
    let opcionSeleccionada = select.val();

    // Vaciar el contenido del div formOpc
    $('#formOpc').empty();

    // Mostrar el botón de enviar por defecto
    $("#botonEnviar").show();

    // Verificar la opción seleccionada
    if (opcionSeleccionada !== "default") {
        let html = "";

        // Verificar si se seleccionó la opción "Buscar por Categoría"
        if (opcionSeleccionada == 'Category') {
            html =
                '<select id="categorias" name="categorias" required>' +
                '<option value="creatures">Creatures</option> ' +
                '<option value="equipment">Equipment</option>' +
                '<option value="materials">Materials</option>' +
                '<option value="monsters">Monsters</option>' +
                '<option value="treasure">Treasure</option>' +
                '</select>';
        } else {
            // Verificar si se seleccionó la opción "Buscar por ID o Nombre"
            if (opcionSeleccionada == 'IdNombre') {
                html = '<input type="text" name="idNombre" id="idNombre" required="required">';
            }
        }

        // Agregar el HTML generado al div formOpc
        $('#formOpc').append(html);
    }
});