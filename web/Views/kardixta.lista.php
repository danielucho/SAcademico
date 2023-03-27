<?php
include("../Controllers/controller.kardixta.lista.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">KARDIXTAS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Kardixtas</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div align="right"><br>
                <form action="kardixta.add.php" method="post">
                    <button type="submit" class="btn btn-info text-white pull-right">Agregar Kardixta +</button>
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
                                                <th>Foto</th>
                                                <th>Nombre Completo</th>
                                                <th>Celular</th>
                                                <th>Rol</th>
                                                <th>Codigo</th>
                                                <th>Observacion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaKardixtas as $kardixta){ ?>
                                                <tr>
                                                    <td><?php echo $kardixta['foto']; ?></td>
                                                    <td><?php echo $kardixta['paterno']." ".$kardixta['materno']." ".$kardixta['nombre']; ?></td>
                                                    <td><?php echo $kardixta['celular']; ?></td>
                                                    <td><?php echo $kardixta['rol']; ?></td>
                                                    <td><?php echo $kardixta['username']; ?></td>
                                                    <td><?php echo $kardixta['observacion']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $kardixta['id']; ?>">
                                                            <button value="btnEditar" type="submit" class="btn btn-warning btn-flat" name="accion"><i class="fas fa-edit"></i></button>
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Borrar kardixta?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
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