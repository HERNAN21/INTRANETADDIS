<?php 

class ModulosController
{

#OBTENER LA LISTA DE MODULOS ACTUALES (PANEL IZQUIERDO)
	#----------------------------------------------------------------------------------------------------------	
	public function getModulosController()
	{
		
		$respuesta = ModulosModel::getModulosModel("modulos");

		foreach ($respuesta as $row => $item) {
			
			echo '
				<option value="'.$item["id_modulo"].'">'.$item["deslar"].'</option>
			  ';

		}

	}

#OBTENER LA LISTA DE MODULOS ACTUALES
	#------------------------------------------------------------------------------------------------------------
	public function getAllModulosController(){

		$respuesta = ModulosModel::getAllModulosModel("modulos");

		foreach ($respuesta as $row => $item) {
			
			if($item["id_modulo"] == $item["mod_super"]){
				echo '
				  <tr>
	                    <td>'.$item{"descor"}.'</td>
	                    <td>'.$item{"deslar"}.'</td>
	                    <td>'.$item{"link"}.'</td>
	                    <td>'.$item{"orden"}.'</td>
	                    <td><i class="material-icons">'.$item{"icono"}.'</i></td>';

	                    if ($item{"estado"} == "AC"){

	                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

	                    }else {

			            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

			            }

			    echo'
			            <td>
	                        <a href="#perfil'.$item{"id_modulo"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
	                        <a href="index.php?action=ms_modulos&idDelete='.$item{"id_modulo"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
	                    </td>
	                </tr>

	                <div class="modal fade" id="perfil'.$item{"id_modulo"}.'" tabindex="-1" role="dialog">
		                <div class="modal-dialog" role="document">
		                    <div class="modal-content">
		                        <div class="modal-header">
		                            <h4 class="modal-title" id="defaultModalLabel">Editar Modulo Actual</h4>
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
		                                            	<input type="hidden" value="'.$item{"id_modulo"}.'" name="idModu">
		                                                <input type="text" id="desCorta" class="form-control" name="editarDescor" placeholder="Descripcion corta o abreviatura" required value="'.$item{"descor"}.'">
		                                            </div>                                            
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="editarDeslar">Desc. completa</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" class="form-control" name="editarDeslar" placeholder="Descripcion del modulo" required value="'.$item{"deslar"}.'">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="editarLink">Link</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" class="form-control" name="editarLink" placeholder="Link o Url" value="'.$item{"link"}.'">
		                                            </div>
		                                            <div class="help-info">Ejemplo:Campo no obligatorio (Solo cuando no es modulo Superior)</div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="editarIcono">Icono</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" class="form-control" name="editarIcono" placeholder="Icono" required value="'.$item{"icono"}.'">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="editarOrden">N°Orden</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" class="form-control" name="editarOrden" placeholder="N°de orden" required value="'.$item{"orden"}.'">
		                                            </div>
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
	}

# INSERTAR MODULO - SUPER ACTUALES
	#----------------------------------------------------------------------------------
	public function insertModulosController(){

		if(isset($_POST["inertDescorM"])){

			$datos = array (	"inertDescorM"=>$_POST["inertDescorM"],
										"inertDeslarM"=>$_POST["inertDeslarM"],
										"inertlinkM"=>$_POST["inertlinkM"],
										"inertIconoM"=>$_POST["inertIconoM"],
										"inertOrdenM"=>$_POST["inertOrdenM"]);

		$respuesta = ModulosModel::insertModulosModel($datos, "modulos");

		if($respuesta == "ok"){

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro insertado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ms_modulos\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR MODULO - SUPER ACTUALES
	#----------------------------------------------------------------------------------
	public function updateModulosController(){

		if(isset($_POST["idModu"])){

			$datos = array (	"idModu"=>$_POST["idModu"],
										"Descor"=>$_POST["editarDescor"],
										"Deslar"=>$_POST["editarDeslar"],
										"Link"=>$_POST["editarLink"],
										"Icono"=>$_POST["editarIcono"],
										"Orden"=>$_POST["editarOrden"]);

		$respuesta = ModulosModel::updateModulosModel($datos, "modulos");

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
											window.location = \"ms_modulos\";
										}
							});

						});
					</script>";

			}

		}
	}

#OBTENER LA LISTA DE SUB-MODULOS ACTUALES
	#------------------------------------------------------------------------------------------------------------
	public function comboModulosSuper(){

		$respuesta = ModulosModel::getModulosSuperModel("modulos");

		foreach ($respuesta as $row => $item) {
			
			if($item{"link"} == "" && $item{"estado"} == "AC"){

				echo '<option value="'.$item{"id_modulo"}.'">'.$item{"deslar"}.'</option>';
			}

		}
	}

#OBTENER LA LISTA DE SUB-MODULOS ACTUALES
	#------------------------------------------------------------------------------------------------------------
	public function getAllSubModulosController(){

		$respuesta = ModulosModel::getAllModulosModel("modulos");
		$rpt = ModulosModel::getModulosSuperModel("modulos");

		foreach ($respuesta as $row => $item) {
			
			if($item["id_modulo"] != $item["mod_super"]){
				echo '
				  <tr idSubModulo="'.$item{"id_modulo"}.'">
	                    <td>'.$item{"descor"}.'</td>
	                    <td>'.$item{"deslar"}.'</td>
	                    <td>'.$item{"link"}.'</td>
	                    <td>'.$item{"orden"}.'</td>
	                    <td><i class="material-icons">'.$item{"icono"}.'</i></td>';

	                     foreach ($rpt as $row1 => $item1){

				            if($item{"mod_super"} == $item1{"id_modulo"}){

				            	echo ' <td>'.$item1{"deslar"}.'</td> ';

				            }

				        }

	                    if ($item{"estado"} == "AC"){

	                    	echo ' <td><span class="label bg-green">AC</span></td> ';

	                    }else {

			            	echo ' <td><span class="label bg-red">INAC</span></td>	';

			            }

			    echo'
			            <td>
	                        <button class="btn btn-xs btn-primary waves-effect btn-editar-SubModulo"><i class="material-icons">edit</i></button>
	                        <a href="index.php?action=ms_modulos&idDelete='.$item{"id_modulo"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
	                    </td>
	                </tr>

	                
				';

			}
		}
	}

# ELIMINAR MODULOS - SUPER ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteModulosController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = ModulosModel::deleteModulosModel($datos, "modulos");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El modulo se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ms_modulos\";
										}
									}	
								);

						});
					</script>";
		}
	}

# INSERTAR SUB-MODULO ACTUALES
	#----------------------------------------------------------------------------------
	public function insertSubModulosController(){

		if(isset($_POST["inertDescorSubM"])){

			$datos = array (	"inertDescorSubM"=>$_POST["inertDescorSubM"],
										"inertDeslarSubM"=>$_POST["inertDeslarSubM"],
										"inertlinkSubM"=>$_POST["inertlinkSubM"],
										"inertIconoSubM"=>$_POST["inertIconoSubM"],
										"inertOrdenSubM"=>$_POST["inertOrdenSubM"],
										"inertModSuperSubM"=>$_POST["inertModSuperSubM"]);

		$respuesta = ModulosModel::insertSubModulosModel($datos, "modulos");

		if($respuesta == "ok"){

				echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro insertado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ms_modulos\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR MODULO - SUPER ACTUALES
	#----------------------------------------------------------------------------------
	public function showDataEditarController($datosController){

		$respuesta = ModulosModel::showDataEditarModel($datosController,  "modulos");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(
				'id_modulo' => $item['id_modulo'],
				'descor' => $item['descor'],
				'deslar' => $item['deslar'],
				'linkM' => $item['link'],
				'icono' => $item['icono'],
				'orden' => $item['orden'],
			);
		}

		$jsonString = json_encode($json[0]);

		echo $jsonString;


	}

	public function updateSubModulosController(){

		if(isset($_POST["updateDescorSubM"])){

			$datos = array (	"updateDescorSubM"=>$_POST["updateDescorSubM"],
										"updateDeslarSubM"=>$_POST["updateDeslarSubM"],
										"updatelinkSubM"=>$_POST["updatelinkSubM"],
										"updateIconoSubM"=>$_POST["updateIconoSubM"],
										"updateOrdenSubM"=>$_POST["updateOrdenSubM"],
										"updateModSuperSubM"=>$_POST["updateModSuperM"],
										"updateIdModuloSubM"=>$_POST["updateIdModuloSubM"]);

			var_dump($datos);

		$respuesta = ModulosModel::updateSubModulosModel($datos, "modulos");

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
											window.location = \"ms_modulos\";
										}
							});

						});
					</script>";

			}

		}
	}

}