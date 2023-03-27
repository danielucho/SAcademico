<?php
include("../Controllers/d.controller.docente.notas.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"></h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="d.docente.asignar.php?id=<?php echo $persona_id;?>">Docente</a></li>
                                    <li class="breadcrumb-item"><a href="d.docente.estudiantes.php?id=<?php echo $persona_id;?>&a=<?php echo $asignacion_id;?>">Alumnos</a></li>
                                    <li class="breadcrumb-item active"><a>Notas</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Titulo y tree de links -->

            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-3"></div>
                    
                    <div class="col-lg-6">

                        <div class="card">
                            <form class="form-horizontal" method="post">

                                <div class="card-body">
                                    <h4 class="card-title">Estudiante: <?php echo $estudiante['nombres']." ".$estudiante['paterno']; ?></h4>

                                    <input type="hidden" class="form-control" id="nota_id" name="nota_id"></input>

                                    <div class="form-group row">
                                        <label for="observacion" class="col-sm-3 text-end control-label col-form-label">Observación</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="observacion" value="Ninguno" name="observacion" placeholder="Observaciones">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 text-end control-label col-form-label">Nota</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" value="" id="nota" name="nota" placeholder="">
                                        </div>
                                    </div>

                                </div>

                                <div class="border-top" align="center">
                                    <div class="card-body">
                                        <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
                                        <button value="btnAceptar" type="submit" class="btn btn-success text-white" name="accion">Aceptar</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

                    <div class="col-lg-3"></div>

                </div>
            </div>

            <?php include("../Global/footer.php"); ?>

        </div>

<?php
include("../Global/foot.php");
?>