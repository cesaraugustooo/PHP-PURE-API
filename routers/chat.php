<?php

require_once 'models/chat.php';

switch($getHTTP){
    case 'GET':
      Chat::gettMensagem();
      break;
    case 'POST':
      
        break;
    
}