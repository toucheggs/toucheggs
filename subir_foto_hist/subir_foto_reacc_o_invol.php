<?php

require './config.php';
require './tmhOAuth.php';
require './tmhUtilities.php';


$tmhOAuth = new tmhOAuth(array(
   'consumer_key'    => 'a0OvZXFGBNfEiUDNCnpUw',
    'consumer_secret' => 'fbPDzTee9UDARl351fIPdmyywIqDmeRR6IZk5uxzFm8',
    'user_token'      => '104549199-2jGh2bvb5Fe7B4AHGxKMXjbQ0xrtcotNEgElKxa6',
    'user_secret'     => 'TWst2CryJ6qQAzAB1iT5ogbfY8zeRzMiHtrxm3A9zE',	
    'curl_ssl_verifypeer'   => false
  ));


session_start(); //Session should be active



//include autoload.php from SDK folder, just point to the file like this:
require_once'..\src\autoload.php';

//import required class to the current scope

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
try {
  $session->validate();
} catch (FacebookRequestException $ex) {
  // Session not valid, Graph API returned an exception with the reason.
  echo $ex->getMessage();
} catch (\Exception $ex) {
  // Graph API returned info, but it may mismatch the current app or have expired.
  echo $ex->getMessage();
}



	
	 
	$file = "listado.xml";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
	
$data = simplexml_load_file($file);

$archivos = count(glob("fotos_a_subir_hist/{*.jpg,*.gif,*.png}",GLOB_BRACE));

srand ((double) microtime() * 1000000);
    $random_number = rand(0,($archivos)-2);
$item = $data->item[$random_number]->file;  


$carpeta = 'fotos_subir_hist/'.$item;



// $code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
// array(
    // 'media[]'  => file_get_contents($carpeta),
    // 'status'   => $data->item[$random_number]->title // Don't give up..
  // ),
    // true, // use auth
    // true  // multipart
  // );
  
$foto = 'https://toucheggs.herokuapp.com/subir_foto_hist/fotos_subir_hist/'.$item;  

	$photo_details = array(
            
			'message'=>' '.$data->item[$random_number]->title,
			'source'=>new CURLFile ($foto)
        );
	
	
       
        
if($session) {

  try {

    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/589507404409235/photos', $photo_details
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