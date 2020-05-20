<?php

	require_once "conexion.php";
	
	$nombre = $apellido = $celular = $ci = $email = $img = $img_animal = $fecha = $directorio = $nombre_img = $ruta = $tipo_img = "";


	$nombre_e = $apellido_e = $celular_e = $ci_e = $email_e = $img_e = $img_animal_e = $fecha_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
        
               $directorio_copia = $_SERVER['DOCUMENT_ROOT'].'/animalitos/img_adopciones/adoptados/';
               $directorio_origi = $_SERVER['DOCUMENT_ROOT'].'/animalitos/img_rescatados/';


                //echo "Datos recibidos| nombre=>".$nombre.",apellido=>".$apellido.",celular=>".$celular.",animal elegido=>".$img_animal.",animal=>".$img.",carnet=>".$ci.",email=>".$email.",fecha=>".$fecha;

                //echo "DATOS RECIBIDOS:".$_POST['ci'].",".$_POST['nombre'].",".$_POST['apellido'].",".$_POST['celular'].",".$_POST['email'].",enviaod form=>".$_POST['nombreanimal'].",adoptante=>".$_FILES['file']['name'].",".$_POST['date'];


                if((trim($_POST["ci"])) == null){
                    $ci_e = "Número de cédula de indentidad requerida, campo vacío";
                } else {
                    $ci = trim($_POST["ci"]);
                }

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

                if((trim($_POST["celular"])) == null){
                    $celular_e="Ingrese su número celular";
                }else{
                    $celular=trim($_POST["celular"]);
                }

                if(empty(trim($_POST["email"]))){
                    $email_e="Ingrese su correo electrónico";
                }else{
                    $email=trim($_POST["email"]);
                }


                if((trim($_POST["nombreanimal"]))==null){
                    $img_animal_e ="seleccione un animal de adopción";
                } else {
                    $img_animal = trim($_POST["nombreanimal"]);
                }
               
                
                if(empty(trim(($_FILES["file"]["name"])))){
                    $img_e = "Ingrese una imagen";
                } else {
                    $verificacion = $_FILES["file"]["type"];
                    if($verificacion != "image/jpg" && $verificacion != "image/png" && $verificacion != "image/jpeg"){
                        $img_e = "Ingrese un tipo de imagen";
                    } else {
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/animalitos/img_adopciones/adoptantes/';
                        $nombre_img = $_FILES["file"]["name"];
                        $ruta = $directorio;
                    }
                }


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de adopción";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }

                
                if(empty($nombre_e) &&
                    empty($apellido_e) &&
                    empty($celular_e) &&
                    empty($img_animal_e) &&
                    empty($img_e) &&
                    empty($ci_e) &&
                    empty($email_e) &&
                    empty($fecha_e)){


                    $sql = "INSERT INTO adoptante (n0mbr3s, 4p3ll1d0s, c3lul4r, c1, 3m41l, f3ch4, 1m4g3n, 1m4g3n_4d0pt4d0, c0d1g0_4d0p4d0) VALUES (?,?,?,?,?,?,?,?,?)";

                    $sql2 = "SELECT * FROM rescate WHERE f0t0 LIKE '$img_animal%'";


                    if($stmt = mysqli_prepare($con, $sql)){

                            if($res = mysqli_query($con, $sql2)){
                                if (mysqli_num_rows($res) > 0) {
                                    while($row = mysqli_fetch_assoc($res)) {
                                       $codigo_unico = $row["c0d1g0"];
                                    }                                 
                                }




                            mysqli_stmt_bind_param($stmt, "sssssssss", $nom, $ape, $c, $cc, $mail, $fec, $img, $img2, $cd);
                    
                            //generador unico para cada adopcion si existe un mismo adoptante para varios animales
                            $iden=date_create();
                            $hash = date_timestamp_get($iden);

                            $nom = $nombre;
                            $ape = $apellido;
                            $c = $celular;
                            $cc = $ci;
                            $mail = $email;
                            $fec = $fecha;
                            $img = $ruta.$nombre.$apellido.$ci.$hash.".png";
                            $img2 = $img_animal;
                            $cd = $codigo_unico;

                            move_uploaded_file($_FILES["file"]["tmp_name"],$ruta.$nombre.$apellido.$ci.$hash.".png");

                            rename($directorio_origi.$img_animal,$directorio_copia.$codigo_unico.".png");
                                  
                            if(mysqli_stmt_execute($stmt)){
                                //header("refresh: 1;url=landing.php");
                                header("refresh: 0;url=landing.php");
                                //echo '<script language="javascript">alert("Mensaje de prueba");</script>';

                            } else {
                                echo "Algo salió mal, intentalo una vez más";
                            }
                        
                        }


                } else {
                    //echo ".-'-> algo va mal ".$nombre_e." ".$apellido_e." ".$celular_e." ".$ci_e." ".$email_e." ,imagen=>".$nombre_img;
                    header("Refresh:0");
                    echo '<script language="javascript">alert("Revise los datos introducidos");</script>';
                    
                }
         
                mysqli_close($con); 
        } else {
            //echo "nombre=>".$nombre_e.",apellido=>".$apellido_e.",celular=>".$celular_e.",animal elegido=>".$img_animal_e.",animal=>".$img_e.",carnet=>".$ci_e.",email=>".$email_e.",fecha=>".$fecha_e;
            header("Refresh:0");
            echo '<script language="javascript">alert("Revise los datos introducidos/seleccionados");</script>';
        }
    }
	

    function get_file_extension($file_name) {
        //return substr(strrchr($file_name,'.'),4);
        //return strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $val = exif_imagetype($file_name);
        if($val == 1 || $val == 2){
            return $val;
        } else {
            return ".error";
        }
    }	
?>