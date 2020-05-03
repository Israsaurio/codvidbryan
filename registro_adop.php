<?php

	require_once "conexion.php";
	
	$nombre = $apellido = $celular = $ci = $email = $img = $fecha = "";

	$nombre_e = $apellido_e = $celular_e = $ci_e = $email_e = $img_e = $fecha_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
        

                if(empty(trim($_POST["ci"]))){
                    $ci_e = "Número de cédula de indentidad requerida, campo vacío";
                } else {
                    $ci = trim($_POST["ci"]);
                }

            //if($bandera_registro==0){
                if(empty(trim($_POST["nombre"]))){
                    $nombre_e="Ingrese su(s) nombre(s)";
                }else{
                    $nombre=trim($_POST["nombre"]);
                }

                if(empty(trim($_POST["apellido"]))){
                    $apellido_e="Ingrese su(s) apellido(s)";
                }else{
                    $apellido=trim($_POST["apellido"]);
                }

                if(empty(trim($_POST["celular"]))){
                    $celular_e="Ingrese su número celular";
                }else{
                    $celular=trim($_POST["celular"]);
                }

                if(empty(trim($_POST["email"]))){
                    $email_e="Ingrese su correo electrónico";
                }else{
                    $email=trim($_POST["email"]);
                }

               
                
                if(empty(trim($_FILES["file"]["name"]))){
                    
                }


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de adopción";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }

                //$fecha = date("Y/m/d");

                if(empty($nombre_e) &&
                    empty($apellido_e) &&
                    empty($celular_e) &&
                    empty($ci_e) &&
                    empty($email_e) &&
                    empty($fecha_e)){

                    echo "aqui";

                    $sql = "INSERT INTO adoptante (n0mbr3s, 4p3ll1d0s, c3lul4r, c1, 3m41l, f3ch4, 1m4g3n) VALUES (?,?,?,?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "sssssss", $nom, $ape, $c, $cc, $mail, $fec, $img);
                
                        $nom = $nombre;
                        $ape = $apellido;
                        $c = $celular;
                        $cc = $ci;
                        $mail = $email;
                        $img = "imag4n";
                        $fec = $fecha;
                              
                        if(mysqli_stmt_execute($stmt)){
                            header("location: landing.php");
                        } else {
                            echo "Algo salió mal, intentalo una vez más";
                        }
                    }


                } else {
                    echo ".-'-> algo va mal ".$nombre_e." ".$apellido_e." ".$celular_e." ".$ci_e." ".$email_e." ".$pass_e."->".$band_adm_ind;
                }
         
        mysqli_close($con); 
    }
	



	

?>