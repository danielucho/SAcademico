<?php
include("../Controllers/d.controller.docente.asignar.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">MATERIAS ASIGNADAS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Docente</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Titulo y tree de links -->

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0"><?php echo $docente['nombre']." ".$docente['paterno']." ".$docente['materno']; ?></h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nivel</th>
                                                <th>Carrera</th>
                                                <th>Materia</th>
                                                <th>Observación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaAsignaciones as $asignacion){ ?>
                                                <tr>
                                                    <td><?php echo $asignacion['nivel']." - ".$asignacion['paralelo']; ?></td>
                                                    <td><?php echo $asignacion['carrera']; ?></td>
                                                    <td><?php echo $asignacion['materia']; ?></td>
                                                    <td><?php echo $asignacion['observacion']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $asignacion['asignacion_id']; ?>">
                                                            <!--<button value="btnEliminar" onclick="return Confirmar('¿Quitar materia?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>-->
                                                            <button value="btnGestionar" type="submit" class="btn btn-info btn-flat" name="accion"><i class="far fa-trash-alt"> Ver Alumnos</i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    
                    <div class="col-lg-6">
                    </div>

                    <div class="col-lg-6">
                    </div>
                </div>
            </div>

            <?php include("../Global/footer.php"); ?>

        </div>

<?php
include("../Global/foot.php");
?>