<?php 

class gestorAsistenciaController{

#---------OBTENER CURSOS------------------------------------------------------
  public function getSelectCursosMostrarController($datosController){

    $respuesta=gestorAsistenciaModel::getSelectCursosMostrarModel($datosController,"cursos");

    // var_dump($respuesta);

    foreach ($respuesta as $row => $item) {
      echo '
        <option value="'.$item["id_curso"].'">'.$item["deslar"].'</option>
      ';
    }
    
  }

  #---------OBTENER LISTA ASISTENCIA--------------------------------------------
  public function getAllAsistenciaController($datos){
    $respuesta=gestorAsistenciaModel::getAllAsistenciaModel($datos,"asistencia");
    if (empty($respuesta)) {
      echo '<h5 style="color:red;">NO HAY DATOS</h5>';
    }else{
      foreach ($respuesta as $row => $item) {
        echo '<tr idAsistencia="'.$item["id_asistencia"].'">
                <td>'.$item["cod_unicomatricula"].'</td>
                <td>'.$item["alumno"].'</td>
                <td>'.$item["dni"].'</td>
                <td>'.$item["fecha"].'</td>
                <td>'.$item["hora"].'</td>
                <td>
                  <button class="btn btn-danger btn-eliminarAsist btn-xs"><i class="material-icons">delete</i></button>
                </td>
            </tr>';
      }
    }
  }

#---------LISTA DE ALUMNOS----------------------------------------------------
  public function getAllAlumnos($datos){
    $fecha_actual=date("d/m/Y");
    $respuesta = gestorAsistenciaModel::getAllAlumnosModel($datos,"alumnos");
    if (empty($respuesta)) {
      echo '<h5 style="color:#EC9770;">NO SE ENCONTRO REGISTRO</h5>';
    }else {
      foreach ($respuesta as $row => $value) {
        echo '
          <tr>
            <td>
                <input type="checkbox" name="check" id="chk1'.$value["id"].'" class="filled-in" value="'.$value["id"].'"/>
                <label for="chk1'.$value["id"].'"></label>
            </td>
            <td>'.$value["id"].'</td>
            <td>'.$value["nombres"].'</td>
            <td>'.$value["dni"].'</td>
            <td>'.$fecha_actual.'</td>
          </tr>
        ';
      }
    }
  }

#---------INSERTAR DE ALUMNOS-----------------------------------------------
	public function insertarAsistenciaController($datosAlumnos){
		$respuesta = gestorAsistenciaModel::insertarAsistenciaModel($datosAlumnos,"asistencia");
		if ($respuesta == "ok") {
		echo "Guardo";
		}else {
		echo "Error";
		}
	}

  #---------ELIMINAR ASISTENCIA-------------------------------------------------
  public function deleteAsistenciaController($datosDel){
    $respuesta = gestorAsistenciaModel::deleteAsistenciaModel($datosDel,"asistencia");
    if ($respuesta = "ok") {
      echo "Eliminado";
    }else{
      echo "Error";
    }
  }

}