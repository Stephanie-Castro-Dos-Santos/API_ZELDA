9<?php require_once("rest.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>API</title>
</head>

<body>
<h1>Hyrule Compendium API</h1>


<div class="contenedorBusqueda">
    <div id="formGet">
        <form method="post" action="">
            <br>

            <label for="service">Tipo de servicio</label>

            <br>
            <br>

            <select id="service" onchange="cambiarFormulario()">
                <option value="default" selected="selected" hidden="hidden">Selecciona una opción</option>
                <option value="All">Obtener todos</option>
                <option value="IdNombre">Buscar por ID o Nombre</option>
                <option value="Category">Category</option>
            </select>

            <br>
            <br>
            <div id="formulario-All" style="display: none">
                <form id="FormAll">
                    <button type="submit" name="botonMostrar">Enviar</button>
                </form>
            </div>
            <div id="formulario-IdNombre" style="display: none">
                <form id="formID">
                    <input type="text" name="id" id="id" required="required">
                    <button type="submit" name="botonEnviar">Enviar</button>
                </form>
            </div>
            <div id="formulario-Category" style="display: none">
                <form id="formCategory">
                    <select id="categorias" name="categorias">
                        <option>Creatures</option>
                        <option>Equipment</option>
                        <option>Materials</option>
                        <option>Monsters</option>
                        <option>Treasure</option>
                    </select>
                    <button type="submit" name="EnviarCategory">Enviar</button>
                </form>
            </div>
            <!--<input type = "submit" id = "botonEnviar" name = "botonEnviar" value = "Enviar">-->
        </form>
    </div>
</div>

<div id="resultado">
    <!-- Donde se mostrará la información recibida -->
    <?php
    try {
        if (isset($result)) {
            // Mostramos los elementos dinámicamente
            foreach ($result as $contenidoDato) {
                ?>
                <!-- Tarjeta del menú dinámica -->
                <div class="card">
                    <img src="<?php echo $contenidoDato['image']; ?>" alt="">

                    <div class="card-content">
                        <h3>Nombre: <?php echo $contenidoDato['name']; ?></h3>
                        <h3>Categoria: <?php echo $contenidoDato['category']; ?></h3>
                        <p>Lugares comunes:</p>
                        <ul>
                            <?php foreach ($contenidoDato['common_locations'] as $location): ?>
                                <li><?php echo $location; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p>Descripción: <?php echo $contenidoDato['description']; ?></p>
                    </div>
                </div>
                <?php
            }
        }

    } catch (PDOException $e) {
        echo "Error al mostrar los datos " . $e->getMessage();
    }
    ?>
</div>

<script src="script.js"></script>

</body>

</html>