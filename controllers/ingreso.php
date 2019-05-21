<?php

class IngresoController
{

    public function ingresoUsuarioController()
    {

        if (isset($_POST["Usuario"]) && isset($_POST["Password"])) {

            $datosController = array(
                "usuario"  => $_POST["Usuario"],
                "password" => $_POST["Password"],
            );

            $respuesta = IngresoModel::ingresoUsuarioModel($datosController, "usuarios");

            if ($respuesta["usuario"] == $_POST["Usuario"] && $respuesta["password"] == $_POST["Password"]) {

                #CREAR INICIO DE SESION

                session_start();

                $_SESSION["validar"] = true;

                #CAPTURA CODIGO DE USARIO LOGEADO
                $_SESSION["cod_usuario"] = $respuesta["id_usuario"];

                $_SESSION["foto_usuario"] = $respuesta["foto"];

                header("location: inicio");

            } else {

                echo '
                <div class="bootstrap-notify-container alert alert-dismissible bg-red p-r-35 animated fadeInDown" data-notify="container" role="alert" data-notify-position="top-left" style="display: inline-block; margin: 0px auto; position: fixed; tr_l 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 20px;">
                    <button class="close" type="button" data-dismiss="alert" aria-label="close">x</button>
                    <span data-notify="message">Usuario y/o Contraseña incorrectos</span>
                    <a href="#" target="_blank" data-notify="url"></a>
                </div>';
            }
        }

    }

}
