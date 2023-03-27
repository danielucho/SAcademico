<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$persona_id = $_GET['id'];

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

#Historial de materias incritas del estudiante

#verificar si ya esta en una carrera
$sentencia = $pdo -> prepare("SELECT count(*) as 'x'
FROM pertenece_carrera PC 
JOIN carrera C 
JOIN estudiante E
JOIN persona P
ON PC.estudiante_id = E.id AND PC.carrera_id = C.id AND P.id = E.persona_id
WHERE P.id = :persona_id");
$sentencia -> bindParam(':persona_id', $persona_id);
$sentencia -> execute();
$existeInscripcion = $sentencia->fetch(PDO::FETCH_ASSOC);

#para las carreras (no salen las que ya tiene inscritas)
if($existeInscripcion['x'] != 0 ){
    #para las carreras (salen las que ya tiene inscritas)
    $sentencia = $pdo -> prepare("SELECT * FROM carrera WHERE id  IN(
        SELECT C.id as 'carrera_id'
        FROM pertenece_carrera PC 
        JOIN carrera C 
        JOIN estudiante E
        JOIN persona P
        ON PC.estudiante_id = E.id AND PC.carrera_id = C.id AND P.id = E.persona_id
        WHERE P.id = :persona_id
        )");
    $sentencia -> bindParam(':persona_id', $persona_id);
    $sentencia -> execute();
    $listaCarreras = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}else{
    #para las carreras (no salen las que ya tiene inscritas)
    $sentencia = $pdo -> prepare("SELECT * FROM carrera WHERE id NOT IN(
        SELECT C.id as 'carrera_id'
        FROM pertenece_carrera PC 
        JOIN carrera C 
        JOIN estudiante E
        JOIN persona P
        ON PC.estudiante_id = E.id AND PC.carrera_id = C.id AND P.id = E.persona_id
        WHERE P.id = :persona_id
        )");
    $sentencia -> bindParam(':persona_id', $persona_id);
    $sentencia -> execute();
    $listaCarreras = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

#para obtener la ultima matricula
$sentencia = $pdo -> prepare("SELECT matricula FROM pertenece_carrera ORDER BY id DESC LIMIT 1");
$sentencia -> execute();
$ultimaMatricula = $sentencia -> fetch(PDO::FETCH_ASSOC);
$matriculaActual = $ultimaMatricula['matricula'] + 1;

$sentencia = $pdo -> prepare("SELECT
distinct PC.id as 'id',
PC.matricula as 'matricula',
C.nombre as 'carrera',
PC.nivel as 'nivel',
PC.paralelo as 'paralelo',
I.gestion as 'gestion',
PC.semestre as 'semestre',
I.periodo as 'periodo'
FROM pertenece_carrera PC 
JOIN carrera C 
JOIN estudiante E
JOIN persona P
join inscripcion I 
join carrera_materia CM
ON PC.estudiante_id = E.id AND PC.carrera_id = C.id AND P.id = E.persona_id and I.estudiante_id =E.id  and I.carrera_materia_id = CM.id 
WHERE P.id = :persona_id");
$sentencia -> bindParam(':persona_id', $persona_id);
$sentencia -> execute();
$listaPerteneceCarrera = $sentencia->fetchAll(PDO::FETCH_ASSOC);

#obtener datos de los inputs
$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");
$carrera_id = (isset($_POST['carrera_id']) ? $_POST['carrera_id'] : "");
$semestre = (isset($_POST['semestre']) ? $_POST['semestre'] : "");
$nivel = (isset($_POST['nivel']) ? $_POST['nivel'] : "");
$paralelo = (isset($_POST['paralelo']) ? $_POST['paralelo'] : "");
$pertenece_carrera_id = (isset($_POST['pertenece_carrera_id']) ? $_POST['pertenece_carrera_id'] : "");
$matricula = (isset($_POST['matricula']) ? $_POST['matricula'] : "");

//este id es para borrar de la tabla
$id = (isset($_POST['id']) ? $_POST['id'] : "");

#VERIFICAR SI EL ESTUDIANTE ESTA HABILITADO PARA LA INSCRIPCION CARRERA
$sentencia = $pdo -> prepare("SELECT habilitar as 'habilitar' from estudiante where id= :estudiante_id");
$sentencia -> bindParam(':estudiante_id', $estudiante['estudiante_id']);
$sentencia -> execute();
$habilitar = $sentencia -> fetch(PDO::FETCH_ASSOC);


switch ($accion) {
    case 'btnEliminar':
        $sentencia = $pdo -> prepare("DELETE FROM pertenece_carrera WHERE id = :id");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> execute();
        header("Location: estudiante.carrera.php?id=$persona_id");
        break;

    case 'btnAgregar':
        $sentencia = $pdo -> prepare("INSERT INTO pertenece_carrera(id, matricula, estudiante_id, carrera_id, semestre, nivel, paralelo) VALUES (:id, :matricula, :estudiante_id, :carrera_id, :semestre, :nivel, :paralelo)");
        $sentencia -> bindParam(':id', $pertenece_carrera_id);
        $sentencia -> bindParam(':matricula', $matriculaActual);
        $sentencia -> bindParam(':estudiante_id', $estudiante['estudiante_id']);
        $sentencia -> bindParam(':carrera_id', $carrera_id);
        $sentencia -> bindParam(':semestre', $semestre);
        $sentencia -> bindParam(':nivel', $nivel);
        $sentencia -> bindParam(':paralelo', $paralelo);
        $sentencia -> execute();

        #CAMBIAMOS EL ESTADO HABILITAR A 'NO' DEL ESTUDIANTE
        $sentencia = $pdo -> prepare("UPDATE estudiante SET  habilitar='no' WHERE id = :estudiante_id");
        $sentencia -> bindParam(':estudiante_id',$estudiante['estudiante_id']);
        $sentencia -> execute();

        #echo ("mateeria ".$estudiante['estudiante_id']);
        #print_r ($sentencia);
        #print_r ($estudiante['estudiante_id']);

        #aqui se incribe a las primeras 12 materias de la carrera
        $inscripcion_id = "";
        //if($mes == "01"){$periodo = "Verano";}
        if($mes == "01" || $mes == "02" || $mes == "03" || $mes == "04" || $mes == "05" || $mes == "06"){$periodo = "I";}
        //if($mes == "07"){$periodo = "Invierno";}
        if($mes== "07" || $mes == "08" || $mes == "09" || $mes == "10" || $mes == "11" || $mes == "12"){$periodo = "II";}

        $sentencia = $pdo -> prepare("SELECT * FROM carrera_materia WHERE carrera_id = :carrera_id AND nivel = :nivel and paralelo = :paralelo ");
        $sentencia -> bindParam(':carrera_id', $carrera_id);
        //$sentencia -> bindParam(':semestre', $semestre);
        $sentencia -> bindParam(':nivel', $nivel);
        $sentencia -> bindParam(':paralelo', $paralelo);
        $sentencia -> execute();
        $listaCarreraMateria = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($listaCarreraMateria as $carreraMateria){
            $sentencia = $pdo -> prepare("INSERT INTO inscripcion(id, periodo, gestion, estudiante_id, carrera_materia_id) VALUES (:id, :periodo, :gestion, :estudiante_id, :carrera_materia_id)");
            $sentencia -> bindParam(':id', $inscripcion_id);
            $sentencia -> bindParam(':periodo', $periodo);
            $sentencia -> bindParam(':gestion', $año);
            $sentencia -> bindParam(':estudiante_id', $estudiante['estudiante_id']);
            $sentencia -> bindParam(':carrera_materia_id', $carreraMateria['id']);
            //$sentencia -> bindParam(':carrera_id', $carreraMateria['carrera_id']);
            //$sentencia -> bindParam(':semestre', $carreraMateria['semestre']);   
            $sentencia -> execute();
        }

        header("Location: estudiante.carrera.php?id=$persona_id");
        
        //echo('docente '.$docente['docente_id']);
        break;

    case 'btnMateria':
        header("Location: e.estudiante.materia.php?id=$persona_id&c=$id");
        break;
}

?>