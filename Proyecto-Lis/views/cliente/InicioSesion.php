<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>
  <link href="http://localhost/Proyecto-Lis/recursos/css/log.css" rel="stylesheet" />
</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="?c=Usuario&a=validar" method="POST">
        <h1>Inicio de Sesión</h1>
        <input type="email" name="correo" id="correo" placeholder="Correo"/>
        <input type="password" name="clave" id="clave" placeholder="Contraseña"/>
        <button name="login" id="login">Iniciar Sesión</button>
        
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="messageerror">';
            echo '' . $_SESSION['error'] . '';
            echo '</div>';
            unset($_SESSION['error']);
        }
        ?>
        
        <p class="message"><a href="?c=Principal&a=cambiarClaveOT">¿Olvidaste tu contraseña?</a></p>
        <p class="message"><a href="?c=Principal&a=registro">¿No posees una cuenta?</a></p>
      </form>
    </div>
  </div>
</body>
</html>
