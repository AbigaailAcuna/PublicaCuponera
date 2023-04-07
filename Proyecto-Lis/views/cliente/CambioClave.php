<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validar Correo</title>
  <link href="http://localhost/Proyecto-Lis/recursos/css/log.css" rel="stylesheet" />
</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="?c=Usuario&a=cambiarClave" method="POST">
        <h1>Validar Token</h1>
        <input type="email" name="correo" id="correo" placeholder="Correo" required  value="<?=$_SESSION['login_data']['Correo']?>"/>
        <input type="password" name="clave1" id="clave1" placeholder="Contraseña" required/>
        <input type="password" name="clave2" id="clave2" placeholder="Contraseña" required/>
        <input type="password" name="clave3" id="clave3" placeholder="Contraseña" required/>
        <button name="validar" id="validar">Cambiar contraseña</button>
        
        <?php
        if (isset($_SESSION['error'])) {
          echo '<div class="messageerror">';
          echo '<p>' . $_SESSION['error'] . '</p>';
          echo '</div>';
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['message'])) {
          echo '<div class="message">';
          echo '' . $_SESSION['message'] . '';
          echo '<p class="message"><a href="?c=Principal&a=inicio">Iniciar Sesión</a></p>';
          unset($_SESSION['message']);
        }
        ?>

      </form>
  </div>
</div>
</body>
</html>