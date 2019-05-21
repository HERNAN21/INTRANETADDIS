<?php

class Template
{

#  OBTINE LA PLANTILLA  
    #--------------------------------------------------------------
    public function getTemplateController()
    {

        include 'views/template.php';

    }


#ENLACES 
#----------------------------------------------------------------- 
    public function enlacesController(){

    	if (isset($_GET["action"])) {

            $enlacesController = $_GET["action"];

        }else{

        	$enlacesController = "index";

        } 

        $respuesta = EnlacesModel::enlacesTemplateModel($enlacesController);

        include $respuesta;

    }


}
