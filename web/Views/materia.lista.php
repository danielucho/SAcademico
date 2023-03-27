<?php
include("../Controllers/controller.materia.lista.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Materias</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Materias</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div align="right"><br>
                <form action="materia.add.php" method="post">
                <button value="btnpdfGenera" type="submit" class="btn btn-warning btn-flat" name="accion">reporte</button>
                    <button type="submit" class="btn btn-info text-white pull-right">Agregar Materia +</button>
                </form>
                </div>
            </div>
            <!-- Titulo y tree de links -->


            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaMaterias as $materia){ ?>
                                                <tr>
                                                    <td><?php echo $materia['cod_materia']; ?></td>
                                                    <td><?php echo $materia['nombre']; ?></td>
                                                    <td><?php echo $materia['descripcion'];?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $materia['id']; ?>">
                                                            <!--<button value="btnContenido" type="submit" class="btn btn-success btn-flat" name="accion"><i class="fas fa-file-pdf"></i></button>-->
                                                            <button value="btnEditar" type="submit" class="btn btn-warning btn-flat" name="accion"><i class="fas fa-edit"></i></button>
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Borrar materia?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
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