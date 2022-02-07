<?php
function mostrarCiudades($numero)
{ {
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