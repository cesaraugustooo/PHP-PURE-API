<?php

require_once 'json_requests/response.php';
require_once 'models/users.php';

class UserControler{

    public static function getAllUsers(){
        $user = User::getAll();
        sendResponse(200,$user);        
    }
    public static function post(){
        $user = json_decode(file_get_contents('php://input'),true);
        $result_sql = User::post($user);
    }
}