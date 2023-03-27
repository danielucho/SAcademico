<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$persona_id = $_GET['idP'];
$kardixta_id = $_GET['idK'];

//sacar el codigo del kardixta
$sentencia = $pdo -> prepare("SELECT * FROM kardixta WHERE id = :id");
$sentencia -> bindParam(':id', $kardixta_id);
$sentencia -> execute();
$kardixta = $sentencia->fetch(PDO::FETCH_ASSOC);
$username = $kardixta['codigo'];
//hasta aqui

$id = (isset($_POST['id'])? $_POST['id'] : "");
$password = (isset($_POST['password'])? $_POST['password'] : "");
$password2 = (isset($_POST['password2'])? $_POST['password2'] : "");

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':
       
        if($password == $password2){
            $sentencia = $pdo -> prepare("INSERT INTO usuario(id, username, password, persona_id) VALUES (:id, :username, :password, :persona_id)");
            $sentencia -> bindParam(':id', $id);
            $sentencia -> bindParam(':username', $username);
            $sentencia -> bindParam(':password', $password);
            $sentencia -> bindParam(':persona_id', $persona_id);
            $sentencia -> execute();
            header("Location: kardixta.lista.php");
        }else{
            echo '<script>alert("Las contraseñas no coinciden :(")</script>';
        }
        break;

    case 'btnCancelar':
        $sentencia = $pdo -> prepare("DELETE FROM kardixta WHERE id = :id");
        $sentencia -> bindParam(':id', $kardixta_id);
        $sentencia -> execute();

        $sentencia = $pdo -> prepare("DELETE FROM persona WHERE id = :id");
        $sentencia -> bindParam(':id', $persona_id);
        $sentencia -> execute();
        
        header("Location: kardixta.lista.php");
        break;
}


?>