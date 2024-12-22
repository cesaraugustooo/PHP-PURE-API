<?php

require_once 'models/turmas.php';
require_once 'helpers/response.php';

class turmasController
{
    public static function getAllturmas(){
        $turmas = Turmas::getAll();
        sendResponse(200,$turmas);
    }
}