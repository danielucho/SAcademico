<?php
include("../Controllers/controller.estudiante.carrera.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">INSCRIBIR CARRERA</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="estudiante.lista.php">Estudiante</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inscribir</li>
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
                                <div class="card-body">
                                    <h5 class="card-title">Inscribir Carrera</h5>
                                    <div class="form-group row">

                                        <div class="row mb-3">

                                            <input type="hidden" class="form-control" id="pertenece_carrera_id" name="pertenece_carrera_id">
                                                <div class="col-lg-4">
                                                    <label class="col-md-3 mt-3">Estudiante</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" value="<?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?>" disabled id="estudiante" name="estudiante"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="col-md-3 mt-3">Matrìcula</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" value="<?php echo $matriculaActual; ?>" disabled id="matricula" name="matricula"  placeholder="">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-5">
                                                <label class="col-md-5 mt-3">Seleccionar carrera</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="carrera_id" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <?php foreach($listaCarreras as $carrera) { ?>
                                                            <option value="<?php echo $carrera['id']?>" > <?php echo $carrera['nombre'];?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-6 mt-3">Nivel</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="nivel" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>Basico</option>
                                                        <option>Auxiliar</option>
                                                        <option>Medio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-6 mt-3">Paralelo</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="paralelo" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="col-md-5 mt-3">Semestre</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="semestre" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                            </div>
                                       
                                            <div class="col-lg-3">
                                                <label class="col-md-5 mt-3">Gestión</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="gestion" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <?php for ($i=-20; $i < 10; $i++) { ?>
                                                            <option><?php echo ($año+$i) ; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            <!--
                                            <div class="col-lg-4">
                                                <label class="col-md-3 mt-3">Semestre</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="semestre" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            -->

                                    </div>
                                </div>
                                <div class="border-top" align="right">
                                    <div class="card-body">
                                        <button value="btnAgregar" type="submit" class="btn btn-success text-white" name="accion">Agregar +</button>
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
                            <h4 class="page-title">CARRERAS INSCRITAS</h4><br>
                                <!--<h5 class="card-title mb-0"><?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?></h5><br>-->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Carrera</th>
                                                <th>Nivel</th>
                                                <th>Semestre</th>
                                                <th>Gestion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaPerteneceCarrera as $perteneceCarrera){ ?>
                                                <tr>
                                                    <td><?php echo $perteneceCarrera['carrera']; ?></td>
                                                    <td><?php echo $perteneceCarrera['nivel']." - ".$perteneceCarrera['paralelo']; ?></td>
                                                    <td><?php echo $perteneceCarrera['semestre']." Semestre"; ?></td>
                                                    <td><?php echo $perteneceCarrera['gestion']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $perteneceCarrera['id']; ?>">
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Eliminar Carrera?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
                                                            <button value="btnMateria" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas fa-wrench"></i></button>
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