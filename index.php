<?php
    include 'conde_login.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Amor Animal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css.map">
	

</head>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/AA.png" alt="Amor animal">
				</div>

				<form class="login100-form validate-form-in" 
				action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
				method="POST" id="inicio">
					<div class="login100-form-title">
						Iniciar sesión
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su C.I">
						<input class="input100" type="number" id="ci" name="ci" placeholder="Cédula de identidad" pattern="[0-9]{7}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" value="Iniciar" name="submit_1" id="submit_1">
					</div>

					<span class="ms-error"><?php echo $session_err; ?></span>

					<div class="text-center p-t-12">
						<span class="txt1">
							Olvidaste tu
						</span>
						<a class="txt3" href="recuperar_pass.php">
							Usuario / Contraseña?
						</a>
					</div>


					<div class="text-center p-t-50">
						<span class="text-footer">¿Aún no te registraste?
							<!--<a href="registro.html" id=""> Regístrate!</a>-->
						<input type="button" id="btnopen" value="Regístrate!"/>
                		</span>
					</div>
					</form>
				
			</div>
		</div>
	</div>
	
	

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
	<script src="js/search_langing_page.js"></script>

	


</body>



</html>