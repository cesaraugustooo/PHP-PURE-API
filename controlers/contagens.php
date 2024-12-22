<?php

require_once 'helpers/response.php';
require_once 'models/contagens.php';

class contagensController 
{
    public static function getAllContagens(){
        $contagem = Contagem::getAll();
        sendResponse(200,$contagem);
    }
}
