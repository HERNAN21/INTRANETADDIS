<?php 

class gestorInicioController{

#SELECT PERFILES
	#-------------------------------------------------------------------------
	public function viewSelectPerfiles(){

		$respuesta = PerfilesModel::getPerfilesModel("perfiles");

		foreach ($respuesta as $row => $item) {

			if($item["estado"] = "AC"){

			echo'
				<option value="'.$item["id_perfil"].'">'.$item["deslar"].'</option>
			';

			}
		}

	}

#MOSTRAR IMAGEN
	#-------------------------------------------------------------------------
	public function mostrarImagenController($datosController){

		list($ancho, $alto) = getimagesize($datosController);

		if($ancho < 1600 || $alto < 750 ){

			echo 0;

		}else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/inicio/temp/imagen".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datosController);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>750]);
			imagejpeg($destino, $ruta);

			echo $ruta;;

		}

	}

#INSERTAR ARCHIVOS
	#---------------------------------------------------------------------------
	public function insertInicioController(){

		if(isset($_POST["tituloInicio"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/inicio/temp/*");

			foreach($borrar  as $file){

				unlink($file);

			}

			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/inicio/imagen".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>750]);

			imagejpeg($destino, $ruta);

			$datosController = array(	"titulo"=> $_POST["tituloInicio"],
														"descripcion"=> $_POST["descripciónInicio"],
														"perfil" => $_POST["perfilInicio"],
														"imagen" => $ruta);

			$respuesta = gestorInicioModel::insertInicioModel($datosController, "inicio");

			if($respuesta == "ok"){

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro guardado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"mc_gestorInicio\";
										}
							});

						});
					</script>";

			}else{

				echo $respuesta;

			}

		}

	}

#MOSTRAR ARCHIVOS DE INICIO
	#--------------------------------------------------------------------
	public function viewImagenesInicioController(){

		$respuesta = gestorInicioModel::viewImagenesInicioModel("inicio");

		foreach ($respuesta as $row => $item) {
			echo '
				<div class="col-xs-12" id="'.$item["id_imgInicio"].'"> 
                    <div class="header">
                        <ul>
                            <button type="button" class="btn bg-indigo btn-xs header-dropdown m-r-30 editarImgInicio"><i class="material-icons">edit</i></button>
                            <a href="index.php?action=mc_gestorInicio&idBorrar='.$item["id_imgInicio"].'&rutaImagen='.$item["imagen"].'" class="btn bg-red btn-xs header-dropdown m-r--5"><i class="material-icons">delete</i></a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="media">
                            <div class="media-left">
                                <a href="javascript:void(0);">
                                    <img class="media-object" src="'.$item["imagen"].'" width="150" height="80" id="editarImagen">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><span id="editarTitulo">'.$item["titulo"].'</span><span id="editarPerfil"> &nbsp; &nbsp; - &nbsp; &nbsp; PERFIL ( '.$item["deslar"].' )</span></h4>
                                <input type="hidden" id="idPerfilEditar" value=" '.$item["id_perfil"].' ">
                                <input type="hidden" id="editarDescPerfil" value=" '.$item["deslar"].' "><br>
                                <p id="editarDescripcion">'.$item["descripcion"].'</p>
                            </div>
                        </div>
                    </div>
                </div>
			';
		}

	}

#BORRAR REGISTRO
	#-------------------------------------------------------------
	public function deleteArchivoContoller(){

		if (isset($_GET["idBorrar"])) {
			
			unlink($_GET["rutaImagen"]);

			$datos = $_GET["idBorrar"];

			$respuesta = gestorInicioModel::deleteArchivoModel($datos, "inicio");

			if($respuesta == "ok"){

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro eliminado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"mc_gestorInicio\";
										}
							});

						});
					</script>";

			}else{

				echo $respuesta;

			}

		}
	}

#SELECT PARA EDITAR
	#-----------------------------------------------------------------------------------
	public function selectEditarInicioController($datosController){

		$respuesta = gestorInicioModel::selectEditarInicioModel($datosController);

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'idPerf' => $item['id_perfil'],
				'deslar' => $item['deslar'],
			);
		}

		$jsonString = json_encode($json);

		echo $jsonString;

	}

#ACTUALIZAR ARCHIVO DE INICIO
	#-----------------------------------------------------------------------------------
	public function editarArchivoInicioController(){

		$ruta = "";

		if(isset($_POST["editarTituloIni"])){

			if(isset($_FILES["editarImagenIni"]["tmp_name"])){

				$imagen = $_FILES["editarImagenIni"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/inicio/imagen".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>750]);

				imagejpeg($destino, $ruta);

				$borrar = glob("views/images/inicio/temp/*");

				foreach($borrar  as $file){

					unlink($file);

				}

			}

		if( $ruta == ""){

			$ruta = $_POST["imagenAntigua"];
			
		}else{

			unlink($_POST["imagenAntigua"]);

		}

			$datos = array(	"id" => $_POST["id"],
										"titulo" => $_POST["editarTituloIni"],
										"descripcion" => $_POST["editarDescripcionIni"],
										"imagen" => $ruta,
										"perfil" => $_POST["editarPerfilIni"]);

			$respuesta = gestorInicioModel::editarArchivoInicioModel($datos, "inicio");

			echo $respuesta;

			if($respuesta == "ok"){

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro actualizado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"mc_gestorInicio\";
										}
							});

						});
					</script>";

			}else{

				echo  $respuesta;

			}
		}

	}

#MOSTRAR LA IMAGEN EN LA PAGINA DE INICIO
	#-----------------------------------------------------------------
	public function mostrarImagenInicioController(){

		$datos = $_SESSION["codPerfil"];

		$respuesta = gestorInicioModel::mostrarImagenInicioModel("inicio", $datos);

		echo '<img src=" '.$respuesta["imagen"].' ">';
		echo '<div class="carousel-caption">
                    <h3>'.$respuesta["titulo"].'</h3>';
        echo '<p>'.$respuesta["descripcion"].'</p>
                </div>';

	}

}