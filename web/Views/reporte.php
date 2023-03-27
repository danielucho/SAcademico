<?php
include("../Global/conexion.php");
include ("../Global/plantillapdf.php");
$sql = "select m.nombre , m.cod_materia  from materia m";
$resultado = $pdo->query($sql);
/*
$sentencia = $pdo->prepare("INSERT INTO materia(id, nombre, cod_materia, descripcion) VALUES (:id, :nombre, :cod_materia, :descripcion)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':nombre', $nombre);
        $sentencia -> bindParam(':cod_materia', $cod_materia);
        $sentencia -> bindParam(':descripcion', $descripcion);
        $sentencia -> execute();
*/

$pdf = new PDF("P", "mm","Letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();
$pdf->Ln(2);
$pdf->SetFont("Arial", "B", 9);
$pdf->Cell(80, 5, "Nombre", 1, 0, "C");
$pdf->Cell(50, 5, "Codigo", 1, 1, "C");

while($fila = $resultado->fetch()){
   
    $pdf->Cell(80, 5, $fila['nombre'], 1, 0, "C");
    $pdf->Cell(50, 5, $fila['cod_materia'], 1, 1, "C");
}
$pdf->Output();

?>
