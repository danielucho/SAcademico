<?php
include("../Controllers/controller.carrera.materias.php");
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
                                    <li class="breadcrumb-item"><a href="#">Carrera</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Materias</li>
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
                                    <h5 class="card-title">Agregar Materias</h5>
                                    <div class="form-group row">

                                        <div class="row mb-3">
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
                                            <!--
                                            <div class="col-lg-2">
                                                <label class="col-md-6 mt-3">Semestre</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="semestre" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                            </div>
-->
                                            <div class="col-lg-4">
                                                <label class="col-md-8 mt-3">Seleccionar materia</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="materia_id" style="width: 100%; height:36px;" required>
                                                        <option>Seleccionar</option>
                                                        <?php foreach($listaMaterias as $materia) { ?>
                                                            <option value=<?php echo $materia['id'];?>><?php echo $materia['cod_materia']." - ".$materia['nombre'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-2">
                                                <label class="col-md-5 mt-3">Dia</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="dia" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>Lunes</option>
                                                        <option>Martes</option>
                                                        <option>Miercoles</option>
                                                        <option>Jueves</option>
                                                        <option>Viernes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-7 mt-3">Hora Inicio</label>
                                                <div class="col-md-12">
                                                <input type="time" name="hora_inicio" min="8:00" max="23:00" required/>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-5 mt-3">Hora Fin</label>
                                                <div class="col-md-12">
                                                <input type="time" name="hora_fin" required/>
                                                </div>
                                            </div>
                                        </div>

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
                                <h5 class="card-title mb-0"><?php echo $carrera['nombre']; ?></h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nivel</th>
                                                <th>Materia</th>
                                                <th>dia</th>
                                                <th>Horario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaCarreraMaterias as $carreraMateria){ ?>
                                                <tr>
                                                    <td><?php echo $carreraMateria['nivel'].' - '.$carreraMateria['paralelo']; ?></td>
                                                    <td><?php echo $carreraMateria['materia']; ?></td>
                                                    <td><?php echo $carreraMateria['dia']; ?></td>
                                                    <td><?php echo $carreraMateria['hora_inicio'].' - '.$carreraMateria['hora_fin']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $carreraMateria['id']; ?>">
                                                            <button value="btnEditar" type="submit" class="btn btn-warning btn-flat" name="accion"><i class="fas fa-edit"></i></button>
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Quitar materia?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>s
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