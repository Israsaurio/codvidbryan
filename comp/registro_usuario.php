<?php

	require_once "conexion.php";
	
	$nombre = $apellido = $celular = $ci = $email = $pass = $fecha = $img = "";

	$nombre_e = $apellido_e = $celular_e = $ci_e = $email_e = $pass_e = $fecha_e = $img_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//validando si cedula de identidad es unica
        if(is_string($)){
        	if(empty(trim($_POST["ci"]))){
        		//echo trim($_POST["username"]);
	            $ci_e = "Número de cédula de indentidad requerida, campo vacío";
        	} else {
        		//verificando el c1 que no este asociado a un nombre
        		$sql = "SELECT c1 FROM administrador WHERE c1 = ?";
        		if($stmt = mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$param_username);
                $param_username = trim($_POST["ci"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $ci_e = "Número de cédula en uso";
                    } else {
                        $ci = trim($_POST["ci"]);
                    }
                    
                } else {
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }

        	}	
        } else {
        	$ci_e = "El número de cédula de identidad debe ser numérico";
        }
        
	}



	

?>