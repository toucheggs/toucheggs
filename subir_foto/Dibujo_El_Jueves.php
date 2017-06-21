<?php

require './config.php';
require './tmhOAuth.php';
require './tmhUtilities.php';
require_once('../src/facebook.php');

$tmhOAuth = new tmhOAuth(array(
   'consumer_key'    => 'a0OvZXFGBNfEiUDNCnpUw',
    'consumer_secret' => 'fbPDzTee9UDARl351fIPdmyywIqDmeRR6IZk5uxzFm8',
    'user_token'      => '104549199-2jGh2bvb5Fe7B4AHGxKMXjbQ0xrtcotNEgElKxa6',
    'user_secret'     => 'TWst2CryJ6qQAzAB1iT5ogbfY8zeRzMiHtrxm3A9zE',	
    'curl_ssl_verifypeer'   => false
  ));


$api_key = '563386293744433';


                   'appId'  => $api_key,
                   'secret' => $api_sec,
                   'cookie' => true
                 ));
				 
$facebook->setFileUploadSupport(true);

$access_token = 'CAAIAZAZAfo8zEBADGJn2TomKouDEqTNeDJqthXHva5pvYz2huNjyov0asYCz49KZAZAs1ohSQYQzxc1yjhHGy6UT336jPZCNN6oYqEtn77ciEpjYhxYnW96XyyZB5aRcZAczTjEnOAV97P5Afxh7PXPyd92LDXK3Bjnu9wZAPGC7ICkoh0SFFHvE6uFgVW4QGJsZD';

$destino="toucheggs";
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez

// --------------------------------------- //
// --------------------------------------- //
   
	

$file = "http://pipes.yahoo.com/pipes/pipe.run?_id=32a9389719309e4f52dc57263aa1a320&_render=rss";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
$data = simplexml_load_file($file); 

$item = $data->channel->item;
$foto = $item->link;
var_dump($foto);
$code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
array(
    'media[]'  => file_get_contents($foto),
    'status'   => $item->title // Don't give up..
  ),
    true, // use auth
    true  // multipart
  );
        

$photo_details = array(
            'access_token'=>$access_token,
			'message'=>' '.$item->title,
			'url'=>' '.$foto
		);

$env = $facebook->api('/toucheggs/photos', 'post', $photo_details);	

print_r($tmhOAuth->response);
?>