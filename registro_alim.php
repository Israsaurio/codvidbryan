<?php

	require_once "conexion.php";
	
	$fecha = $alimento = $cantidad = $img = $directorio = $nombre_img = "";

	$fecha_e = $alimento_e = $cantidad_e = $img_e = "";

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
                             
                               
                if((trim($_POST["alimento-empaque"])) == null){
                    $alimento_e="Ingrese el tipo de alimento";
                } else {
                    $alimento = trim($_POST["alimento-empaque"]);
                }   
                                       

                if(empty($_FILES["file"]["name"])){
                    $img_e = "Ingrese una imagen";
                } else {
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/animalitos/img_donaciones/';
                    $nombre_img = $_FILES['file']['name'];
                    
                }


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de donación";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }


                if((trim($_POST["cantidad"])) == null){
                    $cantidad_e="Ingrese una cantidad";
                } else {
                    $cantidad = trim($_POST["cantidad"]);
                }                    


                if(empty($alimento_e) &&
                    empty($img_e) &&
                    empty($cantidad_e) &&
                    empty($fecha_e)){


                    $sql = "INSERT INTO donacion (f3ch4, d0n4c10n, c4nt1d4d, 1m4g3n) VALUES (?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssss", $fec, $don, $can, $im);
                
                        $fec = $fecha;
                        $don = $alimento;
                        $can = $cantidad;
                        $im = $directorio.$alimento.$nombre_img.".png";


                        move_uploaded_file($_FILES['file']['tmp_name'],
                            $directorio.$alimento.$nombre_img.".png");

                              
                        if(mysqli_stmt_execute($stmt)){
                            header("location: landing.php");
                        } else {
                            echo "Algo salió mal, intentalo una vez más";
                        }
                    }


                } else {
                    echo "datos =>".$alimento_e.",".$img_e.",".$cantidad_e.",".$fecha_e;
                } 
         
        mysqli_close($con); 
    }
	



	

?>