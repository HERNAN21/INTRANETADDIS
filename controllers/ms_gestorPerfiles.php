<?php 

class PerfilesController
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getPerfilesController()
	{
		
		$respuesta = PerfilesModel::getPerfilesModel("perfiles");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_perfil"}.'</td>
                    <td>'.$item{"descor"}.'</td>
                    <td>'.$item{"deslar"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#perfil'.$item{"id_perfil"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ms_perfiles&idDelete='.$item{"id_perfil"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="perfil'.$item{"id_perfil"}.'" tabindex="-1" role="dialog">
	                <div class="modal-dialog" role="document">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h4 class="modal-title" id="defaultModalLabel">Editar Perfil Actual</h4>
	                            <button type="button" class="close" data-dismiss></button>
	                        </div>
	                        <div class="modal-body">
	                            <form class="form-horizontal" method="POST" >
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="nombUsuario">Desc. Corta</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_perfil"}.'" name="idPerfilUp">
	                                                <input type="text" id="desCorta" class="form-control" name="desCortaUp" placeholder="Descripcion corta o abreviatura del perfil" required value="'.$item{"descor"}.'">
	                                            </div>                                            
	                                            <div class="help-info">Ejemplo: SEG</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="contraseña">Desc. completa</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="desLarga" class="form-control" name="desLargaUp" placeholder="Descripcion del perfil a crear" required value="'.$item{"deslar"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: SEGURIDAD</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="modal-footer">
	                                	<button type="submit" class="btn btn-link waves-effect bg-blue">GUARDAR</button>
	                            		<button type="button" class="btn btn-link waves-effect bg-red" data-dismiss="modal">CERRAR</button>
	                        		</div>
	                            </form>
	                        </div>                        
	                    </div>
	                </div>
            	</div>
			';

		}

	}

#CREAR NUEVOS PERFILES
	#---------------------------------------------------------------------------------
	public function createPerfilesController()
	{

		if(isset($_POST["desCorta"])){

			$datos = array( "desCorta" => $_POST["desCorta"], 	"desLarga" => $_POST["desLarga"] );

			$respuesta = PerfilesModel::createPerfilesModel("perfiles", $datos);

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
											window.location = \"ms_perfiles\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function updatePerfilesController(){

		if(isset($_POST["idPerfilUp"])){

			$datos = array ("idPerfil"=>$_POST["idPerfilUp"],
								"descorUp"=>$_POST["desCortaUp"],
								"deslarUp"=>$_POST["desLargaUp"]);

		$respuesta = PerfilesModel::updatePerfilesModel($datos, "perfiles");

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
											window.location = \"ms_perfiles\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deletePerfilesController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = PerfilesModel::deletePerfilesModel($datos, "perfiles");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El perfil se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ms_perfiles\";
										}
									}	
								);

						});
					</script>";
		}
	}
}