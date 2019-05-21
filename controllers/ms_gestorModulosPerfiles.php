<?php 

class GestorModulosPerfilesController
{


#BUSQUEDA DE PERFILES
	#----------------------------------------------------------------------------	
	public function searchPerfilesController($datosController){

		$respuesta = GestorModulosPerfilesModel::searchPerfilesModel($datosController, "perfiles");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idPerf' => $item['id_perfil'],
				'descor' => $item['descor'],
				'deslar' => $item['deslar'],
			);
		}

		$jsonString = json_encode($json);

		echo $jsonString;

	}

# MOSTRAR DATOS DEL PERFIL SELECCIONADO (ASIGNACION)
	#-------------------------------------------------------------------------------------------------------------
	public function showDataPerfilesController($datosController)
	{

		$respuesta = GestorModulosPerfilesModel::showDataPerfilModel($datosController, "perfiles_modulos");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idPerf' => $item['id_perfil'],
				'descor' => $item['descor'],
				'deslar' => $item['deslar'],
			);
		}

		$jsonString = json_encode($json[0]);

		echo $jsonString;

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	public function viewModulosperfilesController($datosController){

		$respuesta = GestorModulosPerfilesModel::showDataPerfilesModel($datosController, "perfiles_modulos"); 

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idPerf' => $item['id_perfil'],
				'perfil' => $item['perfil'],
				'idMod' => $item['id_modulo'],
				'modulo' => $item['modulo'],
			);
		}

		$jsonString = json_encode($json);

		echo $jsonString;

	}


#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public function insertModulosperfilesController($datosController){

		$respuesta = GestorModulosPerfilesModel::insertModulosperfilesModel($datosController, "perfiles_modulos"); 

		if($respuesta == "ok"){

			echo "Exito";

		}else{

			echo "Error";

		}

	}

#ELIMINAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public function deleteModulosperfilesController($datosController){

		$respuesta = GestorModulosPerfilesModel::deleteModulosperfilesModel($datosController, "perfiles_modulos"); 

		if($respuesta == "ok"){

			echo "Exito";

		}else{

			echo "Error";

		}

	}

}