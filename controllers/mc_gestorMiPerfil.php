<?php 

class GestorMiPerfilController{

#MOSTRAR IMAGEN 
	#---------------------------------------------------------------------------
	public function mostrarImagenUsuarioController($datosController){

		list($ancho, $alto) = getimagesize($datosController);

		if($ancho < 400 || $alto < 400){

			echo 0;

		}else{

			$aleatorio = mt_rand(100, 999);

			$ruta = "../../views/images/img-usuarios/temp/usuario".$aleatorio.".jpg";

			$nuevoAncho = 400;
			$nuevoAlto = 400;

			$origen = imagecreatefromjpeg($datosController);

			#imagecreatetruecolor: Crea una nueva imagen de color verdadero
			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			#imagecopyresized: copia una porcion de una imagen a otra imagen
			#bool imagecopyresized($destino, $origen, int $destino_x, int $destino_y, int $origen_x, int $origen_y, int $destino_w, int destino_h, int $origen_w, int $origen_h)
			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagejpeg($destino, $ruta);

			echo $ruta;

		}
	}

#GUARDAR FOTO
	#-----------------------------------------------------------------
	public function guardarFotoUsuarioController(){

		$ruta = "";

		if(isset($_POST["fotoUsuarioAntigua"]) || isset($_FILES["editarImagenUsuario"]["tmp_name"])){

			if(isset($_FILES["editarImagenUsuario"]["tmp_name"])){

				$imagen = $_FILES["editarImagenUsuario"]["tmp_name"];

				list($ancho, $alto) = getimagesize($imagen);

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/img-usuarios/usuario".$aleatorio.".jpg";

				$nuevoAncho = 400;
				$nuevoAlto = 400;

				$origen = imagecreatefromjpeg($imagen);

				#imagecreatetruecolor: Crea una nueva imagen de color verdadero
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				#imagecopyresized: copia una porcion de una imagen a otra imagen
				#bool imagecopyresized($destino, $origen, int $destino_x, int $destino_y, int $origen_x, int $origen_y, int $destino_w, int destino_h, int $origen_w, int $origen_h)
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);

				$borrar = glob("views/images/img-usuarios/temp/*");

				foreach($borrar  as $file){

					unlink($file);

				}

			}

			if($ruta == ""){

				$ruta == $_POST["fotoUsuarioAntigua"];

			}

			if($ruta != "" && $_POST["fotoUsuarioAntigua"] != "views/images/foto-defecto.jpg"){

				unlink ($_POST["fotoUsuarioAntigua"]);

			}

			$datos = array( 	"idUsuario" => $_SESSION["cod_usuario"],
										"rutaFoto"   => $ruta);

			// var_dump($datos);
			$respuesta = GestorMiPerfilModel::guardarFotoUsuarioModel($datos, "usuarios");

			if($respuesta == "ok"){

				$_SESSION["foto_usuario"] = $ruta;

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Foto de Perfil actualizada exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"mc_miPerfil\";
										}
							});

						});
					</script>";

			}else{

				echo $respuesta;

			}


		}
	}

	public function updatePasswordusuarioController(){

		$datos = array(	'passwordActual' => $_POST["passwordActual"],
									'passwordNueva' => $_POST["passwordNueva"],
							 		'id_usuario' => $_SESSION["cod_usuario"]);

		$respuesta = GestorMiPerfilModel::updatePasswordusuarioModel($datos, "usuarios");
	}
}