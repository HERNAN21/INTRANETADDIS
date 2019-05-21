<?php 

class ConceptoPagosController{

	#==========================================================================
	#================== LISTAR CONCEPTO DE PAGOS ===========

	public function listarConceptoPagosController(){

		$respuesta = ConceptoPagosModel::listarConceptoMonto("concepto_pago");

        $count = 1;
		foreach($respuesta as $row => $item){

			echo '<tr>
                    <td>'.$count++.'</td>
                    <td class="text-center">'.$item["concepto"].'</td>
                    <td>'.$item["monto"].'</td>';
                    if($item["estado"] == "AC"){
                       echo '<td><span class="label bg-green">Activo</span></td>';
                    }else{
                        echo '<td><span class="label bg-red">Inactivo</span></td>';
                    }
                    echo '<td>
                        <a href="#concepto'.$item["id_conceptoPago"].'" data-toggle="modal"><button type="button" class="btn btn-info waves-effect">
                            <i class="material-icons">edit</i>
                        </button></a>
                        <a href="index.php?action=mp_gestorConceptos&idBorrarPago='.$item["id_conceptoPago"].'">
                            <button class="btn bg-pink waves-effect">
                            <i class="material-icons">delete</i>
                            </button>
                        </a>
                    </td>
                </tr>

            <div class="modal fade" id="concepto'.$item["id_conceptoPago"].'">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Editar Pagos</h4>
                        </div>
                        <div class="modal-body">
                        	<form method="post" enctype="multipart/form-data">

                                <input name="idPago" type="hidden" value="'.$item["id_conceptoPago"].'">

                                <label for="email_address">Concepto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["concepto"].'" name="updateConcepto" id="email_address" class="form-control" placeholder="Ejemplo / matricula">
                                    </div>
                                </div>
                                <label for="password">Monto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="'.$item["monto"].'" name="updateMonto" id="password" class="form-control" placeholder="Monto">
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

#======================== INSERTAR PAGO CONCEPTO DATOS CONTROLLER ===============
  public function insertarConceptoController(){

        if(isset($_POST["registroConcepto"])){

            $datosController = array("concepto"=>$_POST["registroConcepto"],
                                    "monto"=>$_POST["registroMontos"]);

            $respuesta = ConceptoPagosModel::guardarConceptoPagos($datosController, "concepto_pago");

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
											window.location = \"mp_gestorConceptos\";
										}
							});

						});
												
				</script>";

            }
        }
    }

#======================= ACTUALIZAR CONCEPTO PAGOS ====================
    public function editarConceptoController(){

        if(isset($_POST["updateConcepto"])){

                $datosController = array("id_conceptoPago"=>$_POST["idPago"],
                                         "concepto"=>$_POST["updateConcepto"],
                                         "monto"=>$_POST["updateMonto"]);

                $respuesta = ConceptoPagosModel::editarConceptoModel($datosController, "concepto_pago");

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
											window.location = \"mp_gestorConceptos\";
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

 #===================== BORRAR CONCEPTO PAGO ============================
    public function borrarConceptoController(){

        if(isset($_GET["idBorrarPago"])){

            $datosController = $_GET["idBorrarPago"];

            $respuesta = ConceptoPagosModel::borrarConceptoModel($datosController, "concepto_pago");

            if($respuesta == "ok"){

                echo "<script>jQuery(function(){
							swal({
										title: \"¡OK!\",
										text: \"¡Registro eliminado exitosamente!\",
										type: \"success\",
										confirmButtonText: \"Cerrar\",
										closeOnConfirm: false
									},
									function(isConfirm){
										if(isConfirm){
											window.location = \"mp_gestorConceptos\";
										}
							});

						});
												
				</script>";
            }
        }
    }

}