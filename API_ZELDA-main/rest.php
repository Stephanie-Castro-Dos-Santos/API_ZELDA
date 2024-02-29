<?php
    if (isset($_POST['botonEnviar']))
    {
        $opcGet = "";
        
        if (isset($_POST['idNombre']))
        {
            $idNombre = str_replace(" ", "_", $_POST['idNombre']);
            $opcGet = 'entry/'.$idNombre;
        }

            else if (isset($_POST['categorias']))
            {
                $opcGet = 'category/' . $_POST['categorias']; 
            }

                else 
                {
                    $opcGet = "all";
                }

        /* 2. Recogemos la URL de la cuál se llama a la API con el elemento a buscar */
        if ($opcGet !== "category/all")
        {
            $url = "https://botw-compendium.herokuapp.com/api/v3/compendium/" . $opcGet;
        }

            else 
            {
                $url = "https://botw-compendium.herokuapp.com/api/v3/compendium/all";
            }
            
        /* 3. Iniciamos el CURL */
        $client = curl_init($url);
        
        /* 4. Preparamos el curl con la URL que se le han pasado al cliente */
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        
        /* 5. Ejecutamos */
        $response = curl_exec($client);
        
        /* 6. Obtenemos el JSON con el resultado */
        $result = json_decode($response, true);

        /* Opcional por si queremos limitar datos */
        if(isset($result['data']) && count($result['data']) > 20) 
        {
            $result['data'] = array_slice($result['data'], 0, 20);
        }
    }


?>