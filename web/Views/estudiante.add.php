<?php
include("../Controllers/controller.estudiante.add.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

<div class="page-wrapper">

    <!-- Titulo y tree de links -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">ESTUDIANTE</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Estudiante</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agregar</li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- inicio alerta-->
                        <?php
                        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> vuelve a intentar.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- fin alerta-->

                        <div class="card-body">
                            <h4 class="card-title">Datos Personales</h4>

                            <input type="hidden" class="form-control" id="id" name="id"></input>

                            <div class="form-group row">
                                <label for="ci" class="col-sm-3 text-end control-label col-form-label">CI</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Número de carnet de identidad" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paterno" class="col-sm-3 text-end control-label col-form-label">Ap. Paterno</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="materno" class="col-sm-3 text-end control-label col-form-label">Ap. Materno</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombres" class="col-sm-3 text-end control-label col-form-label">Nombre(s)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre(s)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="celular" class="col-sm-3 text-end control-label col-form-label">Celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Número de celular">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nacimiento" class="col-sm-3 text-end control-label col-form-label">Fec. Nacimiento</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Fecha de nacimiento" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="correo" class="col-sm-3 text-end control-label col-form-label">Correo</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="direccion" name="correo" placeholder="Ej.: usuario@servidor.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="direccion" class="col-sm-3 text-end control-label col-form-label">Dirección</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                                </div>
                            </div>
                            <!--
                            <div class="form-group row">
                                <label for="foto" class="col-sm-3 text-end control-label col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="FOTO">
                                </div>
                            </div>
                            -->

                        </div>

                        <div class="border-top" align="center">
                            <div class="card-body">
                                <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
                                <button value="btnAgregar" type="submit" class="btn btn-success text-white" name="accion">Siguiente</button>
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