<?php

require 'config.php';
require 'tmhOAuth.php';
require 'tmhUtilities.php';
require 'xml.php';

session_start(); //Session should be active



//include autoload.php from SDK folder, just point to the file like this:
require_once 'src/autoload.php';

//import required class to the current scope

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('563386293744433', 'b7d60ed8af0cf894f82f56c4c5fa3ec9');

// If you already have a valid access token:
$session = new FacebookSession('EAAIAZAZAfo8zEBABx5TSQgCG00YPCQ1ZCwasi1ttrEkEq1JWPa2iZBJWfJijKjGKxwGXiOyg9su5vKlQZBZAZABG3846S9kbcCH29YwDZAJuv0siyXKJC3MiQm11qbRwxPsxuRUEjhApPk1C5MRezvz3C5e7NJMW2OxRJvwsDVPiGAZDZD');


$file = "listado.xml";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
	
$data = simplexml_load_file($file);
$archivos = count(glob('{*.jpg,*.gif,*.png,*.jpeg}',GLOB_BRACE));
srand ((double) microtime() * 1000000);
    $random_number = rand(0,($archivos)-2);
$item = $data->file[$random_number];  




 

  

	$photo_details = array(
			'message'=>' ',
			'source'=>new CURLFile ($item)
        );
		
	
	


    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/589507404409235/photos', $photo_details
    ))->execute()->getGraphObject();

    // If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

 
?>