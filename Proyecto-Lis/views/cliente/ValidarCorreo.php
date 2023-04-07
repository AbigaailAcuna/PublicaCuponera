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
      <form class="login-form" action="?c=Usuario&a=validarRegistro" method="POST">
        <h1>Validar Token</h1>
        <input type="email" name="correo" id="correo" placeholder="Correo" required/>
        <input type="text" name="token" id="token" placeholder="Token" required/>
        <button name="validar" id="validar">Validar</button>
        
        <?php
        if (isset($_SESSION['error'])) {
          echo '<div class="messageerror"><i>&#9888;</i>';
          echo '' . $_SESSION['error'] . '';
          echo '</div>';
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['message'])) {
          echo '<div class="messagee"><i>&#9888;</i>';
          echo '' . $_SESSION['message'] . '';
          echo '</div>';
          unset($_SESSION['message']);
        }
        ?>

        <p class="message"><a href="?c=Principal&a=inicio"> Iniciar Sesión</a></p>
      </form>
  </div>
</div>
</body>
</html>
