<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
date_default_timezone_set('America/La_Paz');
$año = date("Y");
//date("d/m/Y - g:i a")

$persona_id = $_GET['id'];
$pertenece_carrera_id = $_GET['c'];

#sacando datos de la tabla pertenece_carrera
$sentencia = $pdo -> prepare("SELECT * FROM pertenece_carrera WHERE id = :id");
$sentencia -> bindParam(':id', $pertenece_carrera_id);
$sentencia -> execute();
$pertenece_carrera = $sentencia -> fetch(PDO::FETCH_ASSOC);

#sacando datos de la carrera
$sentencia = $pdo -> prepare("SELECT * FROM carrera WHERE id = :id");
$sentencia -> bindParam(':id', $pertenece_carrera['carrera_id']);
$sentencia -> execute();
$carrera = $sentencia -> fetch(PDO::FETCH_ASSOC);

#solo para sacar el id y nombre del estudiante...
$sentencia = $pdo -> prepare(" SELECT
P.id as 'persona_id',
P.nombres as 'nombre',
P.paterno as 'paterno',
P.materno as 'materno',
E.id as 'estudiante_id'
FROM persona P 
JOIN estudiante E
ON P.id = E.persona_id
WHERE P.id = :persona_id ");
$sentencia -> bindParam(':persona_id', $persona_id);
$sentencia -> execute();
$estudiante = $sentencia->fetch(PDO::FETCH_ASSOC);

#selecciono las materias de cada carrera (modificar para que no salgan las que ya tiene inscritas ni las que ya aprobó)
#ya esta (PERO HACER LAS PRUEBAS CORRESPONDIENTES !!!!!)
$sentencia = $pdo -> prepare("SELECT 
CM.id as 'carrera_materia_id',
CM.semestre as 'semestre',
C.nombre as 'carrera',
M.id as 'materia_id',
M.cod_materia as 'cod_materia',
M.nombre as 'materia'
FROM carrera_materia CM 
JOIN carrera C
JOIN materia M 
ON CM.carrera_id = C.id AND CM.materia_id = M.id
WHERE M.id NOT IN (
    SELECT
    I.materia_id
    FROM inscripcion I
    WHERE I.estudiante_id = :estudiante_id AND I.carrera_id = :carrera_id)");
$sentencia -> bindParam(':estudiante_id', $estudiante['estudiante_id']);
$sentencia -> bindParam(':carrera_id', $pertenece_carrera['carrera_id']);
$sentencia -> execute();
$listaMaterias = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

#para los datos de la tabla (mejorar)
$sentencia = $pdo -> prepare("SELECT 
I.id as 'id',
I.periodo as 'periodo',
I.gestion as 'gestion',
M.nombre as 'materia'
FROM inscripcion I 
JOIN estudiante E
JOIN carrera C
JOIN materia M
ON I.estudiante_id = E.id AND I.materia_id = M.id AND I.carrera_id = C.id
WHERE I.estudiante_id = :estudiante_id AND I.carrera_id = :carrera_id");
$sentencia -> bindParam(':estudiante_id', $pertenece_carrera['estudiante_id']);
$sentencia -> bindParam(':carrera_id', $pertenece_carrera['carrera_id']);
$sentencia -> execute();
$listaInscripciones = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

#obtener datos de los inputs
$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$inscripcion_id = (isset($_POST['inscripcion_id']) ? $_POST['inscripcion_id'] : "");
$periodo = (isset($_POST['periodo']) ? $_POST['periodo'] : "");
$gestion = (isset($_POST['gestion']) ? $_POST['gestion'] : "");
$materia_id = (isset($_POST['materia_id']) ? $_POST['materia_id'] : "");

//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

#VERIFICAR SI EL ESTUDIANTE ESTA HABILITADO PARA LA INSCRIPCION DE LAS MATERIAS
$sentencia = $pdo -> prepare("SELECT estado as 'estado' from pertenece_carrera where id= :pertenece_carrera_id");
$sentencia -> bindParam(':pertenece_carrera_id',$pertenece_carrera_id);
$sentencia -> execute();
echo $pertenece_carrera_id."----";
$estado = $sentencia -> fetch(PDO::FETCH_ASSOC);

switch ($accion) {

    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM inscripcion WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();
        header("Location: estudiante.materia.php?id=$persona_id&c=$pertenece_carrera_id");
        break;

    case 'btnAgregar':
        $sentencia = $pdo -> prepare("INSERT INTO inscripcion(id, periodo, gestion, estudiante_id, materia_id, carrera_id) VALUES (:id, :periodo, :gestion, :estudiante_id, :materia_id, :carrera_id)");
        $sentencia -> bindParam(':id', $inscripcion_id);
        $sentencia -> bindParam(':periodo', $periodo);
        $sentencia -> bindParam(':gestion', $gestion);
        $sentencia -> bindParam(':estudiante_id', $pertenece_carrera['estudiante_id']);
        $sentencia -> bindParam(':materia_id', $materia_id);
        $sentencia -> bindParam(':carrera_id', $pertenece_carrera['carrera_id']);
        $sentencia -> execute();
        header("Location: estudiante.materia.php?id=$persona_id&c=$pertenece_carrera_id");

        //echo $inscripcion_id."-".$periodo."-".$gestion."-".$pertenece_carrera['estudiante_id']."-".$materia_id;
        break;
        case 'btnInscribir':
            #CAMBIAMOS TABLA pertenece_carrera EL estado = 'activo' DEL ESTUDIANTE SI ACEPTA
            $sentencia = $pdo -> prepare("UPDATE pertenece_carrera SET  estado='activo' WHERE id = :pertenece_carrera_id");
            $sentencia -> bindParam(':pertenece_carrera_id',$pertenece_carrera_id);
            $sentencia -> execute();
            header("Location: estudiante.materia.php?id=$persona_id&c=$pertenece_carrera_id");
            break;
            case 'btnNota':
                //header("Location: docente.notas.php?id=$persona_id&a=$id");
                header("Location: docente.notas.php?id=$persona_id&a=$asignacion_id&i=$id&pc=$pertenece_carrera_id");
                   
                   //header("Location: d.docente.estudiantes.php?id=$persona_id&a=$id");
                   break;
}

?>