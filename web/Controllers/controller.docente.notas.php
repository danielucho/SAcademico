<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
$persona_id = $_GET['id'];
$asignacion_id = $_GET['a'];
$inscripcion_id = $_GET['i'];
$pertenece_carrera_id = $_GET['pc'];

#saco id del estudiante
$sentencia = $pdo -> prepare("SELECT * FROM inscripcion WHERE id = :id");
$sentencia -> bindParam(':id', $inscripcion_id);
$sentencia -> execute();
$inscripcion = $sentencia -> fetch(PDO::FETCH_ASSOC);

#PARA MOTRAR LA NOTA DEL ESTUDIANTE
$sentencia = $pdo -> prepare("SELECT 
N.nota as 'nota',
N.observacion as 'observacion'
FROM nota N
WHERE N.inscripcion_id=:inscripcion_id ");
$sentencia -> bindParam(':inscripcion_id', $inscripcion_id);
$sentencia -> execute();
$MostrarNota = $sentencia -> fetch(PDO::FETCH_ASSOC);
echo "assad".$inscripcion_id;

#solo para sacar el id y nombre del docente...
$sentencia = $pdo -> prepare("SELECT DISTINCT
P.id as 'persona_id',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
E.id as 'estudiante_id'
FROM persona P 
JOIN estudiante E ON P.id = E.persona_id
JOIN inscripcion I ON E.id = I.estudiante_id
WHERE I.estudiante_id = :estudiante_id");
$sentencia -> bindParam(':estudiante_id', $inscripcion['estudiante_id']);
$sentencia -> execute();
$estudiante = $sentencia->fetch(PDO::FETCH_ASSOC);

#obtener datos de los inputs
$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$nota_id = (isset($_POST['nota_id']) ? $_POST['nota_id'] : "");
$nota = (isset($_POST['nota']) ? $_POST['nota'] : "");
$observacion = (isset($_POST['observacion']) ? $_POST['observacion'] : "");

switch ($accion) {
    case 'btnCancelar':
        header("Location: d.docente.estudiantes.php?id=$persona_id&a=$asignacion_id");
        break;
    
    case 'btnAceptar':
        header("Location: estudiante.materia.php?id=$persona_id&c=$pertenece_carrera_id");

        #header("Location: d.docente.estudiantes.php?id=$persona_id&a=$asignacion_id");
        //echo "-------------------------------------------------------------------------".$nota_id."*".$nota."*".$observacion."".$inscripcion['id'];
        break;
}

?>