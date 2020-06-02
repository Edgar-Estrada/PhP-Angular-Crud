<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $host = 'localhost'; //Nombre del host
    $user = 'root'; //Nombre del usuario de la bd
    $pass = ''; //Contraseña del usuario de la bd
    $db = 'crud'; //Nombre de la tabla

    $connection = mysqli_connect($host, $user, $pass, $db); //Creacion de la conexión
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
  
?>