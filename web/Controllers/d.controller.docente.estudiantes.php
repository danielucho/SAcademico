<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
$persona_id = $_GET['id'];
//echo "persona_id docente_estdait ".$persona_id;
$asignacion_id = $_GET['a'];

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

#consulta para sacar todos los ids de la asignacion, si es posible tambien los nombres
$sentencia = $pdo -> prepare("SELECT 
A.id as 'asignacion_id',
C.id as 'carrera_id',
C.nombre as 'carrera',
M.id as 'materia_id',
M.nombre as 'materia'
FROM asignacion A 
JOIN carrera C ON A.carrera_id = C.id
JOIN materia M ON A.materia_id = M.id
WHERE A.id = :id");
$sentencia -> bindParam(':id', $asignacion_id);
$sentencia -> execute();
$asignacion = $sentencia -> fetch(PDO::FETCH_ASSOC);

#para mostrar en la tabla (prueba), hacer una super consulta
/*$sentencia = $pdo -> prepare("SELECT
I.id as 'inscripcion_id',
P.id as 'persona_id',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
I.estudiante_id as 'estudiante',
A.carrera_id as 'carrera',
A.materia_id as 'materia'
FROM asignacion A 
JOIN inscripcion I ON I.materia_id = A.materia_id AND I.carrera_id = A.carrera_id
JOIN estudiante E ON I.estudiante_id = E.id
JOIN persona P ON E.persona_id = P.id
WHERE A.docente_id = :docente_id AND A.carrera_id = :carrera_id AND A.materia_id = :materia_id");
$sentencia -> bindParam(':docente_id', $docente['docente_id']);
$sentencia -> bindParam(':carrera_id', $asignacion['carrera_id']);
$sentencia -> bindParam(':materia_id', $asignacion['materia_id']);
$sentencia -> execute();
$listaAlumnos = $sentencia->fetchAll(PDO::FETCH_ASSOC);*/

#para mostrar en la tabla (prueba), hacer una super consulta
$sentencia = $pdo -> prepare("SELECT
I.id as 'inscripcion_id',
P.id as 'persona_id',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
I.estudiante_id as 'estudiante',
A.carrera_id as 'carrera',
A.materia_id as 'materia'
FROM asignacion A 
JOIN inscripcion I
join carrera_materia CM on I.carrera_materia_id = CM.id and CM.carrera_id = A.carrera_id and CM.materia_id = A.materia_id 
JOIN estudiante E ON I.estudiante_id = E.id
JOIN persona P ON E.persona_id = P.id
WHERE A.docente_id = :docente_id AND A.carrera_id = :carrera_id AND A.materia_id = :materia_id AND I.id NOT IN (
SELECT I.id
FROM asignacion A 
JOIN inscripcion I
join carrera_materia CM on I.carrera_materia_id = CM.id and CM.carrera_id = A.carrera_id and CM.materia_id = A.materia_id 
JOIN estudiante E ON I.estudiante_id = E.id
JOIN persona P ON E.persona_id = P.id
JOIN nota N ON N.inscripcion_id = I.id
WHERE A.docente_id = :docente_id AND A.carrera_id = :carrera_id AND A.materia_id = :materia_id)");
$sentencia -> bindParam(':docente_id', $docente['docente_id']);
$sentencia -> bindParam(':carrera_id', $asignacion['carrera_id']);
$sentencia -> bindParam(':materia_id', $asignacion['materia_id']);
$sentencia -> execute();
$listaAlumnos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

#para mostrar en la tabla los que ya estan calificados...
$sentencia = $pdo -> prepare("SELECT
I.id as 'inscripcion_id',
P.id as 'persona_id',
P.nombres as 'nombres',
P.paterno as 'paterno',
P.materno as 'materno',
I.estudiante_id as 'estudiante',
A.carrera_id as 'carrera',
A.materia_id as 'materia',
N.nota as 'nota',
N.observacion as 'observacion',
if(N.nota > 50, 'Aprobado', 'Reprobado') as 'estado',
if(N.nota > 50, 'success', 'danger') as 'badge'
FROM asignacion A 
JOIN inscripcion I
join carrera_materia CM on I.carrera_materia_id = CM.id and CM.carrera_id = A.carrera_id and CM.materia_id = A.materia_id 
JOIN estudiante E ON I.estudiante_id = E.id
JOIN persona P ON E.persona_id = P.id
JOIN nota N ON N.inscripcion_id = I.id
WHERE A.docente_id = :docente_id AND A.carrera_id = :carrera_id AND A.materia_id = :materia_id");
$sentencia -> bindParam(':docente_id', $docente['docente_id']);
$sentencia -> bindParam(':carrera_id', $asignacion['carrera_id']);
$sentencia -> bindParam(':materia_id', $asignacion['materia_id']);
$sentencia -> execute();
$listaAlumnosNota = $sentencia->fetchAll(PDO::FETCH_ASSOC);


#obtener datos de los inputs
$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnEditar':
        header("Location: d.docente.notas.edit.php?id=$persona_id&a=$asignacion_id&i=$id");
        break;
    
    case 'btnNota':
        header("Location: d.docente.notas.php?id=$persona_id&a=$asignacion_id&i=$id");
        break;
}

?>