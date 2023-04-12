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
      <form class="login-form" action="?c=Usuario&a=cambiarClaveOlvidada" method="POST">
        <h1>Cambia tu contraseña</h1>
        <input type="text" name="token" id="token" placeholder="Token">
        <input type="password" name="clave1" id="clave1" placeholder="Nueva contraseña"/>
        <input type="password" name="clave2" id="clave2" placeholder="Confirma tu contraseña"/>
        <button name="enviar" id="enviar">Cambiar</button>
        
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