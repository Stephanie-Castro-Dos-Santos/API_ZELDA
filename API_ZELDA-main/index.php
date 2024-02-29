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
            <form method="post" action="" id="formRest">
                <br>

                <label for="service">Tipo de Búsqueda</label>

                <br>
                <br>

                <select id="service" name="categorias">
                    <option value="default" selected disabled>Selecciona una opción</option>
                    <option value="all">Obtener todos</option>
                    <option value="IdNombre">Buscar por ID o Nombre</option>
                    <option value="Category">Category</option>
                </select>

                <br>
                <br>

                <div id="formOpc"></div>

                <br>

                <input type="submit" id="botonEnviar" name="botonEnviar" value="Enviar" style="display:none">

                <br><br>
            </form>
        </div>
    </div>

    <div id="resultado">
        <!-- Donde se mostrará la información recibida -->
        <?php
        try 
        {
            if (isset($result) && is_array($result)) 
            {
                // Verificar si el valor de $_POST['categorias'] es "Category"
                if (isset($_POST['categorias']) && $_POST['categorias'] == "Category")
                {
                    // Si es así, muestra las tarjetas como antes
                    foreach ($result['data'] as $contenidoDato) 
                    {
                        ?>
                        <!-- Tarjeta del menú dinámica -->
                        <div class="card">
                            <img src="<?php echo isset($contenidoDato['image']) ? $contenidoDato['image'] : ''; ?>" alt="">
                            <div class="card-content">
                                <h3>Nombre: <?php echo isset($contenidoDato['name']) ? $contenidoDato['name'] : 'No disponible'; ?></h3>
                                <h3>Categoria: <?php echo isset($contenidoDato['category']) ? $contenidoDato['category'] : 'No disponible'; ?></h3>
                                <p>Lugares comunes:</p>
                                <ul>
                                    <?php
                                    if (isset($contenidoDato['common_locations']) && is_array($contenidoDato['common_locations'])) 
                                    {
                                        foreach ($contenidoDato['common_locations'] as $location) 
                                        {
                                            echo '<li>' . $location . '</li>';
                                        }
                                    } 

                                        else 
                                        {
                                            echo '<li>No disponibles</li>';
                                        }
                                    ?>
                                </ul>
                                <p>Descripción: <?php echo isset($contenidoDato['description']) ? $contenidoDato['description'] : 'No disponible'; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } 

                else if (isset($_POST['categorias']) && $_POST['categorias'] == "IdNombre")
                {
                    // Si se selecciona "Buscar por ID o Nombre", manejar individualmente
                    foreach ($result as $contenidoDato) 
                    {
                        ?>
                        <!-- Tarjeta del menú dinámica -->
                        <div class="card">
                            <img src="<?php echo isset($contenidoDato['image']) ? $contenidoDato['image'] : ''; ?>" alt="">
                            <div class="card-content">
                                <h3>Nombre: <?php echo isset($contenidoDato['name']) ? $contenidoDato['name'] : 'No disponible'; ?></h3>
                                <h3>Categoria: <?php echo isset($contenidoDato['category']) ? $contenidoDato['category'] : 'No disponible'; ?></h3>
                                <p>Lugares comunes:</p>
                                <ul>
                                    <?php
                                    if (isset($contenidoDato['common_locations']) && is_array($contenidoDato['common_locations'])) 
                                    {
                                        foreach ($contenidoDato['common_locations'] as $location) 
                                        {
                                            echo '<li>' . $location . '</li>';
                                        }
                                    } 

                                        else 
                                        {
                                            echo '<li>No disponibles</li>';
                                        }
                                    ?>
                                </ul>
                                <p>Descripción: <?php echo isset($contenidoDato['description']) ? $contenidoDato['description'] : 'No disponible'; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }

                else 
                {
                    // Si no hay datos de la categoría, mostrar todas las tarjetas detalladas
                    foreach ($result['data'] as $contenidoDato) 
                    {
                        ?>
                        <!-- Tarjeta del menú dinámica -->
                        <div class="card">
                            <img src="<?php echo isset($contenidoDato['image']) ? $contenidoDato['image'] : ''; ?>" alt="">
                            <div class="card-content">
                                <h3>Nombre: <?php echo isset($contenidoDato['name']) ? $contenidoDato['name'] : 'No disponible'; ?></h3>
                                <h3>Categoria: <?php echo isset($contenidoDato['category']) ? $contenidoDato['category'] : 'No disponible'; ?></h3>
                                <p>Lugares comunes:</p>
                                <ul>
                                    <?php
                                    if (isset($contenidoDato['common_locations']) && is_array($contenidoDato['common_locations'])) 
                                    {
                                        foreach ($contenidoDato['common_locations'] as $location) 
                                        {
                                            echo '<li>' . $location . '</li>';
                                        }
                                    } 

                                        else 
                                        {
                                            echo '<li>No disponibles</li>';
                                        }
                                    ?>
                                </ul>
                                <p>Descripción: <?php echo isset($contenidoDato['description']) ? $contenidoDato['description'] : 'No disponible'; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
            } 
            
                else 
                {
                    echo isset($result['message']) ? $result['message'] : 'No se encontraron resultados';
                }
        } 

            catch (PDOException $e) 
            {
                echo "Error al mostrar los datos " . $e->getMessage();
            }
        ?>
    </div>


    <script src="script.js"></script>

</body>
</html>