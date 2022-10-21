<?php
$Ingredientesbd = "Pollo freso, sal al gusto, tomates";
$Medidasbd = "1k de poll, una cuacharada de sal, pimienta";
$Pasosbd = "Pelamos y picamos finos la cebolla y ajo, el apio y la zanahoria.";

$location = "http://localhost/sop/InsertCategoria.php?wsdl";
$request = "


<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
<soapenv:Header/>
<soapenv:Body>
   <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
      <InsertCategoria xsi:type=\"ins:InsertCategoria\">
         <!--You may enter the following 3 items in any order-->
         <ingredientes xsi:type=\"xsd:string\">$Ingredientesbd</ingredientes>
         <medidas xsi:type=\"xsd:string\">$Medidasbd</medidas>
         <pasos xsi:type=\"xsd:string\">$Pasosbd</pasos>
      </InsertCategoria>
   </ins:InsertCategoriaService>
</soapenv:Body>
</soapenv:Envelope>";

print("Resquest : <br>");
print("<pre>" .htmlentities($request) . "</pre>");
$action ="InsertCategoriaService"; //accion
$headers = [
'Method POST',
'Conection: Keep-Alive',
'User-Agent: PHP-SOAP-CURL',
'Content-Type: text/xml;charset=utf-8',
'SOAPAction: "InsertCategoriaService"',
];


//segun documentacion del mismo 
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);


$response = curl_exec($ch);
$err_status =  curl_errno($ch);
print("Resquest : <br>");
print("<pre>" .$response. "</pre>");
?>