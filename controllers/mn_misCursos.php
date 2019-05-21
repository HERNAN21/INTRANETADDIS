<?php

class MisCursosController
{

#Obtener todo los ciclos 
  #--------------------------------------------------------------------------------
  public function getCiclosAlumnoController()
  {

      $idAlumno = $_SESSION["cod_usuario"];
      $respuesta = MisCursosModel::getCiclosAlumnoModel("ciclo", $idAlumno);

      foreach ($respuesta as $row => $item) {
          echo '
              <option value="' . $item["idCiclo"] . '">' . $item["deslar"] .' - ' . $item["descor"] . '</option>
          ';
      }

  }

# Obtener los ciclos y notas  
  #-------------------------------------------------------------------------------------
    public function getCursosAlumnosController($datos){

    	$respuestaCiclos = MisCursosModel::getCursosAlumnosModel($datos, "cursos");

      //$respuestaNotas = MisCursosModel::getNotasAlumnosModel($datos, "notas");

      //$array =  array('ciclos' => $respuestaCiclos , 'notas' => $respuestaNotas );

      echo json_encode($respuestaCiclos);

    }

#Obtener los pagos
  #---------------------------------------------------------------------------------------
    public function getCuentasAlumnosController($datos){
      
      $respuesta = MisCursosModel::getCuentasAlumnosController($datos, "cuenta");

      echo json_encode($respuesta);

    }

#Obtener el record de notas
    #--------------------------------------------------------------------------------------
    public function dataEncabezadoRecorNotasController(){

      $idAlumno = $_SESSION["cod_usuario"];
      $respuesta = MisCursosModel::dataEncabezadoRecorNotasModel($idAlumno, "matricula");

          echo '<div class="row clearfix" style="margin-bottom: -30px;">
          <div class="col-lg-1">
                       <label>Alumno(a): </label>
          </div>
          <div class="col-lg-5">
              <p> &nbsp; &nbsp;' . $respuesta["nombre"].'</p>
          </div>
          <div class="col-lg-3">
                       <label>codigo:</label>
          </div>
          <div class="col-lg-3">
              <p> ' . $respuesta["cod_unicoMatricula"] . '</p>
          </div>
      </div>
      <div class="row clearfix" style="margin-bottom: -30px;">
          <div class="col-lg-1">
                       <label>Programa:</label>
          </div>
          <div class="col-lg-5 ">
                  <p> &nbsp; &nbsp;' . $respuesta["deslar"] . '</p>
          </div>
          <div class="col-lg-3">
                       <label for="nomApell">Resumen de Créditos:</label>
          </div>
          <div class="col-lg-3">
              <p>Aprobado 120</p>
          </div>
          <div class="col-lg-7 col-lg-offset-5">
              <p class="col-lg-8" style="font-size: 16px; color: green; margin-right: -30px;">Descarga tu record de notas</p>
              <button class="btn btn-success col-lg-4"><i class="material-icons">get_app</i> &nbsp; &nbsp;Descargar</button>
          </div>
        </div>';
        $_SESSION["idAlumno"] = $respuesta["alumno"];

    }

    public function dataCuerpoCursosController()
    {
        $codUsuario = $_SESSION["cod_usuario"];

        $idAlumno = $_SESSION["idAlumno"];

        $respuesta = MisCursosModel::dataCuerpoCiclosModel($idAlumno, $codUsuario, "alumnos");

        $rptCursos = MisCursosModel::dataCuerpoCursosController($idAlumno, "alumnos");

        foreach ($respuesta as $row => $item) {

            echo '
              <tr>
                <td class="font-15 text-left p-t-10 font-bold col-teal" style="background: rgba(.5, .5, .5, .1);" colspan="7">' . $item["deslar"] . ' ' . $item["descor"] . '</td>
                </tr>';

            foreach ($rptCursos as $rowCursos => $itemCurso) {

                if ($item["id_ciclo"] == $itemCurso["id_ciclo"]) {

                    echo '
                    <tr style="font-size: 12px">
                        <td>' . $itemCurso["id_curso"] . '</td>
                        <td class="align-left">' . $itemCurso["deslar"] . '</td>
                        <td>6</td>
                        <td>' . $itemCurso["credito"] . '</td>
                        <td>18</td>
                        <td> <span class="label bg-green">  Aprobado</span></td>
                    </tr>';
                }
            }

        }

    }

}
