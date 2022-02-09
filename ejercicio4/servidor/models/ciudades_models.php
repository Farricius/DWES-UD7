<?php

function getConnection()
{

    $user = 'developer';
    $password = 'developer';
    return  new PDO('mysql:host=localhost;dbname=ciudades', $user, $password);
}


function getCiudad($numero)
{

    $db = getConnection();

    $result = $db->prepare('SELECT * FROM ciudades WHERE poblacion > :numero');
    $result->bindParam(":numero", $numero);
    $result->execute();
    $ciudades = array();
    while ($ciudad = $result->fetch(PDO::FETCH_ASSOC)) {
        $ciudades[] = $ciudad;
    }


    $db = null;
    return $ciudades;
}
?>