<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: index.php"); //si no esta con login
       exit;
    } else {
    	//include "registro_adop.php";
   		require_once "conexion.php";

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
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/ddklick.js"></script>
	<style>
		.container{
			width: 600px;
			height: 100%;
		}
		select{
			width: 100%;
		}
	</style>

</head>
	
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100">
					<div class="container-all">	
						
						<div class="ctn-form">
							<div class="login100-form-title">
								Lista de adoptados
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

					<table id="customers">
						<tr>
						    <th>Nombre y apellido</th>
						    <th>Celular</th>
						    <th>Correo</th>
						    <th>Fecha de adopción</th>
						    <th>Adoptado</th>
						    <th>Adoptante</th>
						</tr>
					

						<!-- parte del codigo para llenar de la base de datos -->
						<div class="wrap-input100 validate-input" data-validate = "Seleccione una imagen">
								<div class="container">
									
									<?php 
										$dir_path="img_adopciones/adoptados/";
										$dir_path2="img_adopciones/adoptantes/";

										$sql = "SELECT * FROM adoptante";
										$result = $con->query($sql);
										
										if(file_exists($dir_path) && file_exists($dir_path2)){
											if(!dir_is_empty($dir_path) && !dir_is_empty($dir_path2)){
												$extension_array = array('png');

												if(is_dir($dir_path) && is_dir($dir_path2)){
													$files = scandir($dir_path);
													$files2 = scandir($dir_path2);

													if((count($files)-2) == $result->num_rows && (count($files2)-2) == $result->num_rows){

														while($columna = $result->fetch_assoc()){
															echo "<tr>";
																echo "<td>".$columna['n0mbr3s']." ".$columna['4p3ll1d0s']."</td>";
																echo "<td>".$columna['c3lul4r']."</td>";
																echo "<td>".$columna['3m41l']."</td>";
																echo "<td>".$columna['f3ch4']."</td>";
																//echo "<th><img src=$dir_path$files[$var] width=150px height=100px></th>";

																for($i=0;$i<count($files);$i++){
																	if($files[$i] != '.' && $files[$i] !='..'){
																		if($columna['c0d1g0_4d0p4d0'].".png" == $files[$i]){
																			echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
																			//echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
																		}
																	}
																}	


																for($i=0;$i<count($files2);$i++){
																	if($files2[$i] != '.' && $files2[$i] !='..'){
																		if(strcmp($columna['1m4g3n'], basename($files2[$i]))==0){
																			echo "<td><img src=$dir_path2$files2[$i] width=150px height=100px></td>";
																			//echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
																		} 
																	}
																}	

															echo "</tr>";
														}
													
													} else {
														//echo "archivos=>".(count($files) - 2);
														//echo "base de datos=>".$result->num_rows;
													}
												}
											} 
										} 

										
										function dir_is_empty($dir) {
										  $handle = opendir($dir);
										  while (false !== ($entry = readdir($handle))) {
										    if ($entry != "." && $entry != "..") {
										      closedir($handle);
										      return FALSE;
										    }
										  }
										  closedir($handle);
										  return TRUE;
										}
									?>

								</div>	
							</div>
						<!-- fin de la lista desde la base de datos -->
					</table>
					<input type="submit" id="cerrar_reg_adop" value="Volver a pantalla principal">


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
		});
	</script>
	<script>
		$('#slickk').ddslick({
			width: "100%",
			height: "100%",
			imagePosition: "left",
			selectText: "Seleccione al futuro adoptado",
			onSelected: function(data){
				$("#nombreanimall").val(data.selectedData.value);
			}
		});
	</script>
	<script src="js/main.js"></script>
</html>