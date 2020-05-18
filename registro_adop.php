<?php

	require_once "conexion.php";
	
	$nombre = $apellido = $celular = $ci = $email = $img = $img_animal = $fecha = $directorio = $nombre_img = $ruta = $tipo_img = "";

	$nombre_e = $apellido_e = $celular_e = $ci_e = $email_e = $img_e = $img_animal_e = $fecha_e = "";	

	//obteniendo datos del servidor
	if($_SERVER["REQUEST_METHOD"] === "POST"){
        
               

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
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/animalitos/img_adopciones/';
                    $nombre_img = $_FILES["file"]["name"];
                    $ruta = $directorio;
                }


                if(empty(strtotime($_POST["date"]))){
                    $fecha_e="Ingrese fecha de adopción";
                } else {
                    $fecha = strtotime($_POST["date"]);
                    $fecha = date("Y/m/d");
                }

                 echo "Antes de grabar => ".$nombre_e." ".$apellido_e." ".$celular_e." ".$ci_e." ".$email_e." ,imagen=>".$img_e.", nombre imagen=>".$nombre_img.", tipo imagen=> ".$tipo_img;

                if(empty($nombre_e) &&
                    empty($apellido_e) &&
                    empty($celular_e) &&
                    empty($img_e) &&
                    empty($ci_e) &&
                    empty($email_e) &&
                    empty($fecha_e)){

                    echo "aqui";

                    $sql = "INSERT INTO adoptante (n0mbr3s, 4p3ll1d0s, c3lul4r, c1, 3m41l, f3ch4, 1m4g3n, 1m4g3n_4d0pt4d0) VALUES (?,?,?,?,?,?,?,?)";

                    if($stmt = mysqli_prepare($con, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssssssss", $nom, $ape, $c, $cc, $mail, $fec, $img, $img2);
                
                        $nom = $nombre;
                        $ape = $apellido;
                        $c = $celular;
                        $cc = $ci;
                        $mail = $email;
                        $fec = $fecha;
                        $img = $ruta.$nombre.".png";
                        $img2 = $img_animal.".png";
                        

                        move_uploaded_file($_FILES["file"]["tmp_name"],$ruta.$nombre.".png");
                              
                        if(mysqli_stmt_execute($stmt)){
                            header("location: landing.php");
                        } else {
                            echo "Algo salió mal, intentalo una vez más";
                        }
                    }


                } else {
                    echo ".-'-> algo va mal ".$nombre_e." ".$apellido_e." ".$celular_e." ".$ci_e." ".$email_e." ,imagen=>".$nombre_img;
                }
         
        mysqli_close($con); 
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