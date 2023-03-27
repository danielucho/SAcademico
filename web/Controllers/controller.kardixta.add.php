<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$id = (isset($_POST['id'])? $_POST['id'] : "");
$ci = (isset($_POST['ci'])? $_POST['ci'] : "");
$paterno = (isset($_POST['paterno'])? $_POST['paterno'] : "");
$materno = (isset($_POST['materno'])? $_POST['materno'] : "");
$nombres = (isset($_POST['nombres'])? $_POST['nombres'] : "");
$celular = (isset($_POST['celular'])? $_POST['celular'] : "");
$nacimiento = (isset($_POST['nacimiento'])? $_POST['nacimiento'] : "");
$direccion = (isset($_POST['direccion'])? $_POST['direccion'] : "");
$foto = (isset($_POST['foto'])? $_POST['foto'] : "");
$estado = "SI";

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':

        $paterno_may =  mb_strtoupper($paterno);
        $materno_may =  mb_strtoupper($materno);
        $nombres_may =  mb_strtoupper($nombres);
        $direccion_may =  mb_strtoupper($direccion);

        $sentencia = $pdo->prepare("INSERT INTO persona(id, ci, paterno, materno, nombres, celular, nacimiento, direccion, foto, estado) 
        VALUES (:id, :ci, :paterno, :materno, :nombres, :celular, :nacimiento, :direccion, :foto, :estado)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':ci', $ci);
        $sentencia -> bindParam(':paterno', $paterno_may);
        $sentencia -> bindParam(':materno', $materno_may);
        $sentencia -> bindParam(':nombres', $nombres_may);
        $sentencia -> bindParam(':celular', $celular);
        $sentencia -> bindParam(':nacimiento', $nacimiento);
        $sentencia -> bindParam(':direccion', $direccion_may);
        $sentencia -> bindParam(':foto', $foto);
        $sentencia -> bindParam(':estado', $estado);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("SELECT id FROM persona ORDER BY id DESC LIMIT 1");
        $sentencia -> execute();
        $persona = $sentencia->fetch(PDO::FETCH_ASSOC);
        $persona_id = $persona['id'];
        
        header("Location: kardixta.add1.php?idP=$persona_id");
        break;

    case 'btnCancelar':
        header("Location: kardixta.lista.php");
        break;
}


?>