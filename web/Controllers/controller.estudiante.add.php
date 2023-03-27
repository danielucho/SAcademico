<?php
include("../Global/sesiones.php");
include("../Global/conexion.php");

$id = (isset($_POST['id'])? $_POST['id'] : "");
$ci = (isset($_POST['ci'])? $_POST['ci'] : "");
$paterno = (isset($_POST['paterno'])? $_POST['paterno'] : "");
$materno = (isset($_POST['materno'])? $_POST['materno'] : "");
$nombres = (isset($_POST['nombres'])? $_POST['nombres'] : "");
$celular = (isset($_POST['celular'])? $_POST['celular'] : "");
$nacimiento = (isset($_POST['nacimiento'])? $_POST['nacimiento'] : "");
$correo = (isset($_POST['correo'])? $_POST['correo'] : "");
$direccion = (isset($_POST['direccion'])? $_POST['direccion'] : "");
//$foto = (isset($_POST['foto'])? $_POST['foto'] : "");
$estado = "SI";
$archivo=(isset($_FILES['foto']['name'])? $_FILES['foto']['name'] : "");
$temp=(isset($_FILES['foto']['tmp_name'])? $_FILES['foto']['tmp_name'] : "");
$dir_destino="../perfil";
$tamano=(isset($_FILES['foto']['size'])?$_FILES['foto']['size'] :"");
//$img_tamano=$_POST['foto']['size'];
$tipo=(isset($_FILES['foto']['type']));
        
$extensiones=array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
$max_tamanyo=1024*1024*8;
$destino=$dir_destino.'/'.$archivo;
/*
if(in_array($_FILES['foto']['type'],$extensiones)){
    echo 'es imagen';
iff($_FILES['foto']['size']<$max_tamanyo){
    echo 'Pesa menos de 1MB';
}
}
*/

$accion = (isset($_POST['accion']) ? $_POST['accion'] : "");

switch ($accion) {
    case 'btnAgregar':

        $paterno_may =  mb_strtoupper($paterno);
        $materno_may =  mb_strtoupper($materno);
        $nombres_may =  mb_strtoupper($nombres);
        $direccion_may =  mb_strtoupper($direccion);
        

        $sentencia = $pdo->prepare("INSERT INTO persona(id, ci, paterno, materno, nombres, celular, nacimiento,correo, direccion, foto, estado) 
        VALUES (:id, :ci, :paterno, :materno, :nombres, :celular, :nacimiento,:correo, :direccion, :foto, :estado)");
        $sentencia -> bindParam(':id', $id);
        $sentencia -> bindParam(':ci', $ci);
        $sentencia -> bindParam(':paterno', $paterno_may);
        $sentencia -> bindParam(':materno', $materno_may);
        $sentencia -> bindParam(':nombres', $nombres_may);
        $sentencia -> bindParam(':celular', $celular);
        $sentencia -> bindParam(':nacimiento', $nacimiento);
        $sentencia -> bindParam(':correo', $correo);
        $sentencia -> bindParam(':direccion', $direccion_may);
        $sentencia -> bindParam(':foto', $destino);
        $sentencia -> bindParam(':estado', $estado);
        //print_r($img_type);
        $sentencia -> execute();
       
        $sentencia = $pdo -> prepare("SELECT id FROM persona ORDER BY id DESC LIMIT 1");
        $sentencia -> execute();
        $persona = $sentencia->fetch(PDO::FETCH_ASSOC);
        $persona_id = $persona['id'];
        if(move_uploaded_file($temp,$destino)){
            chmod('../perfil/'.$archivo,0777);
        }else{
            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }

        header("Location: estudiante.add1.php?idP=$persona_id");
        //header("Location: estudiante.lista.php");
        break;

    case 'btnCancelar':
        /*echo '
            <script type="text/javascript">
                window.location="http://localhost/SAcademico/web/Views/docente.lista.php";
            </script>
        ';*/
        header("Location: estudiante.lista.php");
        break;
}


?>