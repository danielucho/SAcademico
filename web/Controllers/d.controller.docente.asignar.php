<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
$persona_id = $_GET['id'];

#solo para sacar el id y nombre del docente...
$sentencia = $pdo -> prepare(" SELECT
P.id as 'persona_id',
P.nombres as 'nombre',
P.paterno as 'paterno',
P.materno as 'materno',
D.id as 'docente_id'
FROM persona P 
JOIN docente D
ON P.id = D.persona_id
WHERE P.id = :persona_id ");
$sentencia -> bindParam(':persona_id', $persona_id);
$sentencia -> execute();
$docente = $sentencia->fetch(PDO::FETCH_ASSOC);

#para mostrar en la tabla (prueba), hacer una super consulta
$sentencia = $pdo -> prepare("SELECT
A.id as 'asignacion_id',
A.observacion as 'observacion',
C.nombre as 'carrera',
M.nombre as 'materia',
CM.nivel as 'nivel',
CM.paralelo as 'paralelo'
FROM asignacion A 
JOIN carrera C
JOIN materia M 
JOIN carrera_materia CM
ON A.carrera_id = C.id AND A.materia_id = M.id AND A.carrera_id = CM.carrera_id AND A.materia_id = CM.materia_id
WHERE A.docente_id = :docente_id");
$sentencia -> bindParam(':docente_id', $docente['docente_id']);
$sentencia -> execute();
$listaAsignaciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

#obtener datos de los inputs
$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM asignacion WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();
        header("Location: docente.asignar.php?id=$persona_id");
        break;
    
    case 'btnGestionar':
        header("Location: d.docente.estudiantes.php?id=$persona_id&a=$id");
        break;
}

?>