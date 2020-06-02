<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $host = "localhost"; //Nombre del host
    $user = "root"; //Nombre del usuario de la bd
    $pass = ""; //Contraseña del usuario de la bd
    $db = "crud"; //Nombre de la tabla

    $con = mysqli_connect($host, $user, $pass,$db);

    $sql = "SELECT * FROM usuario WHERE _id = $_GET[_id]";
    $result = $con->query($sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($results = mysqli_fetch_assoc($result)) {
            $datos[] = $results;
        }
        echo json_encode($datos);
    } else {
        echo "0 results";
    }
?>