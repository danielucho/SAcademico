<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$id = $_GET['id'];

$sentencia = $pdo -> prepare("SELECT * FROM materia WHERE id = :id");
$sentencia -> bindParam(':id', $id);
$sentencia -> execute();
$materia = $sentencia->fetch(PDO::FETCH_ASSOC);

$nombre1 = $materia['nombre'];
$cod_materia1 = $materia['cod_materia'];
$descripcion1 = $materia['descripcion'];

$nombre =  mb_strtoupper($nombre1);
$cod_materia =  mb_strtoupper($cod_materia1);
$descripcion =  mb_strtoupper($descripcion1);


$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnModificar':

        $nombre = (isset($_POST['nombre'])? $_POST['nombre'] : "");
        $cod_materia = (isset($_POST['cod_materia'])? $_POST['cod_materia'] : "");
        $descripcion = (isset($_POST['descripcion'])? $_POST['descripcion'] : "");
        
        $sentencia = $pdo->prepare("UPDATE materia SET nombre=:nombre, cod_materia=:cod_materia, descripcion=:descripcion WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':nombre', $nombre);
        $sentencia -> bindParam(':cod_materia', $cod_materia);
        $sentencia -> bindParam(':descripcion', $descripcion);
        $sentencia -> execute();

        header("Location: materia.lista.php");
        break;

    case 'btnCancelar':
        header("Location: materia.lista.php");
        break;
}


?>