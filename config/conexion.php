<?php

class conectar{
    protected $bdh;
    protected function conexion(){

try{
$conectar = $this->bdh = new PDO('mysql:host=localhost;dbname=restaurante','root','123456');
return $conectar;
}catch(Exception $e){
print "ERROR:" . $e->getMessage()." <br/>";
die();
    }   


    }


public function set_name(){

return $this->bdh->query("SET NAMES 'utf8'");

}


}






?>