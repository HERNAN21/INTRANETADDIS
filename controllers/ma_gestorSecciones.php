<?php 

class GestorSeccionesController
{

#OBTENER LA LISTA DE LAS SECCIONES
	#----------------------------------------------------------------------------------------------------------	
	public function getAllSeccionesController()
	{
		
		$respuesta = GestorSeccionesModel:: getAllSeccionesModel("seccion");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_seccion"}.'</td>
                    <td>'.$item{"descripcion"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#ciclo'.$item{"id_seccion"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ma_gestorSecciones&idDelete='.$item{"id_seccion"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="ciclo'.$item{"id_seccion"}.'" tabindex="-1" role="dialog">
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
	                                        <label for="editarDesSeccion">Ciclo</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_seccion"}.'" name="idSeccionEditar">
	                                                <input type="text" id="editarDesSeccion" class="form-control" name="editarDesSeccion" placeholder="Descripcion" required value="'.$item{"descripcion"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: A</div>
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

#CREAR NUEVAS SECCIONES
	#---------------------------------------------------------------------------------
	public function createSeccionController()
	{

		if(isset($_POST["createDesSeccion"])){

			$datos =  $_POST["createDesSeccion"];

			$respuesta = GestorSeccionesModel::createSeccionModel("seccion", $datos);

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
											window.location = \"ma_gestorSecciones\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR SECCIONES ACTUALES
	#----------------------------------------------------------------------------------
	public function updateSeccionController(){

		if(isset($_POST["idSeccionEditar"])){

			$datos = array (	"idSeccion"=>$_POST["idSeccionEditar"],
										"DesSeccion"=>$_POST["editarDesSeccion"]
									);

		$respuesta = GestorSeccionesModel::updateSeccionModel($datos, "seccion");

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
											window.location = \"ma_gestorSecciones\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteSeccionController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = GestorSeccionesModel::deleteSeccionModel($datos, "seccion");

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
											window.location = \"ma_gestorSecciones\";
										}
									}	
								);

						});
					</script>";
		}
	}

}
