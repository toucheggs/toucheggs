<?php  

$gd = opendir('/users/JJ/http/Fotos_a_Subir');        

$extension = explode(".",$archivo_name);  

$num = count($extension)-1;  

$strings = 'abcdefghijklmNopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 

$long = 6; // la longitud del string 

$nuevo_string = ''; 

while(($archivo_name = readdir($gd)) !== false){

// hacemos un loop para generar un string 

for ($i=0; $i <= $long; $i++){ 
$rand = rand(0, strlen($strings)); 
$nuevo_string .= $strings[$rand]; 
} 

$nuevo_name = $archivo_name . $nuevo_string; 

rename ('/users/http/Fotos_a_Subir/'.$archivo_name,'/users/http/Fotos_a_Subir/'.$nuevo_name);

}
?>