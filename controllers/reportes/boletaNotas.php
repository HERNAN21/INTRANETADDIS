<?php 
// require_once '../fpdf/fpdf.php';
require 'pdf.php';
class Reporte{
	public function verPdf(){
		$pdf = new FPDF();

		$pdf->AddPage();
		

		
        $pdf->SetFont('Arial','B',15);
        // Movernos a la derecha
        $pdf->Cell(80);
        // Título
        $pdf->Image('../../views/images/mini.png',20,15,20);
		$pdf->Image('../../views/images/logo-Addis.png',130,15,60);
		$pdf->Ln(11);
		$pdf->Cell(190,10,'','B',0,'C');
		$pdf->Ln(20);
        $pdf->Cell(30,10,'Title',1,0,'C');
        // Salto de línea
        $pdf->Ln(20);
        $pdf->SetTitle("Boleta De Notas");
		$pdf->SetLeftMargin(10);
		$pdf->SetRightMargin(10);
		$pdf->SetFillColor(37, 158, 241);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetY(0);
		$pdf->Cell(30);
		
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