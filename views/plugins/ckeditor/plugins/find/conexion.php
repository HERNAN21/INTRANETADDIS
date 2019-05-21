<?php

class Conexion
{

    public function conectaDB()
    {

        $conn = new PDO("mysql:host=185.206.163.185; dbname=u934388326.intranet", "u934388326.intranet", "intranet", array(PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        #var_dump($conn);

        return $conn;
    }

}

 // $conexion = new Conexion();
 // $conexion->conectaDB();
