<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
$id = $_GET['id'];
//echo $id;
if (!isset($id)) {
    header('Location: docente.add.php?mensaje=error');
    $errorEdit = "vuelve a intentar";
}

$sentencia = $pdo->prepare("SELECT * from persona WHERE id =:id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$docente = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($estudiante);



$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
switch ($accion) {
    case 'btnModificar':
        //$id = (isset($_POST['id']) ? $_POST['id'] : "");
        $ci = (isset($_POST['ci']) ? $_POST['ci'] : "");
        $paterno = (isset($_POST['paterno']) ? $_POST['paterno'] : "");
        $materno = (isset($_POST['materno']) ? $_POST['materno'] : "");
        $nombres = (isset($_POST['nombres']) ? $_POST['nombres'] : "");
        $celular = (isset($_POST['celular']) ? $_POST['celular'] : "");
        $nacimiento = (isset($_POST['nacimiento']) ? $_POST['nacimiento'] : "");
        $direccion = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
        $foto = (isset($_POST['foto']) ? $_POST['foto'] : "");
        $estado = "SI";

        $paterno_may =  mb_strtoupper($paterno);
        $materno_may =  mb_strtoupper($materno);
        $nombres_may =  mb_strtoupper($nombres);
        $direccion_may =  mb_strtoupper($direccion);
       
        $sentencia = $pdo->prepare("UPDATE persona SET ci=:ci, paterno=:paterno, materno=:materno, nombres=:nombres, celular=:celular, nacimiento=:nacimiento, direccion=:direccion, foto=:foto, estado=:estado WHERE id=:id");
        //print_r($pdo);
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':ci', $ci);
        $sentencia->bindParam(':paterno', $paterno_may);
        $sentencia->bindParam(':materno', $materno_may);
        $sentencia->bindParam(':nombres', $nombres_may);
        $sentencia->bindParam(':celular', $celular);
        $sentencia->bindParam(':nacimiento', $nacimiento);
        $sentencia->bindParam(':direccion', $direccion_may);
        $sentencia->bindParam(':foto', $foto);
        $sentencia->bindParam(':estado', $estado);
       //print_r($sentencia);
        //print_r("holaaa");
        $sentencia->execute();
        header("Location: kardixta.lista.php");
        break;

    case 'btnCancelar':
        header("Location: kardixta.lista.php");
        break;
}
