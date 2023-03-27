<?php
include("../Controllers/controller.estudiante.edit.php");
include("../Global/head.php");
include("../Global/sidebar.php");
//print_r($id);
//echo $id;
?>
<div class="page-wrapper">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>

            <div class="col-lg-6">
                <div class="card">
                    <form class="form-horizontal" method="post">

                        <div class="card-body">
                            <h4 class="card-title">Editar Datos Personales</h4>

                            <input type="hidden" class="form-control" id="id" name="id"></input>

                            <div class="form-group row">
                                <label for="ci" class="col-sm-3 text-end control-label col-form-label">CI</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Número de carnet de identidad" value="<?php echo $estudiante->ci;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paterno" class="col-sm-3 text-end control-label col-form-label">Ap. Paterno</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="<?php echo $estudiante->paterno;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="materno" class="col-sm-3 text-end control-label col-form-label">Ap. Materno</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="<?php echo $estudiante->materno;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombres" class="col-sm-3 text-end control-label col-form-label">Nombre(s)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre(s)" value="<?php echo $estudiante->nombres;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="celular" class="col-sm-3 text-end control-label col-form-label">Celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Número de celular" value="<?php echo $estudiante->celular;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nacimiento" class="col-sm-3 text-end control-label col-form-label">Fec. Nacimiento</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Fecha de nacimiento"value="<?php echo $estudiante->nacimiento;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="correo" class="col-sm-3 text-end control-label col-form-label">Correo</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej.: usuario@servidor.com" value="<?php echo $estudiante->correo;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="direccion" class="col-sm-3 text-end control-label col-form-label">Dirección</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo $estudiante->direccion;?>">
                                </div>
                            </div>
                            <!--
                            <div class="form-group row">
                                <label for="foto" class="col-sm-3 text-end control-label col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="foto" name="foto" placeholder="FOTO"value="<?php echo $estudiante->foto;?>">
                                </div>
                            </div>
                            -->

                        </div>

                        <div class="border-top" align="center">
                            <div class="card-body">
                                <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
                                <button value="btnModificar" onclick="return Confirmar('¿Modificar Estudiante?');" type="submit" class="btn btn-info" name="accion">Modificar</button>
                                
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