<?php

include '../db/conexion.php';

class getModel{
     //Getters and Setters
     private $id;
     private $referencia;
     private $descripcion;
 
     public function getId(){
         return $this->id;
     }
 
     public function setId($id){
         $this->id = $id;
     }
 
     public function getReferencia(){
         return $this->referencia;
     }
 
     public function setReferencia($referencia){
         $this->referencia = $referencia;
     }
 
     public function getDescripcion(){
         return $this->descripcion;
     }
 
     public function setDescripcion($descripcion){
         $this->descripcion = $descripcion;
     }
}


class descuentoModel extends Conection{

    //Conexion
    protected static $conection;

    private static function getConect(){
        self::$conection = Conection::conectar();
    }

    private static function getDesconect(){
        self::$conection = null;
    }

    //Querys

    public static function producto(){

        $query = "SELECT DISTINCT p.id,p.referencia,p.sku,p.descripcion,p.talla,p.color,pr.valor FROM producto p INNER JOIN leaderlist ON p.id = leaderlist.producto_id INNER JOIN precio pr ON leaderlist.producto_id = pr.leaderlist_id WHERE p.id > 10 AND p.id < 21";

        self::getConect();
        $result=self::$conection->prepare($query);

        $result->execute();

   
        $row = $result->fetchAll();

        return $row;
    }
    
}

?>