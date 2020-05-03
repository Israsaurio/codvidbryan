<?php

	require_once "conexion.php";
	
	$nombre = $apellido = $celular = $ci = $email = $pass = $img = $est = "";

	$nombre_e = $apellido_e = $celular_e = $ci_e = $email_e = $pass_e = $img_e = $est_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
        $bandera_registro = 0;
		//validando si cedula de identidad es unica
           	if(empty(trim($_POST["ci"]))){
        		$ci_e = "Número de cédula de indentidad requerida, campo vacío";
        	} else {
        		$sql = "SELECT * FROM administrador WHERE c1 = ?";
                if($stmt = mysqli_prepare($con,$sql)){
                    mysqli_stmt_bind_param($stmt,"s",$param_username);
                    $param_username = trim($_POST["ci"]);
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $ci_e = "Número de cédula en uso";
                            $bandera_registro++;
                        }else{
                            $ci = trim($_POST["ci"]);
                        }
                    
                    } else {
                      echo "Algo salió mal, inténtalo mas tarde";
                    }
        	    }else{
                  echo "sin cadena";
                }	
            }


            if($bandera_registro==0){
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

                if(empty(trim($_POST["pass"]))){
                    $pass_e="Ingrese una contraseña";
                }else{
                    $pass=trim($_POST["pass"]);
                }
                

                if(isset($_POST["switch-button"])){
                    //it exists
                    $band_adm_ind = 1;
                } else{
                    //it does not exist.
                    $band_adm_ind = 0;
                    
                }


                if(empty(trim($_FILES["file"]["name"]))){
                    

                }

                $fecha = date("Y/m/d");

                if(empty($nombre_e) &&
                    empty($apellido_e) &&
                    empty($celular_e) &&
                    empty($ci_e) &&
                    empty($email_e) &&
                    empty($pass_e)){

                    echo "aqui";

                    $sql = "INSERT INTO administrador (n0mbr3s, 4p3ll1d0s, c3lul4r, c1, 3m41l, p4ssw0rd, 1m4g3n, f3ch4, b4nd3r4) VALUES (?,?,?,?,?,?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "sssssssss", $nom, $ape, $c, $cc, $mail, $pa, $img, $fec, $ba);
                
                        $nom = $nombre;
                        $ape = $apellido;
                        $c = $celular;
                        $cc = $ci;
                        $mail = $email;
                        $pa = password_hash($pass, PASSWORD_DEFAULT); //cifrado de contraseña
                        $img = "imag4n";
                        $fec = $fecha;
                        $ba = $band_adm_ind;        
                        if(mysqli_stmt_execute($stmt)){
                            header("location: index.php");
                        } else {
                            echo "Algo salió mal, intentalo una vez más";
                        }
                    }


                } else {
                    echo ".-'-> algo va mal ".$nombre_e." ".$apellido_e." ".$celular_e." ".$ci_e." ".$email_e." ".$pass_e."->".$band_adm_ind;
                }
            } else {
                echo '<script language="javascript">alert("El número de identidad ya esta en uso, reiniciando campos . . .");</script>';
                //echo $ci_e;
            }

        mysqli_close($con); 
    }
	



	

?>