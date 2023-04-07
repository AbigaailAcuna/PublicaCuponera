<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de usuario</title>
  <link href="http://localhost/Proyecto-Lis/recursos/css/log.css" rel="stylesheet" />

</head>
<body>
  <div class="r-page">
    <div class="form">
      <form class="login-form" method="POST" action="?c=Usuario&a=registrar">
        <h1>Registro</h1>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres">
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" pattern="[0-9_-]{8,9}">
        <input type="text" name="direccion" id="direccion" placeholder="Dirección">
        <input type="text" name="dui" id="dui" placeholder="Dui" pattern="[0-9_-]{9,10}">
        <input type="email" name="correo" id="correo" placeholder="Correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <button name="signup" id="signup" >Registrarse</button>
        
        <?php
        if (isset($_SESSION['error'])) {
          echo '<div class="messageerror">';
          echo '' . $_SESSION['error'] . '';
          echo '</div>';
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['message'])) {
          echo '<div class="message">';
          echo '' . $_SESSION['message'] . '';
          echo '</div>';
          unset($_SESSION['message']);
        }
        ?>

        <p class="message">¿Ya posees una cuenta?<a href="?c=Principal&a=inicio"> Iniciar Sesión</a></p>
      </form>
  </div>
</div>
</body>
</html>
