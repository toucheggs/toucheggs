<?php

require 'lib/config.php';
require 'lib/tmhOAuth.php';
require 'lib/tmhUtilities.php';

$tmhOAuth = new tmhOAuth(array(
   'consumer_key'    => 'a0OvZXFGBNfEiUDNCnpUw',
    'consumer_secret' => 'fbPDzTee9UDARl351fIPdmyywIqDmeRR6IZk5uxzFm8',
    'user_token'      => '104549199-2jGh2bvb5Fe7B4AHGxKMXjbQ0xrtcotNEgElKxa6',
    'user_secret'     => 'TWst2CryJ6qQAzAB1iT5ogbfY8zeRzMiHtrxm3A9zE',	
    'curl_ssl_verifypeer'   => false
  ));


//
require_once 'src/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('318468168575365', '47868317563c0649e6860be0802edda8');

$session = new FacebookSession('EAAEhpSYPaYUBAOBqa4IcMITWsYgyQtimXdQxxpduhtAQNxndDAoIFO4diH3fOBKCx5LKcb13sXGG4HpyakWcFZCelosH3g7fXvaO5tiJbAbXVZB1WnhMrPZBuiTi7Td3kZAAvgOnGZB8RG9xrkDPG');
$destino="toucheggs";
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez

// --------------------------------------- //
// --------------------------------------- //
   
	

$file = "http://elpais.com/autor/rss/el_roto/a";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
$data = simplexml_load_file($file); 

foreach ($data->channel->item as $item) { 

$foto[] = $item->enclosure{"url"};
$titulo[] = $item->description;
}
$enlace = str_replace("miniatura","noticia",$foto[0]);

$code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
array(
    'media'  => file_get_contents($enlace),
    'status'   => $titulo[0] // Don't give up..
  ),
    true, // use auth
    true  // multipart
  );
      



?>