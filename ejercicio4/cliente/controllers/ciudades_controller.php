<?php

// El Controller procesa formulario

function mostrarCiudades()
{
    $error = "";
    $resultado = "";
    $ciudades = "";

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    // $url = "http://localhost/DWES-UD7/ejercicio4Servidor/index.php?controller=ciudades&action=ciudadesServidor";

    $url = "http://localhost/DWES-UD7/ejercicio4/servidor/index.php?controller=ciudades&action=mostrarCiudades"; // Hacia servidor:
    $uri = "http://localhost/DWES-UD7/"; // PC DE FARRI 
    
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        $poblacion = $_POST['poblacion'];
        // Establecemos los parámetros de envío
        if (!empty($_POST['poblacion'])) {

            $resultado = $cliente->mostrarCiudades($_POST['poblacion']);

            echo "<strong>Ciudades que superan los $poblacion habitantes: </strong> <br>";

            for ($i = 0; $i < sizeof($resultado); $i++) {
                echo $i . ". " . $resultado[$i]["nombre"] . "<br>";
            }

            //for each mas simple doesntwork

            // foreach ($resultado as $value) {
            //     echo $value;
            // }

        } else {
            $error = "<strong>Error:</strong> Debes introducir un NUMEROOO VALIDOOOO<br/><br/>Ej: 3000";
        }
    }

    include 'views/formulario_view.php';
}
?>