<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$id = (isset($_POST['id'])? $_POST['id'] : "");
$nombre = (isset($_POST['nombre'])? $_POST['nombre'] : "");
$cod_carrera = (isset($_POST['cod_carrera'])? $_POST['cod_carrera'] : "");
$tipo_carrera = (isset($_POST['tipo_carrera'])? $_POST['tipo_carrera'] : "");
$nivel_carrera = (isset($_POST['nivel_carrera'])? $_POST['nivel_carrera'] : "");
$duracion = (isset($_POST['duracion'])? $_POST['duracion'] : "");

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {
    case 'btnAgregar':
        $sentencia = $pdo->prepare("INSERT INTO carrera(id, nombre, cod_carrera, tipo_carrera, nivel_carrera, duracion) VALUES (:id, :nombre, :cod_carrera, :tipo_carrera, :nivel_carrera, :duracion)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':nombre', $nombre);
        $sentencia -> bindParam(':cod_carrera', $cod_carrera);
        $sentencia -> bindParam(':tipo_carrera', $tipo_carrera);
        $sentencia -> bindParam(':nivel_carrera', $nivel_carrera);
        $sentencia -> bindParam(':duracion', $duracion);
        $sentencia -> execute();
        
        //mandar directo a añadir materias, pero por ahora solo aqui
        header("Location: carrera.lista.php");
        break;

    case 'btnCancelar':
        header("Location: carrera.lista.php");
        break;
}


?>