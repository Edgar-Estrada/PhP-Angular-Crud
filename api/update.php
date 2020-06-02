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
    $sql = "UPDATE usuario SET _id='".$jsonUser->_id."', name='".$jsonUser->name."', email='".$jsonUser->email."', password='".$jsonUser->password."' WHERE _id='$jsonUser->_id'";
    // mysqli_quarry($con, "UPDATE usuarios SET nombre = '$params->nombre',
    //                                          password = '$params->pass',
    //                                          email = '$params->email'
    //                                          WHERE _id='$params->_id'"); //Creacion del quarry para actualizar
    $result = $con->query($sql);
    class Result{}
    
    //Datos de la respuesta
    $response = new Result();
    $response->response = 'OK';
    $response->mensaje = 'Actualización exitosa';

    echo json_encode($response);//Muestra como json el resultado
?>