<?php
class Usuario extends Conectar{
public function insert_receta($ingredientes,$medidas,$pasos){
    $conectar = parent::conexion();
    parent::set_name();
    $sql ="INSERT INTO table_restaurante (idreceta, ingredientes, medidas, pasos, est) VALUES (NULL,?,?,?,'1');"; 
    $stmt = $conectar->prepare($sql);
    $stmt->bindValue(1,$ingredientes);
    $stmt->bindValue(2,$medidas);
    $stmt->bindValue(3,$pasos);   
    $stmt->execute();
    
}


public function eliminar_usuario($idreceta){
    $conectar = parent::conexion();
    parent::set_name();
    $sql ="DELETE FROM table_restaurante WHERE idreceta=:idreceta"; 
    $stmt = $conectar->prepare($sql);
    $stmt->bindValue(1,$idreceta);
     
    $stmt->execute();
    
}




}

?>