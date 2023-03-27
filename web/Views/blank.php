<?php
include("../Global/head.php");
include("../Global/sidebar.php");
?>

        <div class="page-wrapper">

            <!-- Titulo y tree de links -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">TITULO</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">HOME</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">TREE</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div align="right"><br>
                <form action="carrera.add.php" method="post">
                    <button type="submit" class="btn btn-info text-white pull-right">Agregar Carrera +</button>
                </form>
                </div>
            </div>
            <!-- Titulo y tree de links -->

            <div class="container-fluid">

                <div class="row">
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