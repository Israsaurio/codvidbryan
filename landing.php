<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
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
        <input class="input100" type="password" name="pass" placeholder="Identificación de mascota">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
        </span>
        </div>
          

          <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                  Buscar
                </button>

              <button class="login100-form-btn">
                Todos
              </button>

              <button class="login100-form-btn" id="closse">
                Cerrar
              </button>
          </div>
        </form>


      </div>

  </html>