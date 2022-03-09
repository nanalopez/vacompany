<?php

class Conection{

    public static function conectar(){
        try{
            $con = new PDO("mysql:host=samplefeb19.cdyj8qpiv1rx.us-east-2.rds.amazonaws.com;dbname=adm1n1st_vacorp_production_server", "OneVACompany", "On3adm1n");

            //echo 'Conectado ;)';
            return $con;
        }catch(PDOException $e){
            die($e -> getMessage());
        }
        
    }

}

Conection::conectar();
?>