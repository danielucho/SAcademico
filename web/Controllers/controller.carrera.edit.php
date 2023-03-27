<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");



$id = $_GET['id'];

$sentencia = $pdo -> prepare("SELECT * FROM carrera WHERE id = :id");
$sentencia -> bindParam(':id', $id);
$sentencia -> execute();
$carrera = $sentencia->fetch(PDO::FETCH_ASSOC);

$nombre = $carrera['nombre'];
$cod_carrera = $carrera['cod_carrera'];
$tipo_carrera = $carrera['tipo_carrera'];
$nivel_carrera = $carrera['nivel_carrera'];
$duracion = $carrera['duracion'];

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnModificar':

        $nombre = (isset($_POST['nombre'])? $_POST['nombre'] : "");
        $cod_carrera = (isset($_POST['cod_carrera'])? $_POST['cod_carrera'] : "");
        $tipo_carrera = (isset($_POST['tipo_carrera'])? $_POST['tipo_carrera'] : "");
        $nivel_carrera = (isset($_POST['nivel_carrera'])? $_POST['nivel_carrera'] : "");
        $duracion = (isset($_POST['duracion'])? $_POST['duracion'] : "");

        //echo "----------------------------------".$nombre." -".$cod_carrera." -".$tipo_carrera." -".$nivel_carrera." -".$duracion;
        
        $sentencia = $pdo->prepare("UPDATE carrera SET nombre=:nombre, cod_carrera=:cod_carrera, tipo_carrera=:tipo_carrera, nivel_carrera=:nivel_carrera, duracion=:duracion WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':nombre', $nombre);
        $sentencia -> bindParam(':cod_carrera', $cod_carrera);
        $sentencia -> bindParam(':tipo_carrera', $tipo_carrera);
        $sentencia -> bindParam(':nivel_carrera', $nivel_carrera);
        $sentencia -> bindParam(':duracion', $duracion);
        $sentencia -> execute();

        header("Location: carrera.lista.php");
        break;

    case 'btnCancelar':
        header("Location: carrera.lista.php");
        break;
}


?>