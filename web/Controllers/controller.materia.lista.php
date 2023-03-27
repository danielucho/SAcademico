<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$sentencia = $pdo->prepare("SELECT * FROM materia");
$sentencia -> execute();
$listaMaterias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {
    case 'btnContenido':
        //abrir una especie de modal para mostrar el contenido de la materia, o en todo caso un pdf
        break;

    case 'btnEditar':
        header("Location: materia.edit.php?id=$id");
        break;

    case 'btnEliminar':

        $sentencia = $pdo->prepare("DELETE FROM materia WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: materia.lista.php");
        break;
}

?>