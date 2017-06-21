<?php

require 'config.php';
require 'tmhOAuth.php';
require 'tmhUtilities.php';


$tmhOAuth = new tmhOAuth(array(
    'consumer_key'    => 'a0OvZXFGBNfEiUDNCnpUw',
    'consumer_secret' => 'fbPDzTee9UDARl351fIPdmyywIqDmeRR6IZk5uxzFm8',
    'user_token'      => '104549199-2jGh2bvb5Fe7B4AHGxKMXjbQ0xrtcotNEgElKxa6',
    'user_secret'     => 'TWst2CryJ6qQAzAB1iT5ogbfY8zeRzMiHtrxm3A9zE',	
    'curl_ssl_verifypeer'   => false
  ));


session_start(); //Session should be active



//include autoload.php from SDK folder, just point to the file like this:
require_once '..\src\autoload.php';

//import required class to the current scope

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('563386293744433', 'b7d60ed8af0cf894f82f56c4c5fa3ec9');

// If you already have a valid access token:
$session = new FacebookSession('CAAIAZAZAfo8zEBADaPpjR9Cw9NQzpZAm6ZAKiJ1mI6WWoiCCZA3wuw8swZCklKbP3cTEXi37jvx7s77L4vw0MNKCetchq3CriVwg0hE63dRT7J7xLs9agJHo4T6w3vmAm69yiTboQJxu9XNb05kZAXnpKSLxxyCEt0AwteAKxymXGGCZC7o8HcBRZADv30vdWohq3HPyU9wgVV9EioQojFiiD');

// If you're making app-level requests:
//$session = FacebookSession::newAppSession();

// To validate the session:
try {
  $session->validate(); 
} catch (FacebookRequestException $ex) {
  // Session not valid, Graph API returned an exception with the reason.
  echo $ex->getMessage();
} catch (\Exception $ex) {
  // Graph API returned info, but it may mismatch the current app or have expired.
  echo $ex->getMessage();
  
  }
  $ArchivoRemoto = "http://wotlabs.net/sig_dark/na/bettamaster00/signature.png";
 
// definimos el nombre de la copia local
$ArchivoLocal = "firma.png";
 
// Leemos el archivo remoto
$datos = file_get_contents($ArchivoRemoto)
    or die("No se piede leer el archivo remoto");
 
// Escribimos los datos en el archivo local
file_put_contents($ArchivoLocal, $datos)
    or die("No se puede escribir el archivo local");
  $foto = 'C:/robots/CD_Root/AutoPlay/Docs/servidor/htdocs/toucheggs/subir_foto/firma.png';  
  

	$photo_details = array(
			'message'=>' ',
			'source'=>new CURLFile ($foto)
        );
		
	
	
	if($session) {

  try {

    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', $photo_details
    ))->execute()->getGraphObject();

    // If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}
?>