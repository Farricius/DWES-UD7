<!DOCTYPE html>
<html>

<head>
    <title>Calcular - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Obtener CIUDADES x Hab.</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php?controller=ciudades&action=mostrarCiudades" method="POST">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='poblacion' >";
        print "<input type='submit' name='enviar' value='Mostrar Ciudades X habs.'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
</body>

</html>