<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
        // Cabecera de página
        function Header()
        {
            $this->Image('logo-tienda.png',5,5,30);
            // Arial bold 15
            $this->SetFont('Arial','B',25);
            // Título
            $this->Cell(200,20,'Productos en Inventario',0,0,'C');
            // Salto de línea
            $this->Ln(40);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('pagina').$this->PageNo().'/{nb}',0,0,'C');
        }
}

include_once "bd.php";

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B','10');
$pdf->Cell(20);
$pdf->Cell(20, 10,'Clave', 1, 0,'C',1);
$pdf->Cell(40, 10,'Item', 1, 0,'C',1);
$pdf->Cell(25, 10,'Proveedor', 1, 0,'C',1);
$pdf->Cell(35, 10,'Stock', 1, 0,'C',1);
$pdf->Cell(30, 10,'Precio Compra', 1, 1,'C',1);


$sentencia = $base_de_datos->query("SELECT * FROM productos,proveedores WHERE productos.id_proveedor = proveedores.id_proveedor;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ); 
foreach($productos as $producto){ 

$pdf->Cell(20);
$pdf->Cell(20, 7,$producto->codigo, 1, 0,'C');
$pdf->Cell(40, 7,$producto->item, 1, 0,'C');
$pdf->Cell(25, 7,$producto->nombre, 1, 0,'C');
$pdf->Cell(35, 7,$producto->stock, 1, 0,'C');
$pdf->Cell(30, 7,$producto->precioVenta, 1, 1,'C');

}


$pdf->Output();

?>


