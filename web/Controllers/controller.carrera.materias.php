<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$carrera_id = $_GET['id'];

$sentencia = $pdo->prepare("SELECT 
    CM.id as 'id',
    CM.nivel as 'nivel',
    CM.paralelo as 'paralelo',
    CM.semestre as 'semestre',
    M.nombre as 'materia',
    M.cod_materia as 'cod_materia',
    CM.dia as 'dia',
    CM.hora_inicio as 'hora_inicio',
    CM.hora_fin as 'hora_fin'
    FROM carrera_materia CM 
    JOIN carrera C
    JOIN materia M
    ON CM.carrera_id = C.id AND CM.materia_id = M.id
    WHERE CM.carrera_id = :carrera_id
    ORDER BY CM.semestre");
$sentencia ->bindParam(':carrera_id', $carrera_id);
$sentencia->execute();
$listaCarreraMaterias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $pdo->prepare("SELECT * FROM carrera WHERE id = :id");
$sentencia -> bindParam(':id', $carrera_id);
$sentencia -> execute();
$carrera = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $pdo->prepare("SELECT * FROM materia");
$sentencia -> execute();
$listaMaterias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$nivel1 = (isset($_POST['nivel']) ? $_POST['nivel'] : "");
$paralelo1 = (isset($_POST['paralelo']) ? $_POST['paralelo'] : "");
$semestre = (isset($_POST['semestre']) ? $_POST['semestre'] : "");
$materia_id = (isset($_POST['materia_id']) ? $_POST['materia_id'] : "");
$dia =  (isset($_POST['dia']) ? $_POST['dia'] : "");
$hora_inicio =  (isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : "");
$hora_fin =  (isset($_POST['hora_fin']) ? $_POST['hora_fin'] : "");

$nivel =  mb_strtoupper($nivel1);
$paralelo =  mb_strtoupper($paralelo1);


$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

switch ($accion) {
    case 'btnEditar':
        header("Location: carrera.materias.edit.php?id=$id&carrera_id=$carrera_id");
        break;

    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM carrera_materia WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();

        header("Location: carrera.materias.php?id=$carrera_id");
        break;

    case 'btnAgregar':
        $id_cm = "";
        $sentencia = $pdo -> prepare("INSERT INTO carrera_materia(id, nivel,paralelo, semestre, carrera_id, materia_id, dia, hora_inicio, hora_fin) VALUES (:id, :nivel,:paralelo, :semestre, :carrera_id, :materia_id, :dia, :hora_inicio, :hora_fin)");
        $sentencia -> bindParam(':id', $id_cm);
        $sentencia -> bindParam(':nivel', $nivel);
        $sentencia -> bindParam(':paralelo', $paralelo);
        $sentencia -> bindParam(':semestre', $semestre);
        $sentencia -> bindParam(':carrera_id', $carrera_id);
        $sentencia -> bindParam(':materia_id', $materia_id);
        $sentencia -> bindParam(':dia', $dia);
        $sentencia -> bindParam(':hora_inicio', $hora_inicio);
        $sentencia -> bindParam(':hora_fin', $hora_fin);
        $sentencia -> execute();
        //echo "semestre ".$semestre;
        //echo "hora_inicio ".$hora_inicio;
        //echo "dia ".$dia;

        header("Location: carrera.materias.php?id=$carrera_id");
        break;

}

?>