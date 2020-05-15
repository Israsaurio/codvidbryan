<?php

	require_once "conexion.php";
	
	$fecha = $alimento = $cantidad = "";

	$fecha_e = $alimento_e = $cantidad_e = "";

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
                             
                
                if((trim($_POST["alimento-empaque"])) == null){
                    $alimento_e="Ingrese el tipo de alimento";
                } else {
                    $alimento = trim($_POST["alimento-empaque"]);
                }   
                                       

                if(empty(trim($_FILES["file"]["name"]))){
                    
                } 


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de donación";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }


                if(empty(trim($_POST["especie"]))){
                    $tipoanimal_e="Ingrese un tipo de animal";
                } else {
                    $tipoanimal = trim($_POST["especie"]);
                }                    



                if( empty($tipoanimal_e) &&
                    empty($edad_anio_e) &&
                    empty($edad_meses_e) &&
                    empty($fecha_e)){


                    $sql = "INSERT INTO rescate (f3ch4, 4n1m4l, 3d4dA, 3d4dM, f0t0) VALUES (?,?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "sssss", $fec, $ani, $eda, $edm, $im);
                
                        $fec = $fecha;
                        $ani = $tipoanimal;
                        $eda = $edad_anio;
                        $edm = $edad_meses;
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