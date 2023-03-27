<?php
include("../Controllers/controller.carrera.materias.edit.php");
include("../Global/head.php");
include("../Global/sidebar.php");
//print_r($id);
//echo $id;
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">MATERIA</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Carrera</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Materia</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
            <div class="col-lg-3"></div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Editar Datos Materia</h4>
                                    <input type="hidden" class="form-control" id="id" name="id"></input>
                                                                       
                                    <div class="form-group row">
                                        <div class="row mb-3">
                                            
                                            <div class="col-lg-4">
                                                <label class="col-md-8 mt-3">Materia</label>
                                                <div class="col-md-12">
                                                <input type="text" class="form-control" id="materia" name="materia" placeholder="Seleccionar materia" value="<?php echo $carrera_materia->cod_materia.' - '.$carrera_materia->nombre;?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-5 mt-3">Dia</label>
                                                <div class="col-md-12">
                                                <select class="select2 form-select shadow-none" name="dia" style="width: 100%; height:36px;" required>
                                                        <option><?php echo $carrera_materia->dia;?></option>
                                                        <option>Lunes</option>
                                                        <option>Martes</option>
                                                        <option>Miercoles</option>
                                                        <option>Jueves</option>
                                                        <option>Viernes</option>
                                                    </select>
                                                    <!--
                                                <input type="text" class="form-control" id="dia" name="dia" placeholder="Seleccionar dia" value="<?php echo $carrera_materia->dia;?>">
                                                -->
                                            </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-7 mt-3">Hora Inicio</label>
                                                <div class="col-md-12">
                                                <input type="time" name="hora_inicio" value="<?php echo $carrera_materia->hora_inicio;?>" required/>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-5 mt-3">Hora Fin</label>
                                                <div class="col-md-12">
                                                <input type="time" name="hora_fin" value="<?php echo $carrera_materia->hora_fin;?>" required/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-top" align="right">
                                    <div class="card-body">
                                         <button value="btnCancelar" type="submit" class="btn btn-danger text-white" name="accion">Cancelar</button>
                                         <button value="btnModificar" onclick="return Confirmar('¿Modificar Carrera?');" type="submit" class="btn btn-info" name="accion">Modificar</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <?php include("../Global/footer.php"); ?>
</div>
<?php
include("../Global/foot.php");
?>