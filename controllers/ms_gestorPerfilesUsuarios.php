<?php 

class GestorPerfilesUsuariosController
{

#BUSQUEDA DE PERFILES
	#----------------------------------------------------------------------------	
	public function searchUsuariosController($datosController){

		$respuesta = GestorPerfilesUsuariosModel::searchUsuariosModel($datosController, "usuarios");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idUsuario' => $item['id_usuario'],
				'usuario' => $item['usuario'],
				'nombres' => $item['nombres'],
				'ape_paterno' => $item['ape_paterno'],
				'ape_materno' => $item['ape_materno'],
				'dni' => $item['dni'],
			);
		}

		$jsonString = json_encode($json);

		echo $jsonString;

	}

# MOSTRAR DATOS DEL USUARIO SELECCIONADO (ASIGNACION)
	#-------------------------------------------------------------------------------------------------------------
	public function showDataUsuariosController($datosController)
	{

		$respuesta = GestorPerfilesUsuariosModel::showDataUsuariosModel($datosController, "usuarios");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idUsuario' => $item['id_usuario'],
				'usuario' => $item['usuario'],
				'nombres' => $item['nombres'],
				'apePaterno' => $item['ape_paterno'],
				'apeMaterno' => $item['ape_materno'],
				'dni' => $item['dni'],
			);
		}

		$jsonString = json_encode($json[0]);

		echo $jsonString;

	}

# MOSTRAR DATOS DEL USUARIO SELECCIONADO (ASIGNACION)
	#-------------------------------------------------------------------------------------------------------------
	public function comboPerfilesController(){

		$respuesta = PerfilesModel::getPerfilesModel("perfiles");

		foreach ($respuesta as $row => $item) {

			if($item{"estado"} == "AC"){

				echo '<option value="'.$item{"id_perfil"}.'">'.$item{"deslar"}.'</option>';

			}

		}

	}

#MOSTRAR TABLA DE ASIGNACION DE USUARIOS
	#-----------------------------------------------------------------------------
	public function viewPerfilesUsuariosController($datosController){

		$respuesta = GestorPerfilesUsuariosModel::viewPerfilesUsuariosModel($datosController, "usuarios_perfiles"); 

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idUsuario' => $item['id_usuario'],
				'usuario' => $item['usuario'],
				'idPerfil' => $item['id_perfil'],
				'perfil' => $item['deslar'],
			);
		}

		$jsonString = json_encode($json);

		echo $jsonString;

	}


#INSERTAR ASIGNACION DE PERFILES-USUARIOS
	#-----------------------------------------------------------------------------
	public function insertPerfilesUsuariosController($datosController){

		$respuesta = GestorPerfilesUsuariosModel::insertPerfilesUsuariosModel($datosController, "usuarios_perfiles"); 

		if($respuesta == "ok"){

			echo "Exito";

		}else{

			echo "Error";

		}

	}

#ELIMINAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public function deletePerfilesUsuariosController($datosController){

		$respuesta = GestorPerfilesUsuariosModel::deletePerfilesUsuariosModel($datosController, "usuarios_perfiles"); 

		if($respuesta == "ok"){

			echo "Exito";

		}else{

			echo "Error";

		}

	}

}