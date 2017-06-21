<?php
	
	$file = "C:\Users\JJ\http\Twitter\subir_foto\listado.xml";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
	
$data = simplexml_load_file($file); 
srand ((double) microtime() * 1000000);
$archivos = exec('ficheros.bat');
    $random_number = rand(0,($archivos)-2);
$item = $data->file[$random_number];  

	echo 'Enviado '.$item.' '.$archivos;





?>