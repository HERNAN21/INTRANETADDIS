<?php 

class gestorCursosController
{

#OBTENER LA LISTA DE LOS CURSOS ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getAllCursosController()
	{
		
		$respuesta = gestorCursosModel:: getAllCursosModel("cursos");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_curso"}.'</td>
                    <td>'.$item{"deslar"}.'</td>
                    <td>'.$item{"descor"}.'</td>
                    <td>'.$item{"credito"}.'</td>'                    ;

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#curso'.$item{"id_curso"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ma_gestorCursos&idDelete='.$item{"id_curso"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="curso'.$item{"id_curso"}.'" tabindex="-1" role="dialog">
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
	                                        <label for="editarDeslarCurso">Nombre</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_curso"}.'" name="IdEditarCurso">
	                                                <input type="text" id="editarDeslarCurso" class="form-control" name="editarDeslarCurso" placeholder="Nombre completo" required value="'.$item{"deslar"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: LOGICA DE PROGRAMACIÓN</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="editarDescorCurso">Siglas</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="editarDescorCurso" class="form-control" name="editarDescorCurso" placeholder="Siglas o abreviaturas" required value="'.$item{"descor"}.'">
	                                            </div>                                            
	                                            <div class="help-info">Ejemplo: L.P</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="editarCreditoCurso">Credito</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="editarCreditoCurso" class="form-control" name="editarCreditoCurso" placeholder="Credito del Curso" required value="'.$item{"credito"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: 4</div>
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

#CREAR NUEVOS CURSOS
	#---------------------------------------------------------------------------------
	public function createCursosController()
	{

		if(isset($_POST["createDescorCurso"])){

			$datos = array(	"DescorCurso" => $_POST["createDescorCurso"], 
										"DeslarCurso" => $_POST["createDeslarCurso"], 
										"CreditoCurso" => $_POST["createCreditoCurso"] );

			$respuesta = gestorCursosModel::createCursosModel("cursos", $datos);

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
											window.location = \"ma_gestorCursos\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR CARRERAS ACTUALES
	#----------------------------------------------------------------------------------
	public function updateCursosController(){

		if(isset($_POST["editarDeslarCurso"])){

			$datos = array ("DeslarCurso"=>$_POST["editarDeslarCurso"],
									"DescorCurso"=>$_POST["editarDescorCurso"],
									"CreditoCurso"=>$_POST["editarCreditoCurso"],
									"IdCurso"=>$_POST["IdEditarCurso"]	);

		$respuesta = gestorCursosModel::updateCursosModel($datos, "cursos");

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
											window.location = \"ma_gestorCursos\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteCursosController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = gestorCursosModel::deleteCursosModel($datos, "cursos");

			echo "<script>jQuery(function(){
						swal({
									title: \"¡OK!\",
									text: \"¡El curso se ha eliminado correctamente!\",
									type: \"success\",
									confimButtonText: \"cerrar\",
									closeOnConfirm: false
								},
									function(isConfirm){
										if(isConfirm){
											window.location = \"ma_gestorCursos\";
										}
									}	
								);

						});
					</script>";
		}
	}
	
}