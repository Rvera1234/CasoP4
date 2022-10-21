<?php
//ruta clase econea
require_once "/xampp/htdocs/sop/vendor/econea/nusoap/src/nusoap.php";

$namespace ="InsertCategoriaSOAP";
$server = new soap_server();
$server->configureWSDL("InsertCategoria",$namespace);
$server->wsdl->schemaTargetNamespace = $namespace;


$namespace ="EliminarCategoriaSOAP";
$server = new soap_server();
$server->configureWSDL("EliminarCategoria",$namespace);
$server->wsdl->schemaTargetNamespace = $namespace;




//estructura
$server->wsdl->addComplexType(
    'InsertCategoria',
    'complexType',
    'struct',
    'all',
    '',
    array(  
        'ingredientes' => array('name'=>'ingredientes','type'=>'xsd:string'),
        'medidas' => array('name'=>'medidas','type'=>'xsd:string'),
        'pasos' => array('name'=>'pasos','type'=>'xsd:string'),

    )
    );

//estructura de la respuesta del servicio
$server->wsdl->addComplexType(
    'response',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'res' => array('name'=>'res','type'=>'xsd:boolean'),
        
    )
    );



function InsertCategoriaService($request)
{
    require_once "C:/xampp/htdocs/Sop/config/conexion.php";
    require_once "C:/xampp/htdocs/Sop/models/Usuario.php";
    $usuario = new Usuario();
    $usuario->insert_receta($request["ingredientes"],$request["medidas"],$request["pasos"]);


return array(
    "res" => true
);

}


    $server->register(
        "InsertCategoriaService",
        array("InsertCategoria" => "tns:InsertCategoria"),
        array("InsertCategoria" => "tns:response" ),
        $namespace,
        false,
        "rpc",
        "encoded",
        "Inserta una categoria"
        );
        



function EliminarCategoriaService($request)
{
    require_once "/config/conexion.php";
    require_once "/models/Usuario.php";
    $usuario = new Usuario();
    $usuario->eliminar_usuario($request["idreceta"]);


return array(
    "res" => true
);
}






$POST_DATA = file_get_contents("php://input");
$server->service($POST_DATA);
exit;







?>