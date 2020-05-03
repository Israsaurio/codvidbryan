<?php
    
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_DBNAME','amoranimal');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DBNAME);


    if($con === false ){
        die("Error en conexión, contactese con el administrador " . mysqli_connect_error());
    }
?>