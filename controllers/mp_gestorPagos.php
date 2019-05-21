<?php 

class GestorPagosController{

	#============== LISTAR PAGOS ===============
	public function listarPagosController(){

		$respuesta = GestorPagosModel::listarPagos("pagos");

		foreach($respuesta as $row => $item){

			echo '<tr>
                    <th scope="">'.$item["vencimiento"].'</th>
                    <td>'.$item["monto_pagado"].'</td>
                    <td>'.$item["monto_deuda"].'</td>
                    <td>'.$item["nBoleta"].'</td>
                    <td>'.$item["fecha_registro"].'</td>
                    <td>'.$item["dni_pagante"].'</td>';

                    if($item["estado"]=="PAGADO"){
                        echo '<td><span class="label bg-green">PAGADO</span></td>';
                    }else{
                        echo '<td><span class="label bg-red">DEBE</span></td>';
                    }
                    echo '<td>
                        <a href="#pagos'.$item["id_pago"].'" data-toggle="modal"><button type="button" class="btn btn-info waves-effect">
                            <i class="material-icons">edit</i>
                        </button></a>
                        <a href="index.php?action=mp_gestorPagos&idDeletePagos='.$item["id_pago"].'"><button type="button" class="btn bg-pink waves-effect">
                            <i class="material-icons">delete</i>
                        </button></a>
                    </td>
                </tr>


            <div class="modal fade" id="pagos'.$item["id_pago"].'">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Editar Pagos</h4>
                        </div>
                        <div class="modal-body">
                        	<form method="post" enctype="multipart/form-data">

                                <input name="idPagos" type="hidden" value="'.$item["id_pago"].'">

                                <label for="email_address">Monto Pagado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["monto_pagado"].'" name="updateMonto" id="email_address" class="form-control" placeholder="Ingrese el monto Pagado">
                                    </div>
                                </div>
                                <label for="password">Monto Deuda</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["monto_deuda"].'" name="updateDeuda" id="password" class="form-control" placeholder="Deuda">
                                    </div>
                                </div>

                                <label for="password">Nro Boleta</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["nBoleta"].'" name="updateBoleta" id="password" class="form-control" placeholder="Nro de Boleta">
                                    </div>
                                </div>

                                <label for="password">Dni</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["dni_pagante"].'" name="updateDni" id="password" class="form-control" placeholder="Ingrese Dni">
                                    </div>
                                </div>

                                <label for="password">Estado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="updateEstado" class="form-control show-tick">
                                            <option>-- Seleccionar --</option>
                                            <option value="ACTIVO">Activo</option>
                                            <option value="INACTIVO">Inactivo</option>
                                            <option value="PENDIENTE">Pendiente</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">ACTUALIZAR</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CERRAR</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>';
		}
	}

	#==============================================================================
	#================ INSERTAR PAGOS =============================
	public function guardarNotasController(){

		if(isset($_POST["registroMonto"])){

				$datosController = array("monto_pagado"=>$_POST["registroMonto"],
										 "id_cuenta"=>$_POST["regitroCuenta"],
										 "monto_deuda"=>$_POST["registroDeuda"],
										 "nboleta"=>$_POST["registroBoleta"],
										 "dni_pagante"=>$_POST["registroDni"]);

				$respuesta = GestorPagosModel::guardarPagosModel($datosController, "pagos");

				if($respuesta == "ok"){

					echo "<script>jQuery(function(){
                        swal({
                            title: \"¡OK!\",
                            text: \"¡Se Guardo Correctamente!\",
                            type: \"success\",
                            confirmButtonText: \"Cerrar\",
                            closeOnConfirm: false
                            },
                            function(isConfirm){
                                if(isConfirm){
                                    window.location = \"mp_gestorPagos\";
                                }
                            });
                        });
                    </script>";

				}

			else{

				echo "<script>jQuery(function(){
                        swal({
                            title:\"¡OK!\",
                            text:\"¡Error al Guardar!\",
                            type:\"danger\",
                            confirmButtonText:\"Cerrar\",
                            closeOnConfirm: false
                            },
                            function(isConfirm){
                                if(isConfirm){
                                    window.location = \"mp_gestorPagos\";
                                }
                            });
                        });
                    </script>";
			}

		}

	}

    #========================= UPDATE PAGOS ================================
  public function editarPagosController(){

        if(isset($_POST["updateMonto"])){

                $datosController = array("codigo"=>$_POST["idPagos"],
                                         "monto_pagao"=>$_POST["updateMonto"],
                                         "monto_deuda"=>$_POST["updateDeuda"],
                                         "boleta"=>$_POST["updateBoleta"],
                                         "dni"=>$_POST["updateDni"]);

                $respuesta = GestorPagosModel::editarPagosModel($datosController, "pagos");

                if($respuesta == "ok"){

                    echo "<script>jQuery(function(){
                        swal({
                            title: \"¡OK!\",
                            text: \"¡Se Guardo Correctamente!\",
                            type: \"success\",
                            confirmButtonText: \"Cerrar\",
                            closeOnConfirm: false
                            },
                            function(isConfirm){
                                if(isConfirm){
                                    window.location = \"mp_gestorPagos\";
                                }
                            });
                        });
                    </script>";

                }

            else{

                echo '<div class="alert alert-danger"><b>¡ERROR!</b> OPPS Algo anda Mal</div>';
            }

        }

    }

#====================== DELETE PAGOS =======================================
	public function deletePagosController(){

			if(isset($_GET["idDeletePagos"])){

				$datoscontroller = $_GET["idDeletePagos"];

				$respuesta = GestorPagosModel::deletePagosModel($datoscontroller, "pagos");

				if($respuesta == "ok"){

						echo "<script>jQuery(function(){
														swal({
																title: \"¡OK!\",
																text: \"¡Se Guardo Correctamente!\",
																type: \"success\",
																confirmButtonText: \"Cerrar\",
																closeOnConfirm: false
																},
																function(isConfirm){
																		if(isConfirm){
																				window.location = \"mp_gestorPagos\";
																		}
																});
														});
												</script>";

				}
			}
	}


}