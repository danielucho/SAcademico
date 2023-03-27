<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$persona_id = $_GET['idP'];

//sacar el codigo de la persona
$sentencia = $pdo -> prepare("SELECT * FROM persona WHERE id = :id");
$sentencia -> bindParam(':id', $persona_id);
$sentencia -> execute();
$persona = $sentencia->fetch(PDO::FETCH_ASSOC);

$username = $persona['paterno'][0].$persona['materno'][0].$persona['nombres'][0].$persona['nacimiento'][8].$persona['nacimiento'][9].$persona['nacimiento'][5].$persona['nacimiento'][6].$persona['nacimiento'][2].$persona['nacimiento'][3];
//hasta aqui

$estudiante_id = (isset($_POST['estudiante_id'])? $_POST['estudiante_id'] : "");
$usuario_id = (isset($_POST['usuario_id'])? $_POST['usuario_id'] : "");
$observacion = (isset($_POST['observacion'])? $_POST['observacion'] : "");
$password = (isset($_POST['password'])? $_POST['password'] : "");
$password2 = (isset($_POST['password2'])? $_POST['password2'] : "");

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':

        if($password == $password2){

            $sentencia = $pdo -> prepare("INSERT INTO estudiante(id, persona_id, observacion) VALUES (:id, :persona_id, :observacion)");
            $sentencia -> bindParam(':id', $estudiante_id);
            $sentencia -> bindParam(':persona_id', $persona_id);
            $sentencia -> bindParam(':observacion', $observacion);
            $sentencia -> execute();

            $sentencia = $pdo -> prepare("INSERT INTO usuario(id, username, password, persona_id) VALUES (:id, :username, :password, :persona_id)");
            $sentencia -> bindParam(':id', $usuario_id);
            $sentencia -> bindParam(':username', $username);
            $sentencia -> bindParam(':password', $password);
            $sentencia -> bindParam(':persona_id', $persona_id);
            $sentencia -> execute();

            //header("Location: estudiante.lista.php");
            header("Location: estudiante.carrera.php?id=$persona_id");
        }else{
            echo '<script>alert("Las contraseñas no coinciden :(")</script>';
        }
        break;

    case 'btnCancelar':
        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $persona_id);
        $sentencia -> execute();

        header("Location: estudiante.lista.php");
        break;
}


?>