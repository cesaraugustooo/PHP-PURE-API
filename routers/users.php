<?php

require_once 'controlers/users.php';

switch($getHTTP){
    case 'GET':
        if (preg_match('#(\d+)#', $rota, $array )){
            $id = $array[0];
            UserControler::get($id);
        }else{  
            UserControler::getAllUsers();
        }   
        break;
    case 'POST':
        UserControler::post();
        break;
    case 'DELETE':
        if(preg_match('#(\d+)#', $rota , $array)){
            $id = $array[0];
            UserControler::delete($id);
        }

}