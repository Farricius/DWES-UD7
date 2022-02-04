<?php 
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.126/DWES-UD7/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("sumar");
$server->handle();

// Función para obtener raíz cuadrada, retirada
function letra($dni) {
    $resultado=substr("TRWAGMYFPDXBNJZSQVHLCKE",$dni%23,1);
    return $resultado;
}

function sumar ($numero1, $numero2) {
    $suma = $numero1 + $numero2;
    return $suma;
}
?>