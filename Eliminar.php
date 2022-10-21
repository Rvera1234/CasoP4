<?php


function eliminar_usuario($idreceta){
   
 
   $sql ="DELETE FROM table_restaurante WHERE idreceta=:idreceta"; 

 
   $action ="InsertCategoriaService"; //accion
   $headers = [
   'Method POST',
   'Conection: Keep-Alive',
   'User-Agent: PHP-SOAP-CURL',
   'Content-Type: text/xml;charset=utf-8',
   'SOAPAction: "InsertCategoriaService"',
   ];
   
   
   
   
}


$Ingredientesbd = "";
$Medidasbd = "";
$Pasosbd = "";

$location = "http://localhost/sop/InsertCategoria.php?wsdl";
$request = "true";













//segun documentacion del mismo 
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);


$response = curl_exec($ch);
$err_status =  curl_errno($ch);


?>