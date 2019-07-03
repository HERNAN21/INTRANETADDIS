<?php 
// require_once '../fpdf/fpdf.php';
require_once "../../models/mn_misCursos.php";

require 'pdf.php';
class ReportePago{

	public function boleta_pago(){
		
		$pdf = new FPDF();
		$pdf->AddPage();
		
        $pdf->SetTitle("Boleta De Pago");
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
        $pdf->Image('../../views/images/logo-Addis.png',15,5,50);
		
		$pdf->Ln(11);
		$pdf->Cell(190,10,'','B',0,'C');
		$pdf->Ln(15);
        $pdf->Cell(200,5,'BOLETA DE PAGO',0,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(15);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,5,'ALUMNO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(163,5,'HROJAS','B',0,'L');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(55,5,'CARRERA PROFESIONAL:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(95,5,'ADMIN','B',0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,5,'CICLO:',0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(15,5,'I','B',0,'C');
        // Salto de línea
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,5,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(130,5,'CONCEPTO',1,0,'C');
        $pdf->Cell(15,5,'PRE UNI',1,0,'C');
        $pdf->Cell(25,5,'TOTAL',1,0,'C');
        $notas = array('id' => 12 );

        $pdf->Ln(5);
		$contar=1;
		$pdf->SetFont('Arial','',9);
		$total_credito=0.00;
		$total_promedio=0.00;
		$cn=0;
        /*foreach ($result as $listarnotas) {
        	$pdf->Cell(15,5,$contar,1,0,'C');
        	$pdf->Cell(130,5,$listarnotas['curso'],1,0,'L');
        	$pdf->Cell(15,5,$listarnotas['credito'],1,0,'C');
        	$pdf->Cell(25,5,$listarnotas['promedio'],1,0,'C');

        	$pdf->Ln(5);
        	$total_credito+=$listarnotas['credito'];
        	$total_promedio+=$listarnotas['promedio'];
        	$cn++;
        	$contar++;
        }*/
        for ($i=0; $i < 4; $i++) { 
    		$pdf->Cell(15,5,$contar,1,0,'C');
        	$pdf->Cell(130,5,'',1,0,'L');
        	$pdf->Cell(15,5,'',1,0,'C');
        	$pdf->Cell(25,5,'',1,0,'C');
        	$contar++;
        	$pdf->Ln(5);
    	}

        $pdf->Ln(0);
        $pdf->Cell(130);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,5,'IGV 18%',0,0,'R');
        $pdf->Cell(25,5,$total_credito,1,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(130);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,5,'SUB TOTAL S/',0,0,'R');
        $pdf->Cell(25,5,$total_credito,1,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(130);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,5,'TOTAL S/',0,0,'R');
        $pdf->Cell(25,5,$total_credito,1,0,'C');
        /*$pdf->Ln(10);
        $pdf->Cell(115);
		$pdf->Cell(30,5,'PROMEDIO PONDERADO',0,0,'R');
		$pdf->Cell(15,5,$total_promedio/$cn,1,0,'C');*/

		$pdf->Ln(15);
        $pdf->Cell(150);
		$pdf->Cell(30,5,'Direccion Academica',0,0,'C');
        $pdf->Output();
	}
	

	
}
$controllers= new ReportePago();
if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='boleta_pago') {
	 	$controllers->boleta_pago();
	}else if($action=="descargar"){
	  	
	}
}
?>