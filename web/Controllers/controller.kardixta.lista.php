<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$sentencia = $pdo -> prepare("SELECT
P.id as 'id',
P.foto as 'foto',
P.nombres as 'nombre',
P.paterno as 'paterno',
P.materno as 'materno',
P.celular as 'celular',
K.rol as 'rol',
K.observacion as 'observacion',
U.username as 'username'

FROM persona P 
JOIN kardixta K 
JOIN usuario U

ON P.id=K.persona_id AND P.id=U.persona_id");
$sentencia -> execute();
$listaKardixtas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnEditar':
        header("Location: kardixta.edit.php?id=$id");
        break;
    
    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM usuario WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM kardixta WHERE persona_id = :persona_id");
        $sentencia -> bindParam(':persona_id', $id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: kardixta.lista.php");
        break;
}

?>