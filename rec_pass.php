<?php

    //iniciando sesion
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: landing.php");
        exit;
    }


    require_once "conexion.php";

    $ci = "";
    
    $ci_err = $session_err = "";


  

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(empty(trim($_POST["ci"]))){
            $ci_err = "Ingrese su cedula de identidad";
            $session_err = "Revise su cédula de identidad y contraseña";
        } else {
            $ci = trim($_POST["ci"]);
        }
    
       


    //validando ci
    if(empty($ci_err)){
        $sql = "SELECT 3m41l FROM administrador WHERE c1 = ?";
              
        if($stmt = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$para_ci);
            $para_ci = trim($_POST["ci"]);
            //echo $para_ci;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt,$ci);

              
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