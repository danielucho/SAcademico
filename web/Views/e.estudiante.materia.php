<?php
include("../Controllers/controller.estudiante.materia.php");
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ESTUDIANTES</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="estudiante.lista.php">Estudiante</a></li>
                                    <li class="breadcrumb-item"><a href="estudiante.carrera.php?id=<?php echo $persona_id?>">Carrera</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Materia</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Titulo y tree de links -->

            <div class="container-fluid">
                <!--
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="" method="post">
                                <div class="card-body">
                                    
                                    <div class="form-group row">

                                        <div class="row mb-3">

                                            <input type="hidden" class="form-control" id="inscripcion_id" name="inscripcion_id">
                                            <div class="col-lg-3">
                                                <label class="col-md-3 mt-3">Estudiante</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="<?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?>" disabled id="estudiante" name="estudiante"  placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-3 mt-3">Periodo</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="periodo" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option>I</option>
                                                        <option>II</option>
                                                        <option>Invierno</option>
                                                        <option>Verano</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-3 mt-3">Gestión</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="gestion" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <?php for ($i=0; $i < 10; $i++) { ?>
                                                            <option><?php echo ($año+$i) ; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-md-3 mt-3">Seleccionar materia</label>
                                                <div class="col-md-12">
                                                    <select class="select2 form-select shadow-none" name="materia_id" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <?php foreach($listaMaterias as $materia) {?>
                                                            <option value="<?php echo $materia['materia_id']; ?>" > <?php echo $materia['cod_materia']." - ".$materia['materia'];?> </option>
                                                        <?php } ?>
                                                    </select>
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
                                                        -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="" method="post">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $carrera['nombre']; ?></h5>
                                    <div class="form-group row">

                                        <div class="row mb-3">

                                            <input type="hidden" class="form-control" id="inscripcion_id" name="inscripcion_id">
                                            <div class="col-lg-4">
                                                <label class="col-md-3 mt-3">Estudiante</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="<?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?>" disabled id="estudiante" name="estudiante"  placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                    <label class="col-md-5 mt-3">Nivel</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" value="<?php echo $pertenece_carrera['nivel']." - ".$pertenece_carrera['paralelo'] ; ?>" disabled id="nivel" name="carrera"  placeholder="">
                                                    </div>
                                             </div>
                                            <div class="col-lg-3">
                                                    <label class="col-md-5 mt-3">Carrera</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" value="<?php echo $carrera['nombre']; ?>" disabled id="carrera" name="carrera"  placeholder="">
                                                    </div>
                                                </div>
                                            <div class="col-lg-2">
                                                <label class="col-md-6 mt-3">Semestre</label>
                                                <div class="col-md-12">
                                                <input type="text" class="form-control" value="<?php echo $pertenece_carrera['semestre']."º Semestre" ; ?>" disabled id="semestre" name="semestre"  placeholder="">
                            
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="border-top" align="right">
                                    <div class="card-body">
                                        <?php 
                                        #echo $habilitar['habilitar'];
                                        if($estado['estado'] == 'inactivo'){
                                        ?>
                                        <button value="btnInscribir" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas fa-wrench">INSCRIBIR MATERIAS</i></button>
                                        <?php
                                        }else{
                                            ?>
                                            <h5 align="left" >USTED YA FINALIZO SU INSCRIPCION</h5>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0"><?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?></h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Periodo-Gestión</th>
                                                <th>materia</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaInscripciones as $inscripcion){ ?>
                                                <tr>
                                                    <td><?php echo $inscripcion['periodo']." / ".$inscripcion['gestion']; ?></td>
                                                    <td><?php echo $inscripcion['materia']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $inscripcion['id']; ?>">
                                                            <button value="btnEliminar" onclick="return Confirmar('¿Eliminar Carrera?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
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
                -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0"><?php echo $estudiante['nombre']." ".$estudiante['paterno']." ".$estudiante['materno']; ?></h5><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cod-Materia</th>
                                                <!--<th>gestion</th>-->
                                                <th>materia</th>
                                                <!--<th>Acciones</th>-->
                                                <th>Nota Final</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listaInscripciones as $inscripcion){ ?>
                                                <tr>
                                                    <td><?php echo $inscripcion['cod_materia']; ?></td>
                                                    <!--<td><?php echo $inscripcion['gestion']; ?></td>-->
                                                    <td><?php echo $inscripcion['materia']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $inscripcion['id']; ?>">
                                                            <button value="btnNota" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas">NOTA</i></button>
                                                            <!--<button value="btnEliminar" onclick="return Confirmar('¿Eliminar Carrera?');" type="submit" class="btn btn-danger btn-flat" name="accion"><i class="far fa-trash-alt"></i></button>
                                                            <button value="btnMateria" type="submit" class="btn btn-info btn-flat" name="accion"><i class="fas fa-wrench"></i></button>
                                                            -->
                                                        </form>
                                                    </td>
                                                    <!--<td>0/100</td>-->
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