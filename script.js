
// Evento al pulsar el botón 'bton' y se ejecuta la función saludar()
$("#service").change(function () {
    // Atributos
    // Recoger el VALOR del input de texto 'nombre'
    let eleccion = $("#service").val();
    console.log(eleccion);


    if (eleccion == 'IdNombre') {
        $('#formGet').append('<label for="idNombre">Buscar por ID o Nombre</label> <br> <br><input type="text" name="idNombre" id="idNombre" required></input>');
    }
    else {
        let opciones = ['Creatures', 'Equipment', 'Materials', 'Monsters', 'Treasure'];
        let strOp = "";

        for (let i = 0; i < opciones.length; i++) {
            strOp += "<option value='" + opciones[i - 1] + "'>" + opciones[i - 1] + "</option>";
        }

        $('#formGet').append('<label for="Categories">Buscar por Categoría</label> <br> <br><select name="categories" id="categories" required>' + strOp + '</select>');
    }


    $('#formGet').append('<input type="submit" id="botonEnviar" name="botonEnviar" value="Enviar"/><br><br>');

});