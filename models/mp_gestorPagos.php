<?php 

require_once "conexion.php";

class GestorPagosModel{

	#================== OBTENER LISTA DE PAGOS ==============
	public function listarPagos($tabla){

		$listar = Conexion::conectaDB()->prepare("SELECT DISTINCT P.id_pago, C.vecimiento AS vencimiento, P.monto_pagado, P.monto_deuda, P.nBoleta, P.fecha_registro, P.dni_pagante, P.estado
			FROM $tabla P
			INNER JOIN cuenta C ON C.id_cuenta=P.id_cuenta
			GROUP BY P.id_pago");

		$listar -> execute();

		return $listar -> fetchAll();

		$listar -> close();

	}

	#GUARDAR PAGOS
	#------------------------------------------------------------
	public function guardarPagosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO $tabla (id_cuenta, monto_pagado, monto_deuda, nBoleta, fecha_registro, dni_pagante, estado) VALUES (:id_cuenta, :monto_pagado, :monto_deuda, :nboleta, NOW(), :dni_pagante, 'ACTIVO')");

		$stmt -> bindParam(":id_cuenta", $datosModel["id_cuenta"], PDO::PARAM_INT);
		$stmt -> bindParam(":monto_pagado", $datosModel["monto_pagado"], PDO::PARAM_STR);
		$stmt -> bindParam(":monto_deuda", $datosModel["monto_deuda"], PDO::PARAM_STR);
		$stmt -> bindParam(":nboleta", $datosModel["nboleta"], PDO::PARAM_STR);
		$stmt -> bindParam(":dni_pagante", $datosModel["dni_pagante"], PDO::PARAM_INT);
		#$stmt -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	public function editarPagosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET monto_pagado = :monto_pagado, monto_deuda = :monto_deuda, nBoleta = :nBoleta, fecha_registro = NOW(), dni_pagante = :dni_pagante WHERE id_pago = :id_pago");

		$stmt -> bindParam(":monto_pagado", $datosModel["monto_pagado"], PDO::PARAM_STR);
		$stmt -> bindParam(":monto_deuda", $datosModel["monto_deuda"], PDO::PARAM_STR);
		$stmt -> bindParam(":nBoleta", $datosModel["nBoleta"], PDO::PARAM_STR);
		$stmt -> bindParam(":dni_pagante", $datosModel["dni_pagante"], PDO::PARAM_STR);
		#$stmt -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_pago", $datosModel["id_pago"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}


	public function deletePagosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='PAGADO',  monto_deuda = 0 WHERE id_pago = :id_pago");

		$stmt->bindParam(":id_pago", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	
}