<?php

function mostrarCiudades()
{

    $error = "";
    $resultado = "";
    $poblacion = "";

    $url = "http://localhost/DWES-UD7/ejercicio4/servidor/index.php?controller=ciudades&action=mostrarCiudadesServidor";
    $uri = "http://localhost/DWES-UD7/ejercicio4/servidor";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        $poblacion = $_POST['poblacion'];
        // Establecemos los parámetros de envío
        if (!empty($_POST['poblacion'])) {
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php

            $ciudades = $cliente->getCiudad($_POST['poblacion']);
            for ($i = 0; $i < count($ciudades); $i++) {
                echo $ciudades[$i]["nombre"] . "<br>";
            }
        } else {
            $error = "<strong>Error:</strong> Debes introducir un numero válido!<br/><br/>";
        }
    }
    include "./views/formulario_view.php";
}
?>