<?php
include("../Controllers/controller.carrera.lista.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CARRERAS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Carreras</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div align="right"><br>
                <form action="carrera.add.php" method="post">
                    <button type="submit" class="btn btn-info text-white pull-right">Agregar Carrera +</button>
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
                                                <th>Tipo</th>
                                                <th>Nivel</th>
                                                <th>Duración</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaCarreras as $carrera){ ?>
                                                <tr>
                                                    <td><?php echo $carrera['cod_carrera']; ?></td>
                                                    <td><?php echo $carrera['nombre']; ?></td>
                                                    <td><?php echo $carrera['tipo_carrera']; ?></td>
                                                    <td><?php echo $carrera['nivel_carrera']; ?></td>
                                                    <td><?php echo $carrera['duracion']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $carrera['id']; ?>">
                                                            <button value="btnAsignar" type="submit" class="btn btn-success btn-flat" name="accion"><i class="far fa-plus-square"></i></button>
                                                            <button value="btnEditar" type="submit" class="btn btn-warning btn-flat" name="accion"><i class="fas fa-edit"></i></button>
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Borrar carrera?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
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