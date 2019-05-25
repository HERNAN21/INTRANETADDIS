<?php 
// require_once '../fpdf/fpdf.php';
require 'pdf.php';
class Reporte{
	public function verPdf(){
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
        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(15);
        $pdf->Cell(22,5,'CODIGO:',0,0,'L');
        $pdf->Cell(30,5,'',1,0,'L');
        $pdf->Ln(8);
        $pdf->Cell(22,5,'ALUMNO:',0,0,'L');
        $pdf->Cell(163,5,'','B',0,'L');
        $pdf->Ln(8);
        $pdf->Cell(55,5,'CARRERA PROFESIONAL:',0,0,'L');
        $pdf->Cell(95,5,'','B',0,'L');
        $pdf->Cell(20,5,'CICLO:',0,0,'C');
        $pdf->Cell(15,5,'','B',0,'L');
        // Salto de línea
        $pdf->Ln(15);
        $pdf->Cell(15,5,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(115,5,'UNIDADES DIDACTICAS',1,0,'C');
        $pdf->Cell(25,5,'CREDITO',1,0,'C');
        $pdf->Cell(30,5,'NOTA',1,0,'C');
        
		$pdf->Output();
		
	}

	public function descargar(){

		
	}
	


}





$controllers= new Reporte();

if (isset($_GET['action'])) {
	$action=$_GET['action'];

	if ($action=='verPdf') {
	 	$controllers ->verPdf();
	}else if($action=="descargar"){
	  	$controllers->descargar();
	}

}

?>