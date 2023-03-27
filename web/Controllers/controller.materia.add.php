<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$id = (isset($_POST['id'])? $_POST['id'] : "");
$nombre1 = (isset($_POST['nombre'])? $_POST['nombre'] : "");
$cod_materia1 = (isset($_POST['cod_materia'])? $_POST['cod_materia'] : "");
$descripcion = (isset($_POST['descripcion'])? $_POST['descripcion'] : "");

$nombre =  mb_strtoupper($nombre1);
$cod_materia =  mb_strtoupper($cod_materia1);

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':
       
        $sentencia = $pdo->prepare("INSERT INTO materia(id, nombre, cod_materia, descripcion) VALUES (:id, :nombre, :cod_materia, :descripcion)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':nombre', $nombre);
        $sentencia -> bindParam(':cod_materia', $cod_materia);
        $sentencia -> bindParam(':descripcion', $descripcion);
        $sentencia -> execute();
        
        //mandar directo a añadir materias, pero por ahora solo aqui
        header("Location: materia.lista.php");
        break;

    case 'btnCancelar':
        header("Location: materia.lista.php");
        break;
        case 'btnCancelar':
            header("Location: materia.lista.php");
            break;
             case 'btnCancelar':
        header("Location: materia.lista.php");
        break;
        case 'btnCancelar':
            header("Location: materia.lista.php");
            break;
            case 'btnpdfGenera':
                header("Location: reporte.php");
                break;
            
}


?>