<?php

    if (isset($_POST['botonEnviar'])) 
    {

        /* 1. Obtenemos el valor del ID o Nombre del elemento a buscar */
        $idNombre = $_POST['idNombre'];

        /* 1.1. Si el elemento posee un espacio, intercambiarlo por una barra baja */
        $idNombre = str_replace(" ", "_", $idNombre);

        /* 2. Recogemos la URL de la cuál se llama a la API con el elemento a buscar */
        $url = "https://botw-compendium.herokuapp.com/api/v3/compendium/entry/" . $idNombre;
        
        /* 3. Iniciamos el CURL */
        $client = curl_init($url);

        /* 4. Preparamos el curl con la URL que se le han pasado al cliente */
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        /* 5. Ejecutamos */
        $response = curl_exec($client);
        
        /* 6. Obtenemos el JSON con el resultado */
        $result = json_decode($response, true);
    }

?>