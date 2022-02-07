<?php 

// Ahora te toca configurar tanto cliente como servicio, en este caso vas a crear una función que devuelva un listado de ciudades de la base de datos en función a la población, es decir, si el usuario inserta el valor 1000 deberemos devolver las ciudades con una población mayor o igual a ésta.

$servidor = "localhost";
$baseDatos = "ciudades";
$usuario = "developer";
$pass = "developer";

$uri="http://localhost/DWES-UD7/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("mostrarCiudades");
$server->handle();

function mostrarCiudades ($numero) {
    {
        try {
            $conexion = new PDO("mysql:host=" . $GLOBALS["servidor"] . ";dbname=" . $GLOBALS["baseDatos"], $GLOBALS["usuario"], $GLOBALS["pass"]);
            echo "echo de la db zxdxddxdxd";
            $sql = "SELECT nombre FROM listado WHERE poblacion > ?";
            $sql = $conexion->prepare($sql);
            $sql->bindParam(1, $numero);
            $sql->execute();

            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $filas[] = $fila;
            }
            return $filas;
        } catch (PDOException $e) {
            echo "Conexión fallida dep: " . $e->getMessage();
            return false;
        }
        $conexion = null;
    }
}


?>