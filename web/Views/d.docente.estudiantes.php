<?php
include("../Controllers/d.controller.docente.estudiantes.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ALUMNOS INSCRITOS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="d.docente.asignar.php?id=<?php echo $persona_id;?>">Docente</a></li>
                                    <li class="breadcrumb-item active"><a>Alumnos</a></li>
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
                                <h5 class="card-title mb-0">Alumnos con calificación</h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Nota</th>
                                                <th>Observación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaAlumnosNota as $alumnoNota){ ?>
                                                <tr>
                                                    <td><?php echo $alumnoNota['nombres']." ".$alumnoNota['paterno']." ".$alumnoNota['materno']; ?></td>
                                                    <td><span class="badge bg-<?php echo $alumnoNota['badge'];?>"><?php echo $alumnoNota['nota']." --- ".$alumnoNota['estado'];?></span></td>
                                                    <td><?php echo $alumnoNota['observacion'];?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $alumnoNota['inscripcion_id']; ?>">
                                                            <button value="btnEditar" type="submit" class="btn btn-warning btn-flat" name="accion"><i class="far fa-trash-alt"> Editar</i></button>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Alumnos por calificar</h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaAlumnos as $alumno){ ?>
                                                <tr>
                                                    <td><?php echo $alumno['nombres']." ".$alumno['paterno']." ".$alumno['materno']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $alumno['inscripcion_id']; ?>">
                                                            <!--<button value="btnEliminar" onclick="return Confirmar('¿Quitar materia?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>-->
                                                            <button value="btnNota" type="submit" class="btn btn-info btn-flat" name="accion"><i class="far fa-trash-alt"> Calificar</i></button>
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



            </div>

            <?php include("../Global/footer.php"); ?>

        </div>

<?php
include("../Global/foot.php");
?>