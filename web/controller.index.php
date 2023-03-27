<?php

$error = array();


if(isset($_POST["btnLogin"])){
    include("./Global/conexion.php");
    //$user=new User();
    $username=($_POST['username']);
    $password=($_POST['password']);
   
    $sentencia = $pdo->prepare("SELECT * FROM usuario WHERE username = :username AND password = :password");
   
    $sentencia->bindParam(':username', $username);
    $sentencia->bindParam(':password', $password);
    $sentencia->execute();
    //$registro=$sentencia->fetch(PDO::FETCH_ASSOC);
    $usuario = $sentencia -> fetch(PDO::FETCH_ASSOC);
    
    
    $numeroRegistros=$sentencia->rowCount();

    if($numeroRegistros >= 1){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $persona_id = $usuario['persona_id'];
        header("Location: Views/perfil.php?id=$persona_id");
        //header('Location: produccion/index.php');
    }else{
        $error['usr_pass'] = "Usuario o contraseña incorrectos";
      $errorLogin="Nombre de usuario y/o password es incorrecto";
      include_once '../web/index.php';
    }
}


?>