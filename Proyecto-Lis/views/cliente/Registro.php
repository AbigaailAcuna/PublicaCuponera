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
        
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" value="<?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['nombres'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['nombres']; unset($_SESSION['errors']['nombres']); ?></div><br>
          <?php endif; ?>
        
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['apellidos'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['apellidos']; unset($_SESSION['errors']['apellidos']);?></div><br>
          <?php endif; ?>
        
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo isset($_SESSION['telefono']) ? $_SESSION['telefono'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['telefono'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['telefono']; unset($_SESSION['errors']['telefono']); ?></div><br>
          <?php endif; ?>
      
        <input type="text" name="direccion" id="direccion" placeholder="Dirección" value="<?php echo isset($_SESSION['direccion']) ? $_SESSION['direccion'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['direccion'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['direccion']; unset($_SESSION['errors']['direccion']); ?></div><br>
          <?php endif; ?>
        
        <input type="text" name="dui" id="dui" placeholder="Dui" value="<?php echo isset($_SESSION['dui']) ? $_SESSION['dui'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['dui'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['dui']; unset($_SESSION['errors']['dui']); ?></div><br>
          <?php endif; ?>
        
        <input type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; ?>">
        <?php if (!empty($_SESSION['errors']['correo'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['correo']; unset($_SESSION['errors']['correo']); unset($_SESSION['correo']);  ?></div><br>
          <?php endif; ?>
        
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <?php if (!empty($_SESSION['errors']['password'])): ?>
          <div class="redmessagee"><?php echo $_SESSION['errors']['password']; unset($_SESSION['errors']['password']);  ?></div><br>
          <?php endif; ?>
        
        <button name="signup" id="signup" >Registrarse</button>
        <?php
        $errors = array();
        unset($_SESSION['nombres']);
        unset($_SESSION['apellidos']);
        unset($_SESSION['telefono']);
        unset($_SESSION['direccion']);
        unset($_SESSION['dui']);
        unset($_SESSION['correo']);
        unset($_SESSION['password']);

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
