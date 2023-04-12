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
        <?php if (!empty($_SESSION['errors']['nombres'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['nombres']; unset($_SESSION['errors']['nombres']); $errors = array(); ?></div><br>
          <?php endif; ?>
        
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        <?php if (!empty($_SESSION['errors']['apellidos'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['apellidos']; unset($_SESSION['errors']['apellidos']); $errors = array(); ?></div><br>
          <?php endif; ?>
        
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
        <?php if (!empty($_SESSION['errors']['telefono'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['telefono']; unset($_SESSION['errors']['telefono']); $errors = array(); ?></div><br>
          <?php endif; ?>
      
        <input type="text" name="direccion" id="direccion" placeholder="Dirección">
        <?php if (!empty($_SESSION['errors']['direccion'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['direccion']; unset($_SESSION['errors']['direccion']); $errors = array();?></div><br>
          <?php endif; ?>
        
        <input type="text" name="dui" id="dui" placeholder="Dui">
        <?php if (!empty($_SESSION['errors']['dui'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['dui']; unset($_SESSION['errors']['dui']); $errors = array(); ?></div><br>
          <?php endif; ?>
        
        <input type="email" name="correo" id="correo" placeholder="Correo">
        <?php if (!empty($_SESSION['errors']['correo'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['correo']; unset($_SESSION['errors']['correo']); $errors = array(); ?></div><br>
          <?php endif; ?>
        
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <?php if (!empty($_SESSION['errors']['password'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['password']; unset($_SESSION['errors']['password']); $errors = array(); ?></div><br>
          <?php endif; ?>
        
        <button name="signup" id="signup" >Registrarse</button>
        
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="messageerror">';
            echo '' . $_SESSION['error'] . '';
            echo '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <p class="message">¿Ya posees una cuenta?<a href="?c=Principal&a=inicio"> Iniciar Sesión</a></p>
      </form>
  </div>
</div>
</body>
</html>
