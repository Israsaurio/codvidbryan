<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: index.php"); //si no esta con login
       exit;
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


				
				<form class="login100-form-reg validate-form-res" 
				action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
				enctype="multipart/form-data" method="POST">
					
     				<label>Registre fecha de rescate:</label>
     				
					<div class="wrap-input100 validate-input" data-validate = "Ingrese fecha de adopción">
						<input class="input100" type="date" id="date" name="date" placeholder="Fecha de adopción">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="far fa-calendar-alt" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Seleccione tipo de animal">
						<label for="animales">Seleccione tipo de animal:</label>

						<div>
							<select class="custom-choice" name="especie">
								<option value="Perro">Perro</option>
						  		<option value="Gato">Gato</option>
							</select>
						</div>
						
					</div>

					<label for="edad">Indique edad aproximada:</label>
					<div style="display:block;">
					        <select class="custom-choice-edad" name="edades-anios">
					            <option value="0">0 años</option>
					            <option value="1">1 años</option>
					            <option value="2">2 años</option>
					            <option value="3">3 años</option>
					            <option value="4">4 años</option>
					            <option value="5">5 años</option>
					            <option value="6">6 años</option>
					            <option value="7">7 años</option>
					            <option value="8">8 años</option>
					            <option value="9">9 años</option>
					            <option value="10">10 años</option>
					            <option value="11">11 años</option>
					            <option value="12">12 años</option>
					            <option value="13">13 años</option>
					            <option value="14">14 años</option>
					            <option value="15">15 años</option>
					            <option value="16">16 años</option>
					            <option value="17">17 años</option>
					            <option value="18">18 años</option>
					            <option value="19">19 años</option>
					        </select>

					        <select class="custom-choice-edad" name="edades-meses">
					            <option value="1">1 mes</option>
					            <option value="2">2 meses</option>
					            <option value="3">3 meses</option>
					            <option value="4">4 meses</option>
					            <option value="5">5 meses</option>
					            <option value="6">6 meses</option>
					            <option value="7">7 meses</option>
					            <option value="8">8 meses</option>
					            <option value="9">9 meses</option>
					            <option value="10">10 meses</option>
					            <option value="11">11 meses</option>
					       </select>
					</div>


					
					
					<div class="wrap-input100 validate-input" data-validate = "Cargue una imagen">
						<input type="file" class="input100-form-btn-input" name="file" id="file" accept="image/*">
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
						<input type="submit" value="Registrar" id="registrar">
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