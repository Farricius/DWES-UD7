<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = "";
$ciudades = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/DWES-UD7/ejercicio3_servidor.php";
$uri = "http://localhost/DWES-UD7/"; // PC DE FARRI 
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    $poblacion = $_POST['poblacion'];
    // Establecemos los parámetros de envío
    if (!empty($_POST['poblacion'])) {

        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        //echo $resultado;
        //var_dump($resultado);

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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Calcular - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Obtener PAR - IMPAR</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="ejercicio3_cliente.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='poblacion' >";
        print "<input type='submit' name='enviar' value='Mostrar Ciudades X habs.'>";
        print "<p class='error'>$error</p>";
        //print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>

</html>