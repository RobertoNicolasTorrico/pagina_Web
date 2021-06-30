<?php
require_once('fpdf182/fpdf.php');
require_once('conexionBaseDatos.php');

$con = ConexionBaseDatos();
$id_producto=$_REQUEST['variable'];
$Resul_Pro = $con-> query(BuscarProducto($id_producto));
$producto = mysqli_fetch_array($Resul_Pro);

// Creación del objeto 

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// Encabezado de página

    // Logo
	$pdf->Image('../../img/logos/logo-zonagamer.png',10,8,33);
	// Arial bold 15
	$pdf->SetFont('Arial','B',20);
	// Movernos a la derecha
	$pdf->Cell(60);
	// Título
	$pdf->Cell(60,10,'Detalles del producto',0,0,'E');
	// Salto de línea
	$pdf->Ln(100);

// Cuerpo de la página
	$pdf->SetFont('Arial','B',13);
	$pdf->Image('../../'.$producto['foto'],60,40,100);
	$pdf->Cell(0,10,  'Nombre del producto: '.$producto['nombre'],0,1);
	$pdf->Cell(0,10,  'Marca del producto: '.$producto['marca'],0,1);
	$pdf->Cell(0,10,  'Precio del producto: $'.$producto['precio'],0,1);
	$pdf->Cell(0,10,  'Descripcion del producto: '.$producto['descripcion'],0,1);
	
   

// Pie de página

	// Posición: a 1,5 cm del final
	$pdf->SetY(266);
	// Arial italic 8
	$pdf->SetFont('Arial','I',8);
	// Número de página
	$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');

// Salida
    $pdf->Output();

?>
