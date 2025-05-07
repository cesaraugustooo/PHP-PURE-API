<?php

require_once 'models/chat.php';
$rota = str_replace('/PHP-PURE-API/chat', '', $getURL);

switch($getHTTP){
    case 'GET':
      Chat::gettMensagem();
      break;
    case 'POST':
        Chat::postMensagem();
        break;
    
}