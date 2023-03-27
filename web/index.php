<?php
include('./controller.index.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header><h1>  </h1></header>
	<!--<img class="wave" src="img/wave.png">-->
	<img class="wave" src="img/index.png">
	<div class="container">
		<div class="img">
			<img src="">
		</div>
			<div class="login-content">
			<form action="" method="post">
				<!-- inicio alerta-->
				<?php
				if (isset($errorLogin)) {
				?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong><?php echo $errorLogin; ?></strong> Ingrese nuevamente sus credenciales.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>
				<!-- fin alerta-->
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenido</h2>

				<div class="input-div one">
					<div class="i"><i class="fas fa-user"></i></div>
					<div class="div">
						<h5></h5>
						<input type="text" class="form-control <?php echo (isset($error['usr_pass'])) ? "is-invalid" : ""; ?>" name="username" placeholder="Usuario">
					</div>
				</div>

				<div class="input-div pass">
					<div class="i"> <i class="fas fa-lock"></i></div>
					<div class="div">
						<h5></h5>
						<input type="password" class="form-control <?php echo (isset($error['usr_pass'])) ? "is-invalid" : ""; ?>" name="password" placeholder="Password" required>
					</div>
				</div>
				<br>

				<button type="submit" name="btnLogin" class="btn" onclick=" return ConfirmDelete">Ingresar</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/sweetAlert.js"></Script>
		<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
