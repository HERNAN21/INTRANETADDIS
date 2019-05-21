<?php

require_once "conexion.php";

class IngresoModel extends Conexion
{

    public function ingresoUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectaDB()->prepare("
                        SELECT id_usuario, usuario, password, foto, email, estado FROM $tabla
                        WHERE usuario = :usuario
                        AND estado = 'AC'
                    ");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

}
