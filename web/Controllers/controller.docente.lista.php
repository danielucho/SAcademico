<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$sentencia = $pdo -> prepare("SELECT 
P.id as 'id',
P.ci as 'ci',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
P.celular as 'celular',
P.foto as 'foto',
D.tipo as 'tipo',
U.username as 'username'

FROM persona P
JOIN docente D
JOIN usuario U

ON P.id = D.persona_id AND P.id = U.persona_id");
$sentencia -> execute();
$listaDocentes = $sentencia->fetchAll(PDO::FETCH_ASSOC);


$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnEditar':
       header("Location: docente.edit.php?id=$id");
        break;

    case 'btnAsignar':
        header("Location: docente.asignar.php?id=$id");
        break;
    
    case 'btnEliminar':
        
        $sentencia = $pdo -> prepare("DELETE FROM usuario WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM docente WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: docente.lista.php");
        
        break;
}

?>