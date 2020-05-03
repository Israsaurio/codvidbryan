<?php

    //iniciando sesion
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: landing.html");
        exit;
    }


    require_once "conexion.php";

    $asociacion = $password = "";
    
    $asociacion_err = $session_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(empty(trim($_POST["asociacion"]))){
            $asociacion_err = "Ingrese el nombre de la asociación";
            $session_err = "Revise su usuario y contraseña";
        } else {
            $asociacion = trim($_POST["asociacion"]);
        }
    
        
    
        if(empty(trim($_POST["password"]))){
            $password_err = "Ingrese su contraseña";
            $session_err = "Revise su usuario y contraseña";
        } else {
            $password = trim($_POST["password"]);
        }
   


    //validando credenciales
    
    if(empty($asociacion_err) && empty($password_err)){
        $sql = "SELECT asociacion,identificacion,password FROM registro_asociacion WHERE asociacion = ?";
        
       
        if($stmt = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$param_asociacion);
            $param_asociacion = trim($_POST["asociacion"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            
            if(mysqli_stmt_num_rows($stmt) == 1){
               mysqli_stmt_bind_result($stmt,$asociacion,$identificacion,$hashed_password);
                
                if(mysqli_stmt_fetch($stmt)){
                    
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        
                        //guardando datos en variables de sesion
                        $_SESSION["loggedin"] = true;
                        $_SESSION["asociacion"] = $asociacion;
                        $_SESSION["password"] = $password;
                        
                        header("location: bienvenida.php");
                    } else {
                        $password_err = "Datos incorrectos";
                        //$session_err = "Revise su usuario y contraseña";
                    }
                }    
            } else {
                    $asociacion_err = "Datos de ingreso incorrectos";
                    //$session_err = "Revise su usuario y contraseña";
                }        
        } else {
                $session_err = "Revise su usuario y contraseña";
            }      
        
    }
    
    mysqli_close($con);
}

?>