<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar contraseña</title>
  <link href="http://localhost/Proyecto-Lis/recursos/css/log.css" rel="stylesheet" />
</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="?c=Usuario&a=claveOlvidada" method="POST">
        <h1>¿Olvidaste tu contraseña?</h1>
        <input type="email" name="correo" id="correo" placeholder="Correo" >
        <button name="enviar" id="enviar">Enviar</button>
        <p class="message">Ingresa tu correo electronico para cambiar tu contraseña</p>


        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="messageerror">';
            echo '<p>' . $_SESSION['error'] . '</p>';
            echo '</div>';
            unset($_SESSION['error']);
          }
        ?>

      </form>
  </div>
</div>
</body>
</html>