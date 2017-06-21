<?php
header('Content-type: text/html; charset=utf-8');
/*
	Codigo desarrollado por Chevi ( http://chevismo.com )
	Twitter: @Chevi_
	BOT para seguir a tus seguidores. Articulo en http://blog.chevismo.com/2011/07/bots-de-twitter-parte-2/
	Si utilizas este codigo en tu web, por favor deja un link hacia el articulo.
*/
include('lib/twitter.php');
include_once('lib/simple_html_dom.php');
$response = array();

// -------------------------------------- //
// 				CONFIGURACION			  //
	// Rellena bien las siguientes variables:
	define('TWITTER_ID',104549199);  // Entra en http://chevismo.com/twitterid
	$twitter = new Twitter('a0OvZXFGBNfEiUDNCnpUw', 'fbPDzTee9UDARl351fIPdmyywIqDmeRR6IZk5uxzFm8');	// Disponible en dev.twitter.com Creando una App
	$twitter->setOAuthToken('104549199-2jGh2bvb5Fe7B4AHGxKMXjbQ0xrtcotNEgElKxa6');		// En My Access Token
	$twitter->setOAuthTokenSecret('TWst2CryJ6qQAzAB1iT5ogbfY8zeRzMiHtrxm3A9zE'); // En My Access Token

$destino="toucheggs";
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez

// --------------------------------------- //
// --------------------------------------- //
  
$response = array();
//$response [] = "http://www.europapress.es/rss/rss.aspx?ch=00066";
$response [] = "http://www.europapress.es/rss/rss.aspx?ch=00069";
//$response [] = "http://cadenaser.com/seccion/rss/espana/";  

srand ((double) microtime() * 1000000);

$data = simplexml_load_file($response[rand(0,count($response)-1)]);	

foreach ($data->channel->item as $item) { 
$enlace[] = $item->link;
$noticia[] = $item->title;
$fecha[] = $item->pubDate;
}
$dia = 0;
$hoy = getdate();

$today = (int) $hoy['mday'];

srand ((double) microtime() * 1000000);
$random_number = rand(0,10-1);

$dia = (int) substr($fecha[$random_number],5,2);

if ($dia == $today) {
    
$twitter->statusesUpdate($noticia[$random_number].' '.$enlace[$random_number]);

	
}   
	

		

