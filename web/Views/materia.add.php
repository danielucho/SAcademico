<?php
include("../Controllers/controller.materia.add.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">MATERIAS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Materias</a></li>
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
                                    <h4 class="card-title">Datos de la Materia</h4>

                                    <input type="hidden" class="form-control" id="id" name="id"></input>

                                    <div class="form-group row">
                                        <label for="cod_materia" class="col-sm-3 text-end control-label col-form-label">Código</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cod_materia" name="cod_materia" placeholder="Código de la materia">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 text-end control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Materia">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-3 text-end control-label col-form-label">Descripcion</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Detallar el contenido">
                                        </div>
                                    </div>

                                </div>

                                <div class="border-top" align="center">
                                    <div class="card-body">
                                        <button value="btnAgregar" type="submit" class="btn btn-success text-white" name="accion">Guardar</button>
                                        <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
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