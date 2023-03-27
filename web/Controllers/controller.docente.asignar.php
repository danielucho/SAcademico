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

#para mostrar la carrrera y la materia que pertenece a esa carrera
$sentencia = $pdo -> prepare("SELECT
M.id as 'materia_id',
M.nombre as 'materia',
C.id as 'carrera_id',
C.nombre as 'carrera',
CM.nivel as 'nivel',
CM.paralelo as 'paralelo',
CM.semestre as 'semestre'
FROM carrera_materia CM 
JOIN carrera C 
JOIN materia M 
ON CM.carrera_id = C.id AND CM.materia_id = M.id");
$sentencia -> execute();
$listaMaterias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
$materiaCarrera_id = (isset($_POST['materiaCarrera_id']) ? $_POST['materiaCarrera_id'] : "");
$observacion = (isset($_POST['observacion']) ? $_POST['observacion'] : "");
$asignacion_id = (isset($_POST['asignacion_id']) ? $_POST['asignacion_id'] : "");


//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {

    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM asignacion WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: docente.asignar.php?id=$persona_id");
        break;

    case 'btnAgregar':
        $ids = explode("-", $materiaCarrera_id);
        $materia_id = $ids[0];
        $carrera_id = $ids[1];
        //$semestre_id=$ids[2];
        $resultado=$pdo->prepare("SELECT EXISTS (SELECT * FROM asignacion WHERE carrera_id=:carrera_id and materia_id=:materia_id and docente_id=:docente_id);");
        $resultado -> bindParam(':materia_id', $materia_id);
        $resultado -> bindParam(':carrera_id', $carrera_id);
        $resultado -> bindParam(':docente_id', $docente['docente_id']);
        $resultado->execute();
        $count = $resultado->fetchColumn();
       // echo("carrera ".$carrera_id);
        //echo("mateeria ".$materia_id);
        //echo('docente '.$docente['docente_id']);
        if ($count>0) {                 
                //Aqui colocas el código que tu deseas realizar cuando el dato existe en la base de datos
                $errorLogin="materia ya asignada";
        }else{
            //Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos
            $sentencia = $pdo -> prepare("INSERT INTO asignacion(id, observacion, carrera_id, materia_id, docente_id) VALUES(:id, :observacion, :carrera_id, :materia_id, :docente_id)");
            $sentencia -> bindParam(':id', $asignacion_id);
            $sentencia -> bindParam(':observacion', $observacion);
            $sentencia -> bindParam(':carrera_id', $carrera_id);
            $sentencia -> bindParam(':materia_id', $materia_id);
            $sentencia -> bindParam(':docente_id', $docente['docente_id']);
            $sentencia -> execute();
            header("Location: docente.asignar.php?id=$persona_id");
            break;
        } 
       
}

?>