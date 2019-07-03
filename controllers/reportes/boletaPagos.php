<?php 
require_once "../../models/mn_misCursos.php";
require "pdf.php";
class reportesPagos{

	public function verPdf(){

		$cuenta = $_GET['id'];
		$respuesta = MisCursosModel::dataDetalleCuentasModel($cuenta, 'pagos');
		$datos = array();
		foreach ($respuesta as $row => $item) {
			$datos = array('cod' => $item['cod_unicoMatricula'],
									'alumno' => $item['alumno'],
									'carrera' => $item['carrera'],
									'ciclo' => $item['ciclo'],
									'concepto' => $item['concepto'],
									'monto' => $item['monto']);
			break;
		}

		$deuda = array();
		foreach ($respuesta as $row => $item) {
			$deuda = array('montoDeuda' => $item['monto_deuda']);
		}

		$pdf = new FPDF();
		$pdf -> AddPage();

		$pdf -> SetTitle("INFORME DE PAGOS");
		$pdf -> SetLeftMargin(10);
		$pdf -> SetRightMargin(10);
		$pdf-> SetFillColor(37, 158, 241);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetY(0);
		$pdf -> Cell(30);
		$pdf -> SetFont('Arial', 'B', 15);
		// Movernos a la derecha
		$pdf -> Cell(80);
		// Encabezado
		$pdf -> Image('../../views/images/encabezado pdf.png',15,10,100);
		$pdf -> Ln(11);
		$pdf -> Cell(190, 10, '', 'B', 0, 'C');
		$pdf -> Ln(15);
		$pdf -> Cell(200,10,'INFORME DE PAGO',0,0,'C');
		$pdf -> SetFont('Arial', 'B', 10);
		$pdf -> Ln(15);
		$pdf -> Cell(22,5,'CODIGO:',0,0,'L');
		 $pdf->SetFont('Arial','',9);
        $pdf->Cell(50,5,$datos['cod'],1,0,'C');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,5,'ALUMNO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(163,5,$datos['alumno'],'B',0,'L');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,5,'CARRERA PROFESIONAL:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(100,5,utf8_decode($datos['carrera']),'B',0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,5,'CICLO:',0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(15,5,$datos['ciclo'],'B',0,'C');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,5,'CONCEPTO:',0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60,5,utf8_decode($datos['concepto']),'B',0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,5,'MONTO:',0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,5,'S/. '.$datos['monto'],'B',0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,5,'DEUDA:',0,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,5, 'S/. '.$deuda['montoDeuda'],'B',0,'C');
        // Salto de línea
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,7,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(70,7,'PAGANTE',1,0,'C');
        $pdf->Cell(40,7,utf8_decode('RECIBO N°'),1,0,'C');
        $pdf->Cell(40,7,'FECHA',1,0,'C');
        $pdf->Cell(25,7,'MONTO S/.',1,0,'C');

        $pdf->Ln(7);
        $pdf->SetFont('Arial','',10);
        $contar = 1;
        foreach ($respuesta as $row => $item) {
        	$pdf -> Cell(10,7,$contar,1,0,'C');
        	$pdf -> Cell(70,7,$item['alumno'],1,0,'L');
        	$pdf -> Cell(40,7,$item['nBoleta'],1,0,'C');
        	$pdf -> Cell(40,7,$item['fecha_registro'],1,0,'C');
        	$pdf -> Cell(25,7,$item['monto_pagado'],1,0,'C');
        	$pdf -> Ln(7);
        	$contar++;
        }

        $pdf->Ln(15);
        $pdf->Cell(150);
        $pdf->SetFont('Arial','B',9);
		$pdf->Cell(30,5,utf8_decode('OFICINA DE TESORERÍA'),0,0,'C');
		
		$ac = $_GET["actionpdf"];
		if($ac == "verBoleta"){
			$pdf -> output();
		}


	}

} 

$reportes = new reportesPagos();
if(isset($_GET["action"])){
	$action = $_GET["action"];
	if($action == 'verPdfBoleta'){
		$reportes -> verPdf();
	}
}
?>
