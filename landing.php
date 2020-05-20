<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
    require_once "conexion.php";

?>





  <!DOCTYPE html>
  <html lang="en">

  <head>
      <title>Amor Animal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/search_langing_page.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>



  </head>


  <body>
  <div class="limiter">
    <div class="container-login100">
    <div class="wrap-login100">
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex flex-column align-items-center">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="images/AA.png" alt="IMG">
          </div>
            <div class="login100-form-title2">
            Mejorando vidas y cambiando el mundo
          </div>
        
        <div class="countdown justify-content-center" data-count="2021/12/3">
          
          <div>
            <h3>103</h3>
            <h4>Adopatados</h4>
          </div>

          <div>
            <h3>05</h3>
            <h4>Rescatados</h4>
          </div>

          <div>
            <h3>%M</h3>
            <h4>Donaciones</h4>
          </div>

          <div>
            <h3>%S</h3>
            <h4>Croquetas consumidas</h4>
          </div>

        </div>

        <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                <a href="registro_adopcion.php">Registrar adopción</a>
              </button>

              <button class="login100-form-btn">
                <a href="registro_rescate.php">Registrar rescate</a>
              </button>

              <button class="login100-form-btn">
                <a href="registro_alimento.php">Registrar alimentos</a>
              </button>

              <button class="login100-form-btn" id="button">
                Adopciones
              </button>

              <button class="login100-form-btn" id="cerrar_sesion">
                <a href="cerrar_sesion.php">Cerrar sesión</a>
              </button>

            </div>
   
      </div>

    </header><!-- End #header -->
    </div>
    </div>

   
   

    <!-- Countdown -->
    <script src="vendor/jquery/jquery.countdown.min.js"></script>
    <script src="vendor/jquery/main.js"></script>

    <script>
      function getValor() {
        var x = document.getElementById("id").value;
        //document.getElementById("demo").innerHTML = x;
        return x;
      }
    </script>
   


    </div>
  </body>

    <div class="bg-modal">
      <div class="modal-content">
        <div class="close">+</div>
        <div class="login100-form-title">
          Seguimiento de adopción
        </div>
        <img src="images/inicio.png">

        <form action="#">

          <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="pass" placeholder="Identificación de mascota" id="id">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
          </span>
          </div>
            

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" id="button_codigo">
                  Buscar
                </button>
                  
                <button class="login100-form-btn">
                   <a href="lista_todos.php">Todos</a>
                </button>
                
                <button class="login100-form-btn" id="closse">
                  Cerrar
                </button>
            </div>
        </form>


      </div>


      <div class="bg-modal2">
        <div class="modal-content2">
          <div class="close2">+</div>
          <div class="login100-form-title">
            Seguimiento de adopción
          </div>

          <table id="customers">
            <tr>
                <th>Nombre y apellido</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Fecha de adopción</th>
                <th>Adoptado</th>
                <th>Adoptante</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </table>
            <!-- aqui empieza la busqueda -->
            <!--<?php 
                    $dir_path="img_adopciones/adoptados/";
                    $dir_path2="img_adopciones/adoptantes/";

                    $sql = "SELECT * FROM adoptante";
                    $result = $con->query($sql);
                    
                    if(file_exists($dir_path) && file_exists($dir_path2)){
                      if(!dir_is_empty($dir_path) && !dir_is_empty($dir_path2)){
                        $extension_array = array('png');

                        if(is_dir($dir_path) && is_dir($dir_path2)){
                          $files = scandir($dir_path);
                          $files2 = scandir($dir_path2);

                          if((count($files)-2) == $result->num_rows && (count($files2)-2) == $result->num_rows){

                            while($columna = $result->fetch_assoc()){
                              echo "<tr>";
                                echo "<td>".$columna['n0mbr3s']." ".$columna['4p3ll1d0s']."</td>";
                                echo "<td>".$columna['c3lul4r']."</td>";
                                echo "<td>".$columna['3m41l']."</td>";
                                echo "<td>".$columna['f3ch4']."</td>";
                                //echo "<th><img src=$dir_path$files[$var] width=150px height=100px></th>";

                                for($i=0;$i<count($files);$i++){
                                  if($files[$i] != '.' && $files[$i] !='..'){
                                    if($columna['c0d1g0_4d0p4d0'].".png" == $files[$i]){
                                      echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
                                      //echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
                                    }
                                  }
                                } 


                                for($i=0;$i<count($files2);$i++){
                                  if($files2[$i] != '.' && $files2[$i] !='..'){
                                    if(strcmp($columna['1m4g3n'], basename($files2[$i]))==0){
                                      echo "<td><img src=$dir_path2$files2[$i] width=150px height=100px></td>";
                                      //echo "<td><img src=$dir_path$files[$i] width=150px height=100px></td>";
                                    } 
                                  }
                                } 

                              echo "</tr>";
                            }
                          
                          } else {
                            //echo "archivos=>".(count($files) - 2);
                            //echo "base de datos=>".$result->num_rows;
                          }
                        }
                      } 
                    } 

                    
                    function dir_is_empty($dir) {
                      $handle = opendir($dir);
                      while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                          closedir($handle);
                          return FALSE;
                        }
                      }
                      closedir($handle);
                      return TRUE;
                    }
                  ?>-->
            <!-- aqui termina la busqueda -->





        

          </div>
      </div>



  </html>