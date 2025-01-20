<?php

function sendResponse($statusCode, $data)
{
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode($data);
    exit;   
}
function json_success_response(){
    header('Content-type:application/json');
    http_response_code(200);
    echo json_encode($json_code = ["status" => "success"]);
    exit;
}
function json_error_response(){
    header('Content-Type: application/json');
    $response = ["status" => "dados invalidos"];
    $response = json_encode($response);
    echo $response;
}