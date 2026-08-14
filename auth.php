<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->usuario) && !empty($data->contraseña)) {
    
    $usuario_valido = "asher"; 
    $pass_valido = "0165";

    if ($data->usuario === $usuario_valido && $data->contraseña === $pass_valido) {
        http_response_code(200);
        echo json_encode(array("mensaje" => "Autenticación satisfactoria."));
    } else {
        http_response_code(401);
        echo json_encode(array("mensaje" => "Error en la autenticación."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensaje" => "Error: Faltan datos."));
}
?>