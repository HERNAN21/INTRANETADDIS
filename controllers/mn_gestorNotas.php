<?php 

class gestorNotasController{

#  Obtener las carreras 
  #------------------------------------------------------------------------------------
  public function getCarrerasController(){

    $cod_usuario = $_SESSION["cod_usuario"];

    $respuesta = gestorNotasModel::getCarrerasModel($cod_usuario, "carreras");

    foreach ($respuesta as $row => $item) {
      echo '
          <option value=" ' . $item["id_carrera"] . ' ">' . $item["deslar"] . '</option>
      ';
    }

  }

#Obtener los Ciclos
  #-----------------------------------------------------------------------------------
  public function getCiclosController($datos){

    $respuesta = gestorNotasModel::getCiclosModel("ciclo", $datos);

    $json = array();

    foreach ($respuesta as $row => $item) {
      $json[] = array(
        'id_ciclo' => $item['id_ciclo'],
        'descor' => $item['descor'],
        'deslar' => $item['deslar'],
      );
    }

    $jsonString = json_encode($json);

    echo $jsonString;

  }
#  Obtener las Secciones 
  #------------------------------------------------------------------------------------
  public function getSeccionController(){

    $respuesta = gestorNotasModel::getSeccionModel("seccion");

        foreach ($respuesta as $row => $item) {
          echo '
            <option value=" '.$item["id_seccion"].' ">' .$item["descripcion"]. '</option>
          ';
        }

  }

# Obtener los Cursos 
  #--------------------------------------------------------------------------------------
  public function getCursosController($datos){

    #$idUsuario = $_SESSION["cod_usuario"];

    $respuesta = gestorNotasModel::getCursosModel($datos, "cursos");

     /* foreach ($respuesta as $row => $item) {
        echo '
          <option value="'.$item["id_curso"].'">'.$item["deslar"].'</option>
        ';
      }*/
    // echo '</select> <input type="hidden" value="'.$item["credito"].'" id="credito">' ;

  }

#Listado de tipo de notas
  #----------------------------------------------------------------------------------------
  public function getTnotasController(){

    $respuesta = gestorNotasModel::getTnotasModel("tipo_nota");

    foreach ($respuesta as $row => $item) {
        echo '
          <option value="'.$item["id_tNota"].'">'.$item["deslar"].'</option>
        ';
      }

  }

#Obtener encabezado de los cursos
  #----------------------------------------------------------------------------------------
  public function getAlumnosController($datosController){

      $respuesta = gestorNotasModel::getAllAlumnosModel($datosController, "alumnos");
        
        foreach ($respuesta as $row => $item) {
            echo '
            <tr>
              <td>'.$item{"id_alumno"}.'</td>
              <td class="align-left">'.$item{"nombres"}.' ' .$item{"ape_paterno"}. ' ' . $item{"ape_materno"} . '</td>
              <td>'.$item{"dni"}.'</td>
              <td>18</td>
              <td><span class="label bg-green">Aprobado</span></td>
              <td>
                <button class="btn btn-primary btn-xs" onclick="verRegistroNotas('.$item{"id_alumno"}.')"> <i class="material-icons">search</i>verRegistro</button>
              </td>
            </tr>';
        }
  }

# Obtener las notas de los Alumnos
  #-----------------------------------------------------------------------------------------
  public function getNotasAlumnosController($datosController){

    $respuesta = gestorNotasModel::getNotasAlumnosModel($datosController, " notas");

    foreach ($respuesta as $row => $item) {
      echo '
      <tr idNota="'.$item["id_nota"].'">
          <td>'.$item["deslar"].'</td>
          <td>'.$item["fecha"].'</td>
          <td>'.$item["porcentaje"].' %</td>';
            if($item["nota"] > 13){
              echo '<td style="color: #1f91f3;">'.$item["nota"].'</td>';
            }else{
               echo '<td style="color: red;">'.$item["nota"].'</td>';
            }
          echo' <td>
              <button class="btn-editar-Notas btn btn-xs btn-primary"><i class="material-icons">edit</i></button>
              <button class="btn-eliminar btn btn-xs btn-danger"><i class="material-icons">delete</i></button>
          </td>
        </tr>
      ';
    }

  }

#INSERTAR NOTAS 
  #--------------------------------------------------------------------------------------------------

  public function insertNotasController($datosController){

    $respuesta = gestorNotasModel::insertNotasModel($datosController, "notas");

    if ($respuesta = "ok"){

      echo "Guardado";

    }else {

      echo "Error";
      
    }

  }

#ACTUALIZAR NOTAS
  #-------------------------------------------------------------------------------------------------------

  public function dataUpdateNotasController($datosController){

    $respuesta = gestorNotasModel::dataUpdateNotasModel($datosController, "notas");

    $json = array();

    foreach ($respuesta as $row => $item) {

      $json[] = array( "id_nota" => $item["id_nota"] ,
                                "id_alumno" => $item["id_alumno"] ,
                                "id_ciclo" => $item["id_ciclo"] ,
                                "id_curso" => $item["id_curso"] ,
                                "deslar" => $item["deslar"] ,
                                "nota" => $item["nota"] ,
                                "porcentaje" => $item["porcentaje"] ,
                                "fecha" => $item["fecha"] 
       );

    }

    $jsonstring = json_encode($json[0]);

    echo $jsonstring;

  }

  public function updateNotasController($datosController){

    // var_dump( $datosController);

    $respuesta = gestorNotasModel::updateNotasModel($datosController, "notas");

     if ($respuesta = "ok"){

      echo "Actualizado";

    }else {

      echo "Error";

    }

  }


#ELIMINAR NOTAS
  #-------------------------------------------------------------------------------------------------------
  public function deleteNotasController($datosController){

    $respuesta = gestorNotasModel::deleteNotasModel($datosController, "notas");

     if ($respuesta = "ok"){

      echo "Eliminado";

    }else {

      echo "Error";

    }

  }

}

