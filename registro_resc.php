<?php

	require_once "conexion.php";
	
	$fecha = $img = $edad = $tipoanimal = "";

	$fecha_e = $img_e = $edad_e = $tipoanimal_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
                             

                if(empty(trim($_POST["edad"]))){
                    $edad_e="Ingrese una edad aproximada";
                }else{
                    $edad=trim($_POST["edad"]);
                }

                        
               
                
                if(empty(trim($_FILES["file"]["name"]))){
                    
                } else {
                    
                }


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de adopción";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }


                if(empty($edad_e) &&
                    empty($tipoanimal_e) &&
                    empty($fecha_e)){


                    $sql = "INSERT INTO rescate (f3ch4, 4n1m4l, 3d4d, f0t0) VALUES (?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssss", $fec, $ani, $ed, $im);
                
                        $fec = $fecha;
                        $ani = $tipoanimal;
                        $ed = $edad;
                        $im = $img;
                              
                        if(mysqli_stmt_execute($stmt)){
                            header("location: landing.php");
                        } else {
                            echo "Algo salió mal, intentalo una vez más";
                        }
                    }


                } else {
                    echo ".-'-> algo va mal ";
                }
         
        mysqli_close($con); 
    }
	



	

?>