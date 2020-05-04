<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        //header("location: index.php"); //si no esta con login
       // exit;
    } else {
    	include "registro_resc.php";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Amor animal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
			<script src="js/search_langing_page.js"></script>

</head>
	
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100">
					<div class="container-all">	
						
						<div class="ctn-form">
							<div class="login100-form-title">
								Registro de rescate
							</div>

							<div class="login100-form-txt">
								Gracias por dar una oportunidad de vida a nuestros animales!
							</div>
						</div>
					
                  
                         <div class="ctn-slider">
		                    <ul>
		                        <li><img src="images/maui.jpg" alt=""></li>
		                        <li><img src="images/maui2.jpg" alt=""></li>
		                        <li><img src="images/felipe.jpg" alt=""></li>
		                        <li><img src="images/animatoons.JPG" alt=""></li>
		                    </ul>
                         </div>
            		</div>


				
				<form class="login100-form-reg validate-form-reg" 
				action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
				method="post">
					
     				
					<div class="wrap-input100 validate-input" data-validate = "Ingrese fecha de adopción">
						<input class="input100" type="date" id="date" name="date" placeholder="Fecha de adopción">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="far fa-calendar-alt" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Seleccione tipo de animal">
						<label for="cars">Seleccione tipo de animal:</label>

						<div>
							<select class="custom-choice">
								<option value="volvo">Volvo</option>
						  		<option value="saab">Saab</option>
						  		<option value="opel">Opel</option>
						  		<option value="audi">Audi</option>
							</select>
						</div>
						
					</div>




					<div class="wrap-input100 validate-input" data-validate = "Edad aproximada del animal">
						<input class="input100" type="number" id="edad" name="edad" placeholder="Edad aproximada" pattern="[0-9]{2}" title="Ingrese sólo dígitos">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-paw" aria-hidden="true"></i>
						</span>
					</div>



					<div class="wrap-input100 validate-input" data-validate = "Cargue una imagen">
						<input type="file" class="input100-form-btn-input" name="file" id="file" accept="image/x-png,image/gif,image/jpeg">
						<label for="file" id="labelphoto" class="input100">Imagen del animal</label>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-camera-retro" aria-hidden="true"></i>
						</span>
					</div>

					<div id="wrap-input100-img">
						<img id="imagen_cargada" src="" />
					</div>
						
					



					<div class="container-login100-form-btn">
						<input type="submit" value="Registrar">
						<input type="submit" onclick="this.form.reset()" id="borrar" value="Borrar">
						<input type="submit" id="cerrar_reg_adop" value="Cancelar">
					</div>

				


					
					<div class="text-center">
						<div class="Footer-pic">
							<img src="images/AA.png" alt="IMG">
						</div>
					</div>


					
				</form>


			</div>

			
		</div>


	</div>
	
	

	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
</html>