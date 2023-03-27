<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");
$id = $_GET['id'];
$carrera_id = $_GET['carrera_id'];
if (!isset($id)) {
    header('Location: estudiante.add.php?mensaje=error');
    $errorEdit = "vuelve a intentar";
}

$sentencia = $pdo->prepare("select * from carrera_materia cm
inner join materia m on m.id =cm.materia_id 
where cm.id =:id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$carrera_materia = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($estudiante);



$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
switch ($accion) {
    case 'btnModificar':
        
        //$id = (isset($_POST['id']) ? $_POST['id'] : "");
        $semestre = (isset($_POST['semestre']) ? $_POST['semestre'] : "");
        //echo "semetre".$semestre;
        $dia = (isset($_POST['dia']) ? $_POST['dia'] : "");
        $hora_inicio = (isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : "");
        $hora_fin = (isset($_POST['hora_fin']) ? $_POST['hora_fin'] : "");
 
        $sentencia = $pdo->prepare("UPDATE sistema.carrera_materia
        SET semestre=:semestre, dia=:dia, hora_inicio=:hora_inicio, hora_fin=:hora_fin
        WHERE id=:id");
        //$sentencia = $pdo->prepare("UPDATE persona SET ci=:ci, paterno=:paterno, materno=:materno, nombres=:nombres, celular=:celular, nacimiento=:nacimiento,correo=:correo, direccion=:direccion, foto=:foto, estado=:estado WHERE id=:id");
        //print_r($pdo);
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':semestre', $semestre);
        $sentencia->bindParam(':dia', $dia);
        $sentencia->bindParam(':hora_inicio', $hora_inicio);
        $sentencia->bindParam(':hora_fin', $hora_fin);
       //print_r($pdo);
        //print_r("holaaa");
        $sentencia->execute();
        header("Location: carrera.materias.php?id=$carrera_id");
        break;

    case 'btnCancelar':
        header("Location: carrera.materias.php?id=$carrera_id");
        break;
}
