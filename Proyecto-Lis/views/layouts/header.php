<!--Template general, de esta van a heredar las otras-->
<?php //session_start();
error_reporting(E_ERROR|E_PARSE);?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Cuponera LIS</title>
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="./recursos/css/header.css" rel="stylesheet" />
      <link href="./recursos/css/pago.css" rel="stylesheet" />
</head>

<body>


      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid px-4">
                  <a class="navbar-brand" href="#!">Cuponera</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                              <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Inicio</a></li>
                              </li>
                        </ul>
                        <a href="#exampleModalToggle" data-bs-toggle="modal"><i class="bi bi-file-text" style="font-size: 2rem; color: rgb(0, 0, 0);"></i></a>
                        <div class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill" style="font-size: 2rem; color: rgb(0, 0, 0);"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href=""><?=$_SESSION['login_data']['Correo']?></a></li>
                                    <li><a class="dropdown-item" href="?c=Principal&a=inicio">Iniciar Sesión</a></li>
                                    <li><a class="dropdown-item" href="?c=Principal&a=registro">Registrarse</a></li>
                                    <li>
                                          <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="?c=Usuario&a=logout">Cerrar Sesión</a></li>
                              </ul>
                        </div>
                        <?php
                    if(!is_null($_SESSION['login_data'])) {

                        ?>
                        <button type="button" id="carrito" name="carrito" value="carrito" class="btn btn-outline-dark" onclick="location.href='?c=Principal&a=carrito';">
                        
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                              <?php
                              $count = 0;
                              if (isset($_SESSION)) {
                                    if (isset($_SESSION['carrito'])) {
                                          foreach ($_SESSION['carrito'] as $prod) {
                                                $count += $prod['Cantidad'];
                                          }
                                    }
                              }
                              echo $count;
                              ?>
                        </span>
                        </button>
                        <?php
                    } else {
                        echo 'Inicie sesión';
                    }
                ?>


                  </div>
            </div>
      </nav>