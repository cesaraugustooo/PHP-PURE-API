<?php

require_once 'controlers/users.php';

switch($getHTTP){
    case 'GET':
        UserControler::getAllUsers();
        break;
    case 'POST':
        UserControler::post();
        break;
}