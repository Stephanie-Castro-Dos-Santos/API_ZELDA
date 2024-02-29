<?php require_once("rest.php"); ?>

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
        <form method="post" action="" id="formRest" >
            <br>

            <label for="service">Tipo de servicio</label>

            <br>
            <br>

            <select id="service">
                <option value="default" selected disabled>Selecciona una opción</option>
                <option value="All">Obtener todos</option>
                <option value="IdNombre">Buscar por ID o Nombre</option>
                <option value="Category">Category</option>
            </select>

            <br>
            <br>

            <div id="formOpc">
            </div>

            <br><br>

            <input type = "submit" id = "botonEnviar" name = "botonEnviar" value = "Enviar" style="display:none">
        </form>
    </div>
</div>

<div id="resultado">
    <!-- Donde se mostrará la información recibida -->
    <?php
    try {
             if (isset($result) && count($result['data'])>0) {
            // Mostramos los elementos dinámicamente
            foreach ($result as $index=>$contenidoDato) {
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
        else{
            echo isset($result['message']) ? $result['message'] : 'Buscando ... ';
        }

    } catch (PDOException $e) {
        echo "Error al mostrar los datos " . $e->getMessage();
    }
    ?>
</div>

<script src="script.js"></script>

</body>

</html>