<?php 

class gestorSemestresController
{

#OBTENER LA LISTA DE LOS CICLOS
	#----------------------------------------------------------------------------------------------------------	
	public function getAllSemestresController()
	{
		
		$respuesta = gestorSemestresModel:: getAllSemestresModel("semestre");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_semestre"}.'</td>
                    <td>'.$item{"deslar"}.'</td>
                    <td>'.$item{"descor"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#semestre'.$item{"id_semestre"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ma_gestorSemestres&idDelete='.$item{"id_semestre"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="semestre'.$item{"id_semestre"}.'" tabindex="-1" role="dialog">
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
	                                        <label for="editarDeslarSemestre">Semestre</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_semestre"}.'" name="idSemestreEditar">
	                                                <input type="text" id="editarDeslarSemestre" class="form-control" name="editarDeslarSemestre" placeholder="Descripcion del Semestre" required value="'.$item{"deslar"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: 2018 - ciclo 1 Marzo</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="editarDescorSemestre">Desc. Corta</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="editarDescorSemestre" class="form-control" name="editarDescorSemestre" placeholder="Descripcion corta o abreviatura" required value="'.$item{"descor"}.'">
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
	public function createSemestreController()
	{

		if(isset($_POST["createDeslarSemestre"])){

			$datos = array( "DeslarSemestre" => $_POST["createDeslarSemestre"], 
									"DescorSemestre" => $_POST["createDescorSemestre"] );

			$respuesta = gestorSemestresModel::createSemestreModel("semestre", $datos);

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
											window.location = \"ma_gestorSemestres\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR CARRERAS ACTUALES
	#----------------------------------------------------------------------------------
	public function updateSemestreController(){

		if(isset($_POST["editarDeslarSemestre"])){

			$datos = array (	"idSemestre"=>$_POST["idSemestreEditar"],
										"DeslarSemestre"=>$_POST["editarDeslarSemestre"],
										"DescorSemestre"=>$_POST["editarDescorSemestre"]
									);

		$respuesta = gestorSemestresModel::updateCiclosModel($datos, "semestre");

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
											window.location = \"ma_gestorSemestres\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteSemestreController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = gestorSemestresModel::deleteSemestreModel($datos, "semestre");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El semestre se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ma_gestorSemestres\";
										}
									}	
								);

						});
					</script>";
		}
	}
	
}