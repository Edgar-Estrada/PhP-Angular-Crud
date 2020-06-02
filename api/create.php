<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $jsonUser = json_decode(file_get_contents("php://input"));

    $host = "localhost"; //Nombre del host
    $user = "root"; //Nombre del usuario de la bd
    $pass = ""; //Contraseña del usuario de la bd
    $db = "crud"; //Nombre de la tabla

    $con = mysqli_connect($host, $user, $pass,$db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO usuario (name,email,password) VALUES ('".$jsonUser->name."','".$jsonUser->email."','".$jsonUser->password."')";
    $result = $con->query($sql);

    class Result{}

    //Datos de la respuesta
    $response = new Result();
    $response->response = 'OK';
    $response->mensaje = 'Inserción exitosa';

    echo json_encode($response);//Muestra como json el resultado
?>