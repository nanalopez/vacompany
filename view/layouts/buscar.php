<?php
include '../../db/conexion.php';

class Busqueda extends Conection{

    //Conexion
    protected static $conection;

    private static function getConect(){
        self::$conection = Conection::conectar();
    }

    private static function getDesconect(){
        self::$conection = null;
    }

    if(isset($_POST['enviar'])){

    $busqueda = $_POST['busqueda'];

    $consulta = "SELECT id,referencia,descripcion FROM producto WHERE referencia LIKE '%$busqueda'";
    self::getConect();
    $result=self::$conection->prepare($consulta);

    while($row = $consulta->fecth()){
        echo $row['producto'].'<br>';
    }

}
}