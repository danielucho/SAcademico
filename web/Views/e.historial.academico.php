<?php
include("../Controllers/e.controller.historial.academico.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

<div class="page-wrapper">

    <!-- Titulo y tree de links -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">HISTORIAL ACADEMICO</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Estudiante</a></li>
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
                    <form action="" method="post">
                        <div class="card-body">
                            <h5 class="card-title">Estudiante - <?php echo $estudiante['nombre'] . " " . $estudiante['paterno'] . " " . $estudiante['materno']; ?> con Cedula de Identidad 1111111111 y Registro Unico 1111111</h5>
                            <h5 class="card-title">Mencion Academica Tecnico Medio Contabilidad</h5>

                            <form action="materia.add.php" method="post">
                                <button value="btnpdfGenera" type="submit" class="btn btn-warning btn-flat" name="accion">Generar Documento</button>
                            </form>
                            <div class="form-group row">
                                <div class="row mb-5">
                                    <input type="hidden" class="form-control" id="pertenece_carrera_id" name="pertenece_carrera_id">
                                    <div class="col-lg-12">
                                        <label class="col-md-1 mt-3">Nro</label>
                                        <label class="col-md-1 mt-3">Sigla</label>
                                        <label class="col-md-3 mt-3">Materia</label>
                                        <label class="col-md-1 mt-3">Par.</label>
                                        <label class="col-md-2 mt-3">Observacion</label>
                                        <label class="col-md-2 mt-3">Docente</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>2022 PRIMERO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaPerteneceCarrera as $perteneceCarrera) { ?>
                                                    <tr>
                                                        <td><?php echo $perteneceCarrera['carrera']; ?></td>
                                                        <td><?php echo $perteneceCarrera['nivel'] . " - " . $perteneceCarrera['paralelo']; ?></td>
                                                        <td><?php echo $perteneceCarrera['semestre'] . " Semestre"; ?></td>
                                                        <td><?php echo $perteneceCarrera['gestion']; ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title">CARRERAS INSCRITAS</h4><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Carrera</th>
                                        <th>Nivel</th>
                                        <th>Semestre</th>
                                        <th>Gestion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaPerteneceCarrera as $perteneceCarrera) { ?>
                                        <tr>
                                            <td><?php echo $perteneceCarrera['carrera']; ?></td>
                                            <td><?php echo $perteneceCarrera['nivel'] . " - " . $perteneceCarrera['paralelo']; ?></td>
                                            <td><?php echo $perteneceCarrera['semestre'] . " Semestre"; ?></td>
                                            <td><?php echo $perteneceCarrera['gestion']; ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $perteneceCarrera['id']; ?>">
                                                    <button value="btnEliminar" onclick="return Confirmar('¿Eliminar Carrera?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
                                                    <button value="btnMateria" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas fa-wrench"></i></button>
                                                    <!--<button value="btnMateria" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas fa-wrench"> INSCRIBIR MATERIAS</i></button>-->
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