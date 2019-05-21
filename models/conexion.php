<?php

class Conexion
{

    public function conectaDB()
    {

        $conn = new PDO("mysql:host=localhost; dbname=intranetaddisdb", "root", "", array(PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        // var_dump($conn);

        return $conn;
    }

}

 // $conexion = new Conexion();
 // $conexion->conectaDB();
