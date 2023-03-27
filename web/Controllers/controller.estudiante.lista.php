<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
/*
$sentencia = $pdo -> prepare("");
$sentencia -> execute();
$listaDocentes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
*/

$sentencia = $pdo -> prepare("SELECT	

P.id as 'id',
P.ci as 'ci',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
P.celular as 'celular',
P.foto as 'foto',
E.observacion as 'observacion',
U.username as 'username',
p.correo as 'correo'

FROM persona P
JOIN estudiante E
JOIN usuario U

ON P.id = E.persona_id AND P.id = U.persona_id");
$sentencia -> execute();
$listaEstudiantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnGestionar':
        header("Location: estudiante.carrera.php?id=$id");
        break;

    case 'btnEditar':
        header("Location: estudiante.edit.php?id=$id");
        break;
    
    case 'btnEliminar':
        
        $sentencia = $pdo -> prepare("DELETE FROM usuario WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM estudiante WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: estudiante.lista.php");
        
        break;
}

?>