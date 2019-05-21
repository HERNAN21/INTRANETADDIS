<?php 

class gestorProgramasAcademicosControler
{

#OBTENER LA LISTA DE LOS PROGRAMAS ACADEICOS ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getProgramAcademicosController()
	{
		
		$respuesta = gestorProgramasAcademicosModel:: getProgramAcademicosModel("carreras");

		foreach ($respuesta as $row => $item) {
			
			echo '
			  <tr>
                    <td>'.$item{"id_carrera"}.'</td>
                    <td>'.$item{"descor"}.'</td>
                    <td>'.$item{"deslar"}.'</td>';

                    if ($item{"estado"} == "AC"){

                    	echo ' <td><span class="label bg-green">ACTIVO</span></td> ';

                    }else {

		            	echo ' <td><span class="label bg-red">INACTIVO</span></td>	';

		            }

		    echo'
		            <td>
                        <a href="#perfil'.$item{"id_carrera"}.'" data-toggle="modal"><button class="btn btn-xs btn-primary waves-effect"><i class="material-icons">edit</i></button></a>
                        <a href="index.php?action=ma_gestorProgAcademicos&idDelete='.$item{"id_carrera"}.'"><button class="btn btn-xs btn-danger"><i class="material-icons">delete</i></button></a>
                    </td>
                </tr>

                <div class="modal fade" id="perfil'.$item{"id_carrera"}.'" tabindex="-1" role="dialog">
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
	                                        <label for="editarDescorCarr">Desc. Corta</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                            	<input type="hidden" value="'.$item{"id_carrera"}.'" name="idCarreraEditar">
	                                                <input type="text" id="editarDescorCarr" class="form-control" name="editarDescorCarr" placeholder="Descripcion corta o abreviatura del perfil" required value="'.$item{"descor"}.'">
	                                            </div>                                            
	                                            <div class="help-info">Ejemplo: ADM</div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row clearfix">
	                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                        <label for="editarDeslarCarr">Desc. completa</label>
	                                    </div>
	                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                        <div class="form-group">
	                                            <div class="form-line">
	                                                <input type="text" id="editarDeslarCarr" class="form-control" name="editarDeslarCarr" placeholder="Descripcion del perfil a crear" required value="'.$item{"deslar"}.'">
	                                            </div>
	                                            <div class="help-info">Ejemplo: ADMINISTRACION DE EMPRESAS</div>
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

#CREAR NUEVOS CARRERAS
	#---------------------------------------------------------------------------------
	public function createCarrerasController()
	{

		if(isset($_POST["descorCarrera"])){

			$datos = array( "descorCarrera" => $_POST["descorCarrera"], 
									"deslarCarrera" => $_POST["deslarCarrera"] );

			$respuesta = gestorProgramasAcademicosModel::createCarrerasModel("carreras", $datos);

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
											window.location = \"ma_gestorProgAcademicos\";
										}
							});

						});
					</script>";

			}

		}
	}

# EDITAR CARRERAS ACTUALES
	#----------------------------------------------------------------------------------
	public function updateCarrerasController(){

		if(isset($_POST["idCarreraEditar"])){

			$datos = array ("idCarreraEditar"=>$_POST["idCarreraEditar"],
									"editarDescorCarr"=>$_POST["editarDescorCarr"],
									"editarDeslarCarr"=>$_POST["editarDeslarCarr"]);

		$respuesta = gestorProgramasAcademicosModel::updateCarrerasModel($datos, "carreras");

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
											window.location = \"ma_gestorProgAcademicos\";
										}
							});

						});
					</script>";

			}

		}
	}

# ELIMINAR PERFILES ACTUALES
	#----------------------------------------------------------------------------------
	public function deleteCarrerasController(){

		if(isset($_GET["idDelete"])){

			$datos = $_GET["idDelete"];

			$respuesta = gestorProgramasAcademicosModel::deleteCarrerasModel($datos, "carreras");

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
											window.location = \"ma_gestorProgAcademicos\";
										}
									}	
								);

						});
					</script>";
		}
	}
	
}