<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$sentencia = $pdo->prepare("SELECT * FROM carrera");
$sentencia -> execute();
$listaCarreras = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {
    case 'btnAsignar':
        header("Location: carrera.materias.php?id=$id");
        break;
    
    case 'btnEditar':
        header("Location: carrera.edit.php?id=$id");
        break;
    
    case 'btnEliminar':

        //FALTA ELIMINAR MATERIAS DE LA CARRERA

        $sentencia = $pdo->prepare("DELETE FROM carrera WHERE id = :id");
        $sentencia->bindParam(":id", $id);
        $sentencia->execute();
        $listaCarreras = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        header("Location: carrera.lista.php");
        break;
}

?>