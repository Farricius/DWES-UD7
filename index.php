<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.133/DWES-UD7/actividad2/calcularLetra.php";
$uri = "http://192.168.129.133/DWES-UD7/actividad2"; //PC DE MARINA
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    $numero = $_POST['numero'];
    // Establecemos los parámetros de envío
    if (!empty($_POST['numero'])) {
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = "Este número sería " . $cliente->parImpar($numero);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un NUMEROOO correcto<br/><br/>Ej: 45678987";
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
    <form action="index.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='numero' value='$numero'>";
        print "<input type='submit' name='enviar' value='Calcular Letra'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>
</html>