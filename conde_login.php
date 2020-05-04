<?php

    //iniciando sesion
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: landing.php");
        exit;
    }


    require_once "conexion.php";

    $ci = $password = "";
    
    $ci_err = $session_err = $password_err = "";


  

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(empty(trim($_POST["ci"]))){
            $ci_err = "Ingrese su cedula de identidad";
            $session_err = "Revise su cédula de identidad y contraseña";
        } else {
            $ci = trim($_POST["ci"]);
        }
    
    
        if(empty(trim($_POST["pass"]))){
            $password_err = "Ingrese su contraseña";
            $session_err = "Revise su cédula de identidad y contraseña";
        } else {
            $password = trim($_POST["pass"]);
        }

   


    //validando credenciales
    
    if(empty($ci_err) && empty($password_err)){
        $sql = "SELECT c1,p4ssw0rd FROM administrador WHERE c1 = ?";
               
        if($stmt = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$para_ci);
            $para_ci = trim($_POST["ci"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            
            if(mysqli_stmt_num_rows($stmt) == 1){
               mysqli_stmt_bind_result($stmt,$ci,$hashed_password);
                
                if(mysqli_stmt_fetch($stmt)){
                    
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        
                        //guardando datos en variables de sesion
                        $_SESSION["loggedin"] = true;
                        $_SESSION["ci"] = $ci;
                        $_SESSION["pass"] = $password;
                        
                        header("location: landing.php");
                    } else {
                        $session_err = "Revise su usuario y contraseña";
                    }
                }    
            } else {
                    $session_err = "Revise su usuario y contraseña";
                }        
        } else {
                $session_err = "Revise su usuario y contraseña";
        }      
        
    }
        mysqli_close($con);
    } 

?>