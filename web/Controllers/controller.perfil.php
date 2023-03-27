<?php 
include("../Global/sesiones.php");
include("../Global/conexion.php");
$persona_id = $_GET['id'];

#solo para sacar el id y nombre del docente...
$sentencia = $pdo -> prepare("SELECT * FROM persona WHERE id = :id");
$sentencia -> bindParam(':id', $id);
$sentencia -> execute();
$persona = $sentencia->fetch(PDO::FETCH_ASSOC);



?>