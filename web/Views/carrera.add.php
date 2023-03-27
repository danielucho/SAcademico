<?php
include("../Controllers/controller.carrera.add.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Carreras</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Carreras</a></li>
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
                                    <h4 class="card-title">Datos de la Carrera</h4>

                                    <input type="hidden" class="form-control" id="id" name="id"></input>

                                    <div class="form-group row">
                                        <label for="cod_carrera" class="col-sm-3 text-end control-label col-form-label">Código</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cod_carrera" name="cod_carrera" placeholder="Código de la Carrera">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 text-end control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Carrera">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tipo_carrera" class="col-sm-3 text-end control-label col-form-label">Tipo</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="tipo_carrera" name="tipo_carrera">
                                                <option>Seleccionar</option>
                                                <optgroup label="Tipo de Carrera">
                                                    <option>SEMESTRAL</option>
                                                 
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nivel_carrera" class="col-sm-3 text-end control-label col-form-label">Nivel</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="nivel_carrera" id="nivel_carrera">
                                                <option>Seleccionar</option>
                                                <optgroup label="Nivel de la Carrera">
                                                    
                                                    <option>TÉCNICO AUXILIAR</option>
                                                    <option>TÉCNICO MEDIO</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="duracion" class="col-sm-3 text-end control-label col-form-label">Duración</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="duracion" id="duracion">
                                                <option>Seleccionar</option>
                                                <optgroup label="Duración de la Carrera">
                                                    <option>MEDIO AÑO</option>
                                                    <option>1 AÑO</option>
                                                    <option>2 AÑOS</option>
                                                    <option>3 AÑOS</option>
                                                    
                                                </optgroup>
                                            </select>
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