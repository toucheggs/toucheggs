<?php

header('Content-type: text/html; charset=utf-8');

require 'config.php';
require 'tmhOAuth.php';
require 'tmhUtilities.php';


$tmhOAuth = new tmhOAuth(array(
    'consumer_key'    => 'UCGbcixnadCwsBnlc2GSnQ',
    'consumer_secret' => '2v86YmFl3L43Bm4d1JxKJgSDjexs0iS3mibAlbPvmo',
    'user_token'      => '104549199-92MEDqFnLLsrcEeWrlm4l60uhlpYu0kWpXHt6Pkc',
    'user_secret'     => 'mH8NV5TOR4GXLgyQCkdpPrCDDURbp63TbSqZpFYIEU',	
    'curl_ssl_verifypeer'   => false
  ));
  
  require_once 'src/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('318468168575365', '47868317563c0649e6860be0802edda8');

$session = new FacebookSession('EAAEhpSYPaYUBAFp41u90Nyp4LC9UjlYBaaCySpqg9TXOwjD4bxGqZA0v7twgi5ZAe3WZCtZAGhRObPJaLkFRSZBIMCxSxkK0cGHZBTRLYJ0ZC5IBv3XNZAmwvANA7HnJhLZBbZA69o1D7q15ZCz41pQlTP3c0QPzUzD50gZD');

$file = "listado.xml";	
$data = simplexml_load_file($file);

$archivos = count(glob('{*.jpg,*.gif,*.png,*.jpeg}',GLOB_BRACE));
srand ((double) microtime() * 1000000);
$random_number = rand(0,($archivos)-2);
$item = $data->item[$random_number]->file;

$code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
array(
    'media[]'  => file_get_contents($item),
    'status'   => $data->item[$random_number]->title // Don't give up..
  ),
    true, // use auth
    true  // multipart
  );
 
  // $photo_details = array(
			// 'message'=>' '.$data->item[$random_number]->title,
			// 'source'=>new CURLFile ($item)
        // );
		
// $response = (new FacebookRequest(
      // $session, 'POST', '/me/photos', $photo_details
    // ))->execute()->getGraphObject();

?>