<?php

function mostrarCiudadesServidor()
{

    require "./models/ciudades_model.php";


    // Instanciamos un nuevo servidor SOAP
    $uri = "http://localhost/DWES-UD7/ejercicio4/servidor";
    $server = new SoapServer(null, array('uri' => $uri));
    $server->addFunction("getCiudad"); 
    $server->handle();
}
