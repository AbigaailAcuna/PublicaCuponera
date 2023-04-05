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
  <form action="?c=Usuario&a=validar" method="POST" >
    <div class="vid-container">
      <div class="box">
        <h1>Inicio de Sesión</h1>
        
        <input type="email" name="correo" id="correo" placeholder="Correo" required/>
        <input type="password" name="clave" id="clave" placeholder="Contraseña" required/>
        <button name="login" id="login">Iniciar Sesión</button>
        
        <p>¿No posees una cuenta?</p>
        <p><a href="?c=Principal&a=registro">Registrarse</a><p>
        <p>¿Quieres cambiar tu Contraseña?</p>
        <p><a href="?c=Principal&a=registro">Cambiar contraseña</a><p>
        
        <?php //include_once('../../controllers/userInicioSesion.php'); ?>
      </div>
    </div>
  </form>
</body>
<footer>
<?php include('views/layouts/footer.php'); ?>
</footer>
</html>
