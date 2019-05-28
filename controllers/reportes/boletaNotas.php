<?php 
// require_once '../fpdf/fpdf.php';
require_once "../../models/mn_misCursos.php";
require 'pdf.php';
class Reporte{
	public function verPdf(){
		$ciclo=$_GET['ciclo'];
		$cicloarray = array(1=> "I",2=>"II",3=>"III",4=>"IV",5=>"V",6=>"VI" );
		$ciclorom='';
		foreach ($cicloarray as $key => $lis) {
			if ($ciclo==$key) {
				$ciclorom=$lis;	
			}
		}
		$codUser=$_GET['usuario'];
		$carrera=$_GET['carrera'];
		$result=MisCursosModel::listDetallNotas('notas',$ciclo,$codUser);
		$nombres='';
		foreach ($result as $list) {
			$nombres=$list['nombres'];
		}
		$pdf = new FPDF();
		$pdf->AddPage();
		
        $pdf->SetTitle("Boleta De Notas");
		$pdf->SetLeftMargin(10);
		$pdf->SetRightMargin(10);
		$pdf->SetFillColor(37, 158, 241);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetY(0);
		$pdf->Cell(30);
        $pdf->SetFont('Arial','B',15);
        // Movernos a la derecha
        $pdf->Cell(80);
        // Título
        $pdf->Image('../../views/images/mini.png',20,5,20);
		$pdf->Image('../../views/images/logo-Addis.png',130,5,60);
		$pdf->Ln(11);
		$pdf->Cell(190,10,'','B',0,'C');
		$pdf->Ln(15);
        $pdf->Cell(200,5,'BOLETA DE NOTAS',0,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(15);
        $pdf->Cell(22,5,'CODIGO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(50,5,$_GET['codigo'],1,0,'C');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,5,'ALUMNO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(163,5,utf8_decode($nombres),'B',0,'L');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(55,5,'CARRERA PROFESIONAL:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(95,5,utf8_decode($carrera),'B',0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,5,'CICLO:',0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(15,5,$ciclorom,'B',0,'C');
        // Salto de línea
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,5,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(130,5,'UNIDADES DIDACTICAS',1,0,'C');
        $pdf->Cell(15,5,'CREDITO',1,0,'C');
        $pdf->Cell(25,5,'NOTA',1,0,'C');
        $notas = array('id' => 12 );

        $pdf->Ln(5);
		$contar=1;
		$pdf->SetFont('Arial','',9);
		$total_credito=0.00;
		$total_promedio=0.00;
		$cn=0;
        foreach ($result as $listarnotas) {
        	$pdf->Cell(15,5,$contar,1,0,'C');
        	$pdf->Cell(130,5,$listarnotas['curso'],1,0,'L');
        	$pdf->Cell(15,5,$listarnotas['credito'],1,0,'C');
        	$pdf->Cell(25,5,$listarnotas['promedio'],1,0,'C');

        	$pdf->Ln(5);
        	$total_credito+=$listarnotas['credito'];
        	$total_promedio+=$listarnotas['promedio'];
        	$cn++;
        	$contar++;
        }
        for ($i=0; $i < 4; $i++) { 
    		$pdf->Cell(15,5,$contar,1,0,'C');
        	$pdf->Cell(130,5,'',1,0,'L');
        	$pdf->Cell(15,5,'',1,0,'C');
        	$pdf->Cell(25,5,'',1,0,'C');
        	$contar++;
        	$pdf->Ln(5);
    	}
        $pdf->Ln(0);
        $pdf->Cell(115);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,5,'TOTAL CREDITOS',0,0,'R');
        $pdf->Cell(15,5,$total_credito,1,0,'C');
        
        $pdf->Ln(10);
        $pdf->Cell(115);
		$pdf->Cell(30,5,'PROMEDIO PONDERADO',0,0,'R');
		$pdf->Cell(15,5,$total_promedio/$cn,1,0,'C');

		$pdf->Ln(15);
        $pdf->Cell(150);
		$pdf->Cell(30,5,'Direccion Academica',0,0,'C');


        $ac=$_GET['actionpdf'];
        if ($ac=='ver') {
        	$pdf->Output();
        }else if ($ac='des') {
			$pdf->Output('D','boleta notas.pdf');
        }
		
	}
	public function descargar(){
		
	}

	public function notas(){
		/*$ciclo=1;
		$codUser=2;
		$result=MisCursosModel::listDetallNotas('notas',$ciclo,$codUser);
		echo json_encode($result);*/
		$ciclo=1;
		$cicloarray = array(1=> "I",2=>"II",3=>"III",4=>"IV",5=>"V",6=>"VI" );
		$ciclorom='';
		foreach ($cicloarray as $key => $lis) {
			if ($ciclo==$key) {
				$ciclorom=$lis;	
			}
		}
	}
	
}
$controllers= new Reporte();
if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='verPdf') {
	 	$controllers ->verPdf();
	}else if($action=="descargar"){
	  	$controllers->descargar();
	}else if ($action=='notas') {
		$controllers->notas();
	}
}
?>