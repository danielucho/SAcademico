<?php
include("../Controllers/controller.docente.asignar.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">DOCENTES</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Docente</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Asignar</li>
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
                                <!-- inicio alerta-->
                                <?php
                                if (isset($errorLogin)) {
                                ?>
                                        <strong><?php 
                                                echo'<script type="text/javascript">
                                                        alert("Materia ya Asignada");
                                                        </script>';
                                         ?></strong>
                                <?php
                                }
                                ?>
                                <!-- fin alerta-->
                                <div class="card-body">
                                    <h5 class="card-title">Asignar Materias</h5>
                                    <div class="form-group row">

                                        <div class="row mb-3">

                                            <input type="hidden" class="form-control" id="asignacion_id" name="asignacion_id">

                                            <div class="col-lg-4">
                                                <label class="col-md-3 mt-3">Docente</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="<?php echo $docente['nombre']." ".$docente['paterno']." ".$docente['materno']; ?>" disabled id="docente" name="docente"  placeholder="Dirección">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="col-md-3 mt-3">Seleccionar materia</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="materiaCarrera_id" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <?php foreach($listaMaterias as $materia) { ?>
                                                            <option value="<?php echo $materia['materia_id']."-".$materia['carrera_id']?>" > <?php echo $materia['carrera']." - ".$materia['nivel']." - ".$materia['paralelo']." - ".$materia['materia'];?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="col-md-3 mt-3">Observación</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="Ninguna" id="observacion" name="observacion"  placeholder="Observación">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-top" align="right">
                                    <div class="card-body">
                                        <button value="btnAgregar" type="submit" class="btn btn-success text-white" name="accion">Agregar+</button>
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
                                <h5 class="card-title mb-0"><?php echo $docente['nombre']." ".$docente['paterno']." ".$docente['materno']; ?></h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Carrera</th>
                                                <th>Nivel</th>
                                                <th>Materia</th>
                                                <th>Observación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaAsignaciones as $asignacion){ ?>
                                                <tr>
                                                    <td><?php echo $asignacion['carrera']; ?></td>
                                                    <td><?php echo $asignacion['nivel']." - ".$asignacion['paralelo']; ?></td>
                                                    <td><?php echo $asignacion['materia']; ?></td>
                                                    <td><?php echo $asignacion['observacion']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $asignacion['asignacion_id']; ?>">
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Quitar materia?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
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