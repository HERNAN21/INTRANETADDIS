<?php 

class gestorCiclosController
{

#OBTENER LA LISTA DE LOS CICLOS
	#----------------------------------------------------------------------------------------------------------	
	public function getAllCiclosController()
	{
		
		$respuesta = gestorCiclosModel:: getAllCiclosModel("ciclo");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_ciclo"}.'</td>
                    <td>'.$item{"deslar"}.'</td>
                    <td>'.$item{"descor"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#ciclo'.$item{"id_ciclo"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ma_gestorCiclos&idDelete='.$item{"id_ciclo"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="ciclo'.$item{"id_ciclo"}.'" tabindex="-1" role="dialog">
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
	                                        <label for="editarDeslarCiclo">Ciclo</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_ciclo"}.'" name="idCicloEditar">
	                                                <input type="text" id="editarDeslarCiclo" class="form-control" name="editarDeslarCiclo" placeholder="Descripcion del perfil a crear" required value="'.$item{"deslar"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: PRIMER CICLO</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="editarDescorCiclo">Desc. Corta</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="editarDescorCiclo" class="form-control" name="editarDescorCiclo" placeholder="Descripcion corta o abreviatura" required value="'.$item{"descor"}.'">
	                                            </div>                                            
	                                            <div class="help-info">Ejemplo: I</div>
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

#CREAR NUEVOS CICLOS
	#---------------------------------------------------------------------------------
	public function createCiclosController()
	{

		if(isset($_POST["createDescorCiclo"])){

			$datos = array( "DescorCiclo" => $_POST["createDescorCiclo"], 
									"DeslarCiclo" => $_POST["createDeslarCiclo"] );

			$respuesta = gestorCiclosModel::createCiclosModel("ciclo", $datos);

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
											window.location = \"ma_gestorCiclos\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR CARRERAS ACTUALES
	#----------------------------------------------------------------------------------
	public function updateCiclosController(){

		if(isset($_POST["editarDescorCiclo"])){

			$datos = array (	"idCiclo"=>$_POST["idCicloEditar"],
										"DeslarCiclo"=>$_POST["editarDeslarCiclo"],
										"DescorCiclo"=>$_POST["editarDescorCiclo"]
									);

		$respuesta = gestorCiclosModel::updateCiclosModel($datos, "ciclo");

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
											window.location = \"ma_gestorCiclos\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteCiclosController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = gestorCiclosModel::deleteCiclosModel($datos, "ciclo");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El ciclo se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ma_gestorCiclos\";
										}
									}	
								);

						});
					</script>";
		}
	}
	
}