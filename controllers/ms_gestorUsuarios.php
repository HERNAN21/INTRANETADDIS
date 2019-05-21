<?php 

class UsuariosController
{

#OBTENER LA LISTA DE USUARIOS ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getUsuariosController()
	{
		
		$respuesta = UsuariosModel::getUsuariosModel("usuarios");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr idUsuario='.$item{"id_usuario"}.'>
                    <td><a href="#foto'.$item{"id_usuario"}.'" data-toggle="modal"><img src="'.$item{"foto"}.'" style="witdh:50px; height:50px; border: solid 2px #aaa"></a></td>
                    <td>'.$item{"nombres"}.' '.$item{"ape_paterno"}.' '.$item{"ape_materno"}.'</td>
                    <td>'.$item{"dni"}.'</td>
                    <td>'.$item{"usuario"}.'</td>
                    <td>'.$item{"email"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">'.$item{"estado"}.'</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">'.$item{"estado"}.'</span></td>	';

		            }

		    echo'
		            <td>
                        <button class="btn btn-xs btn-primary waves-effect btn-editar-usuario"><i class="material-icons">edit</i></button>
                        <a href="index.php?action=ms_usuarios&idDelete='.$item{"id_usuario"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>
				
				<div class="modal fade" id="foto'.$item{"id_usuario"}.'" tabindex="-1" role="dialog">
	                <div class="modal-dialog modal-sm" role="document">
	                    <div class="modal-content">
	                    	<div class="modal-header">
	                    		<button type="button" class="close" data-dismiss="modal">x</button>
	                    	</div>
	                    	<div class="modal-body">
	                    		<div class="row">
	                    			<div class="col-xs-12 col-md-12 text-center">
	                    				<div class="thumbnail">
	                    					<img src=" '.$item{"foto"}.' " alt="Foto de perfil">
	                    				</div>
	                    				<p style="display:block; color: #000">'.$item{"nombres"}.' '.$item{"ape_paterno"}.' '.$item{"ape_materno"}.'</p>
	                    			</div>
	                    		</div>
	                    	</div>
	                    </div>
	                </div>
	            </div>
			
			';
		}

	}

#CREAR NUEVOS USUARIOS
	#---------------------------------------------------------------------------------
	public function createUsuariosController()
	{

		$ruta = "";

		if(isset($_POST["nuevoUsuario"])){

			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				$imagen = $_FILES["nuevaImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/img-usuarios/usuario".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>400, "height"=>400 ]);

				imagejpeg($destino, $ruta);
			}

			if($ruta == ""){

				$ruta = "views/images/img-usuarios/usuario.jpg";

			}

			$datos = array( "idPersona" => $_POST["nuevaPersona"], "Usuario" => $_POST["nuevoUsuario"],
									"Password" => $_POST["nuevoPassword"]	, 	"Correo" => $_POST["nuevoCorreo"],
									"foto" => $ruta);

			$respuesta = UsuariosModel::createUsuariosModel("usuarios", $datos);

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
											window.location = \"ms_usuarios\";
										}
							});

						});
					</script>";

			}

		}
	}

#MODAL DE BUSQUEDA DE PERSONAL
	#-----------------------------------------------------------------------------------
	public function searchPersonasController($datosContoller){

		$respuesta = UsuariosModel::searchPersonasModel("persona", $datosContoller);

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array('idPersona' => $item["id_persona"],
									'nombres' => $item["nombres"],
									'ape_paterno' => $item["ape_paterno"],
									'ape_materno' => $item["ape_materno"],
									'dni' => $item["dni"],
									'persona' => $item["descripcion"] );
		}

		$jsonString = json_encode($json);

		echo $jsonString;
	}

#MOSTRAR DATA DE BUSQUEDA DE PERSONA 
	public function showDataController($datosContoller){

		$respuesta = UsuariosModel::showdataModel("persona", $datosContoller);

		$json = "";

		foreach ($respuesta as $row => $item) {
			$json[] = array('idPersona' => $item["id_persona"],
									'nombres' => $item["nombres"],
									'ape_paterno' => $item["ape_paterno"],
									'ape_materno' => $item["ape_materno"],
									'dni' => $item["dni"]);
		}

		$jsonString = json_encode($json[0]);

		echo $jsonString;

	}

# EDITAR USUARIOS ACTUALES
	#----------------------------------------------------------------------------------

	#================DATA DE MODAL================== 
	public function dataUsuariosController($datosContoller){

		$respuesta = UsuariosModel::dataUsuariosModel($datosContoller, "usuarios");

		$json = array();

		foreach ($respuesta as $row => $item) {

			$json[] = array(	"id_usuario" => $item["id_usuario"] ,
										"nombres" => $item["nombres"] ,
										"ape_paterno" => $item["ape_paterno"] ,
										"ape_materno" => $item["ape_materno"] ,
										"dni" => $item["dni"] ,
		                                "usuario" => $item["usuario"] ,
		                                "password" => $item["password"] ,
		                                "foto" => $item["foto"] ,
		                                "email" => $item["email"] ,
		                                "estado" => $item["estado"] );

		}

		$jsonString = json_encode($json[0]);

		echo $jsonString;
	}

	public function updateUsuariosController(){

		$ruta = "";

		if(isset($_POST["editarUsuario"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){

				$imagen = $_FILES["editarImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/img-usuarios/usuario".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>400, "height"=>400]);

				imagejpeg($destino, $ruta);
			}

			if($ruta == ""){

				$ruta = $_POST["editarFotoU"];

			}

			if($ruta == "" && $_POST["editarFotoU"] == ""){

				$ruta = "views/images/foto-defecto.jpg";

			}

			if($ruta != "" && $_POST["editarFotoU"] != "views/images/foto-defecto.jpg" && $ruta != $_POST["editarFotoU"] ){

				unlink($_POST["editarFotoU"]);

			}

			$datos = array (	"id"=>$_POST["IdUser"],
										"Usuario"=>$_POST["editarUsuario"],
										"Password"=>$_POST["editarPassword"],
										"Email"=>$_POST["editarEmail"],
										"Foto"=>$ruta);

			$respuesta = UsuariosModel::updateUsuariosModel($datos, "usuarios");

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
											window.location = \"ms_usuarios\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR USUARIOS ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteUsuariosController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = UsuariosModel::deleteUsuariosModel($datos, "usuarios");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El usuario se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ms_usuarios\";
										}
									}	
								);

						});
					</script>";
		}
	}
 }