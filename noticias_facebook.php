<?php
require_once 'src/autoload.php';


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('318468168575365', '47868317563c0649e6860be0802edda8');

// If you already have a valid access token:
$session = new FacebookSession('EAAEhpSYPaYUBAK2e391tp8Oi9ZC8LFTkQVkN2WSmj58yZA7p1awNILxZBozW43g74ZBU2jd1Oq69zHkQqqjkKKUS5j9nlTTmLlJgJJhOShcufLG7GUe9BZAAzuACgZBArr6CsPET1F5fq4mYyuZC9zqx5zZB3LA5RPYZD');

// If you're making app-level requests:
//$session = FacebookSession::newAppSession();

// To validate the session:



$response [] = "http://www.20minutos.es/rss";
$response [] = "http://www.20minutos.es/rss/internacional";
$response [] = "http://cadenaser.com/seccion/rss/internacional/";
$response [] = "http://cadenaser.com/seccion/rss/nacional/";
$response [] = "http://cadenaser.com/seccion/rss/espana/";
$response [] = "http://eldiario.es/rss";
$response [] = "http://ep00.epimg.net/rss/internacional/portada.xml";
$response [] = "http://ep00.epimg.net/rss/politica/portada.xml";
$response [] = "http://www.elperiodico.com/es/rss/internacional/rss.xml";
$response [] = "http://www.elperiodico.com/es/rss/politica/rss.xml";
$response [] = "http://www.europapress.es/rss/rss.aspx?ch=00066";
$response [] = "http://www.europapress.es/rss/rss.aspx?ch=00069";
$response [] = "http://www.infolibre.es/index.php/mod.portadas/mem.rss";
$response [] = "http://kaosenlared.net/category/bloque3dest/feed/";
$response [] = "http://www.publico.es/rss/internacional";
$response [] = "http://www.publico.es/rss/politica";
$response [] = "http://www.publico.es/rss/espana";
$response [] = "http://feed43.com/8026837407403112.xml";




	
	srand ((double) microtime() * 1000000);
$data = simplexml_load_file($response[rand(0,count($response)-1)]);
    foreach ($data->channel->item as $item) {
	
	$enlace[] = ' '.$item->link;
    $titulo[] = ' '.$item->title;
    $fecha[] = $item->pubDate;
	}
 $dia = 0;
$hoy = getdate();
$today = (int)$hoy['mday'];

	srand ((double) microtime() * 1000000);
    $random_number1 = rand(0,20-1);
  $dia = (int)substr($fecha[$random_number1],5,2);
    
if ($dia == $today) {  
      $response = (new FacebookRequest(
      $session, 'POST', '/me/feed', array(
      	'link' => $enlace[$random_number1],
      	'message' => ''
      )
    ))->execute()->getGraphObject();

  } 

?>