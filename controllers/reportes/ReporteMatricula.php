<?php 
// require_once '../fpdf/fpdf.php';
require_once "../../models/ms_gestorMatriculaRpt.php";

require 'pdf.php';
class Reporte{
	public function verPdf($action){
		$carrera=$_GET['carrera']; 
		$ciclo=$_GET['ciclo'];
		$semestre=$_GET['semestre'];
		$seccion=$_GET['seccion'];
		$result =GestorMatriculaRpt::getRptMatricular($carrera, $ciclo, $semestre,$seccion);
		$cicloarray = array(1=> "I",2=>"II",3=>"III",4=>"IV",5=>"V",6=>"VI" );
		$ciclorom='';
		foreach ($cicloarray as $key => $lis) {
			if ($ciclo==$key) {
				$ciclorom=$lis;	
			}
		}
		$espe='';
		$seccion='';
		foreach ($result as $lis) {
			$espe=$lis['deslar'];
			$seccion=$lis['descripcion'];
		}
		$total=count($result);
		
		$pdf = new FPDF();
		// $pdf->AddPage('P','A4');
		$pdf->AddPage('L','A4');
		
        $pdf->SetTitle("Reporte Consolidado de Matricula");
		$pdf->SetLeftMargin(10);
		$pdf->SetRightMargin(10);
		$pdf->SetFillColor(37, 158, 241);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetY(0);
		$pdf->Cell(30);
        $pdf->SetFont('Arial','B',15);
        // Movernos a la derecha
        $pdf->Cell(10);
        // Título
        $pdf->Image('../../views/images/mini.png',10,7,15);
		$pdf->Image('../../views/images/logo-Addis.png',245,10,40);
		$pdf->Ln(11);
        $pdf->Cell(275,5,'REPORTE CONSOLIDADO DE MATRICULA',0,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(275,5,'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO DE ADDIS',0,0,'C');
        $pdf->Ln(0);
		$pdf->Cell(275,5,'','B',0,'C');
		$pdf->Ln(12);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,5,'ESPECIALIDAD:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(100,5,utf8_decode($espe),'B',0,'L');
        
        $pdf->Cell(5);
        $pdf->Cell(12,5,'CICLO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,5,$ciclorom,'B',0,'C');
        $pdf->Cell(5);

        $pdf->Cell(20,5,utf8_decode('SECCIÓN:'),0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,5,utf8_decode($seccion),'B',0,'C');
        $pdf->Cell(5);
        $pdf->Cell(33,5,utf8_decode('TOTAL DE ALUMNOS:'),0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,5,$total,'B',0,'C');

        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(20,5,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(60,5,'CODIGO',1,0,'C');
        $pdf->Cell(40,5,'DNI',1,0,'C');
        $pdf->Cell(155,5,'NOMBRES Y APELLIDOS',1,0,'C');
        $notas = array('id' => 12 );

        $pdf->Ln(5);
		$contar=1;
		$pdf->SetFont('Arial','',9);
		$total_credito=0.00;
		$total_promedio=0.00;
		$cn=0;
		$pdf->SetFont('Arial','',8);
		foreach ($result as $listado) {
			$pdf->Cell(20,5,$contar,1,0,'C');
        	$pdf->Cell(60,5,$listado['cod_unicoMatricula'],1,0,'L');
        	$pdf->Cell(40,5,$listado['dni'],1,0,'C');
        	$pdf->Cell(155,5,utf8_decode($listado['nombres'].', '.$listado['ape_paterno'].' '.$listado['ape_materno']),1,0,'L');
        	$pdf->Ln(5);
        	$contar++;
		}
		
        if ($action=='verPdfMatricula') {
        	$pdf->Output();
        }else if ($action='descargar') {
			$pdf->Output('D','Reporte Consolidado de Matricula.pdf');
        }
	}


	public function test(){
		$respuesta =GestorMatriculaRpt::getRptMatricular($carrera=1, $ciclo=1, $semestre=1);
		// getRptMatricular
		echo json_encode($respuesta);
	}
	
	
}
$controllers= new Reporte();
if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='verPdfMatricula') {
	 	$controllers ->verPdf($action);
	}else if($action=="descargarMatricula"){
	  	$controllers->descargar();
	}else if ($action=='test') {
		$controllers->test();
	}
}
?>