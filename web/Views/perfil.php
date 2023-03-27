<?php
include("../Controllers/controller.perfil.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

<style>
    .cabecera {
        text-align: center;
        height: 300px;
        padding: 12px;
        background-color: #333444;
    }
    .avatar {
        margin-top: 30px;
        width: 200px;
        height: 200px;
        border-radius:50%;
    }
    .nombre-usuario {
        font-size: 18px;
        margin-top: 14px;
        color: #fff;
    }
    .socials {
        list-style: none;
        text-align: center;
        padding: 0;
    }
    .socials li {
        display: inline-block;
        margin: 30px;
        margin-bottom: 5px;
    }
    .treslistas {
        text-decoration: none;
        color: #ad0000;
        font-size: 30px;
        margin-top: 1px;
    }
    .treslistas:hover {
        color: #dd1919;
    }
    .paraiconos {
        width: 32px;
        height: 32px;
        display: inline-block;
        background-size: cover;
    }
    .telefono {
        background-image: url("../../assets/images/icons/telefono.png");
    }
    .calendario {
        background-image: url("../../assets/images/icons/calendario.png");
    }
    .acercade {
        padding: 5px;
    }
    .acercade h3 {
        color: #545454;
        font-size: 16px;
    }
    .acercade p {
        color: #545454;
        font-size: 14px;
    }
</style>

        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="cabecera">
                    <img class = "avatar" src="../../assets/images/users/1.jpg">
                    <h1 class="nombre-usuario"><?php echo $persona['nombres']." ".$persona['paterno']." ".$persona['materno']; ?></h1>
                </div>
                <ul class="socials">
                    <li>
                        <i class="paraiconos telefono"></i>
                        <a href="" class="treslistas"><?php echo $persona['celular']; ?></a>
                    </li>
                    <li>
                        <i class="paraiconos calendario"></i>
                        <a href="" class="treslistas"><?php echo $persona['nacimiento']; ?></a>
                    </li>
                </ul>

                <div class="acercade">
                    <h3>Descripcion:</h3>
                    <p>Has iniciado sesion correctamente.</p>
                    <p>Como administrador podras crear, editar y modificar fichas personales de los usuarios, controlar la inscripcion de las materias, y realiar reportes de los estudiantes.</p>
                </div>



            <!--
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Aqui Viene la foto</h5>
                                <div class="col-lg-12" align="center">
                                    <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="" role="button" aria-expanded="false">
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="50%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        

            <?php include("../Global/footer.php"); ?>

        </div>

<?php
include("../Global/foot.php");
?>