<?php
$persona_id = $_SESSION['usuario']['persona_id'];

$sentencia = $pdo->prepare("SELECT 
U.*,
CASE 
WHEN K.persona_id = U.persona_id THEN 'kardixta' 
WHEN D.persona_id = U.persona_id THEN 'docente'
WHEN E.persona_id = U.persona_id THEN 'estudiante'
END AS tipo 
FROM usuario U
LEFT JOIN kardixta K ON U.persona_id = K.persona_id
LEFT JOIN docente D ON U.persona_id = D.persona_id
LEFT JOIN estudiante E ON U.persona_id = E.persona_id
WHERE U.persona_id = :persona_id");
$sentencia -> bindParam(':persona_id', $persona_id);
$sentencia -> execute();
$usr = $sentencia -> fetch(PDO::FETCH_ASSOC);


?>

        
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">

                        <!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>-->
                        <?php if($usr['tipo'] == "kardixta"){ ?>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-run"></i><span class="hide-menu">Carreras</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="carrera.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="carrera.add.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Agregar</span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-animation"></i><span class="hide-menu">Materias</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="materia.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="materia.add.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Agregar</span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-switch"></i><span class="hide-menu">Kardixtas</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="kardixta.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="kardixta.add.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Agregar</span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-convert"></i><span class="hide-menu">Docentes</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="docente.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="docente.add.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Agregar</span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Estudiante</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="estudiante.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="estudiante.add.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Agregar</span></a></li>
                                </ul>
                            </li>
                        <?php  } ?>



                        <?php if($usr['tipo'] == "docente"){ //hacer nuevas paginas para la vista de docente?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="d.docente.asignar.php?id=<?php echo $persona_id;?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Notas</span></a></li>
                            <!--<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Estudiante</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="estudiante.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="estudiante.agregar.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Agregar</span></a></li>
                                </ul>
                            </li>-->
                        <?php  } ?>



                        <?php if($usr['tipo'] == "estudiante"){ //hacer nuevas paginas para la vista de estudiantes?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="e.estudiante.carrera.php?id=<?php echo $persona_id;?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Inscribirse</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="e.historial.academico.php?id=<?php echo $persona_id;?>" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Historial Academico</span></a></li>
                            <!--<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Estudiante</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="estudiante.lista.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Lista</span></a></li>
                                    <li class="sidebar-item"><a href="estudiante.agregar.php" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i><span class="hide_menu">Agregar</span></a></li>
                                </ul>
                            </li>-->
                        <?php  } ?>




<!--
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Blanco</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Full Width</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-buttons.html" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Icons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome Icons </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                                <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                                <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                                <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                                <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                                <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                                <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                            </ul>
                        </li>
-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>