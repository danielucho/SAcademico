<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$persona_id = $_GET['idP'];

//sacar el codigo de la persona
$sentencia = $pdo -> prepare("SELECT * FROM persona WHERE id = :id");
$sentencia -> bindParam(':id', $persona_id);
$sentencia -> execute();
$persona = $sentencia->fetch(PDO::FETCH_ASSOC);
$codigo = $persona['paterno'][0].$persona['materno'][0].$persona['nombres'][0].$persona['nacimiento'][8].$persona['nacimiento'][9].$persona['nacimiento'][5].$persona['nacimiento'][6].$persona['nacimiento'][2].$persona['nacimiento'][3];
//hasta aqui

$id = (isset($_POST['id'])? $_POST['id'] : "");
$rol = (isset($_POST['rol'])? $_POST['rol'] : "");
$observacion = (isset($_POST['observacion'])? $_POST['observacion'] : "");

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':
       
        $sentencia = $pdo->prepare("INSERT INTO kardixta(id, rol, codigo, persona_id, observacion) VALUES (:id, :rol, :codigo, :persona_id, :observacion)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':rol', $rol);
        $sentencia -> bindParam(':codigo', $codigo);
        $sentencia -> bindParam(':persona_id', $persona_id);
        $sentencia -> bindParam(':observacion', $observacion);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("SELECT id FROM kardixta ORDER BY id DESC LIMIT 1");
        $sentencia -> execute();
        $kardixta = $sentencia->fetch(PDO::FETCH_ASSOC);
        $kardixta_id = $kardixta['id'];
        
        header("Location: kardixta.add2.php?idP=$persona_id&idK=$kardixta_id");
        break;

    case 'btnCancelar':
        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $persona_id);
        $sentencia -> execute();

        header("Location: kardixta.lista.php");
        break;
}


?>