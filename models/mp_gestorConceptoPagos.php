<?php 

require_once "conexion.php";

class ConceptoPagosModel{

#============================================================================

	#==================== LISTAR CONCEPTO DE PAGO EL MONTO ========================
	public function listarConceptoMonto($tabla){

		$listar = Conexion::conectaDB()->prepare("SELECT id_conceptoPago, concepto, monto, estado FROM $tabla");

		$listar -> execute();

		return $listar -> fetchAll();

		$listar -> close();
	}

#================ GUARDAR DATOS A LA BD ===========================
	public function guardarConceptoPagos($datos, $tabla){

		$insert = Conexion::conectaDB()->prepare("INSERT INTO $tabla (concepto, monto, estado) VALUES (:concepto, :monto, 'AC')");

		$insert -> bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$insert -> bindParam(":monto", $datos["monto"], PDO::PARAM_STR);

		if($insert->execute()){

			return "ok";
		}else{

			return "error";
		}

		$insert->close();
	}

#==================== ACTUALIZAR CONCEPTO PAGOS ====================================
	public function editarConceptoModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET concepto = :concepto, monto = :monto WHERE id_conceptoPago = :id_conceptoPago");

		$stmt -> bindParam(":concepto", $datosModel["concepto"], PDO::PARAM_STR);
		$stmt -> bindParam(":monto", $datosModel["monto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_conceptoPago", $datosModel["id_conceptoPago"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

#======================= BORRAR CONCEPTO PAGOS ===========================
	public function borrarConceptoModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			UPDATE $tabla SET estado= 'IN' WHERE id_conceptoPago = :id_conceptoPago");

		$stmt->bindParam(":id_conceptoPago", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	
}