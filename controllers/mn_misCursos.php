<?php



class MisCursosController
{
  private $errores;
#Obtener todo los ciclos 
  #--------------------------------------------------------------------------------
  public function getCiclosAlumnoController()
  {

      require_once "../models/mn_misCursos.php";
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
      if (isset($_POST['validar'])==true) {
          require_once "../models/mn_misCursos.php";
          $data = new stdClass();
          $this->errores="Lista Vacia";
          // $idAlumno = $_SESSION["cod_usuario"];
          $idAlumno=$_POST['alumno'];
          $result = MisCursosModel::dataEncabezadoRecorNotasModel($idAlumno, "matricula");
          if ($result!=null) {
              $data->respuesta='success';
              $data->listado=$result;
          }else{
              $data->errores=$this->errores;
          }
          echo json_encode($data);
      }
    }

    public function listSummaryNotas(){
      if (isset($_POST['validar'])==true) {
        require_once "../models/mn_misCursos.php";
        $data= new stdClass();
        $idAlumno=$_POST['alumno'];
        $result = MisCursosModel::listSummaryNotas('notas',$idAlumno);
        if ($result!=null) {
            $data->respuesta='success';
            $data->listado=$result;
        }else{
          $data->respuesta='vacio';
        }
        echo json_encode($data);
      }
    }


    public function listDetallNotas(){
        if (isset($_POST['validar'])==true) {
          $data = new stdClass();
          require_once "../models/mn_misCursos.php";
          $ciclo=$_POST['ciclo'];
          $codUser=$_POST['alumno'];
          $result=MisCursosModel::listDetallNotas('notas',$ciclo,$codUser);
          if ($result!=null) {
              $data->respuesta='success';
              $data->listado=$result;
          }else{
            $data->respuesta='error';
            $data->errores='Lista Vacia';
          }
          echo json_encode($data);
        }
    }



    public function test(){
        echo 'hola';
    }


}




$controllers= new MisCursosController();

if (isset($_GET['action'])) {
   $action=$_GET['action'];

   if ($action=='test') {
     $controllers ->test();
   }else if($action=="cabecera"){
      $controllers->dataEncabezadoRecorNotasController();
   }else if($action=="listSummaryNotas"){
    $controllers->listSummaryNotas();
   }else if ($action=='detallesNota') {
     $controllers->listDetallNotas();
   }





}
