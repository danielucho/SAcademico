<?php
include("../Controllers/controller.estudiante.add1.php");
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
                            <form class="form-horizontal" method="post">

                                <div class="card-body">
                                    <h4 class="card-title">Datos del Estudiante</h4>

                                    <input type="hidden" class="form-control" id="estudiante_id" name="estudiante_id"></input>
                                    <input type="hidden" class="form-control" id="usuario_id" name="usuario_id"></input>

                                    <div class="form-group row">
                                        <label for="observacion" class="col-sm-3 text-end control-label col-form-label">Observación</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="observacion" value="Ninguno" name="observacion" placeholder="Observaciones del estudiante">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 text-end control-label col-form-label">UserName</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $username?>" id="username" name="username" disabled placeholder="Nombre de usuario">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password2" class="col-sm-3 text-end control-label col-form-label">Repetir Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir Contraseña" require>
                                        </div>
                                    </div>

                                </div>

                                <div class="border-top" align="center">
                                    <div class="card-body">
                                        <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
                                        <button value="btnAgregar" type="submit" class="btn btn-success text-white" name="accion">Agregar</button>
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