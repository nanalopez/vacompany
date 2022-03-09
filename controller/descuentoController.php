<?php

include '../model/descuentoModel.php';

class descuentoController{

    /*public static function producto($id,$referencia,$descripcion){
        $objProducto = new getModel();

        $objProducto->setId($id);
        $objProducto->setReferencia($referencia);
        $objProducto->setDescripcion($descripcion);

        return descuentoModel::producto($objProducto);
    }*/

    public static function producto(){

        return descuentoModel::producto();
    }
}


?>