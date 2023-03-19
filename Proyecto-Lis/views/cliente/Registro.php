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
  <div class="vid-container">
    <form method="POST" action="controllers/userRegistro.php">
      <div class="box">
        <h1>Registro</h1>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" required />
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required/>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" pattern="[0-9_-]{8,9}" required/>
        <input type="text" name="direccion" id="direccion" placeholder="Dirección" required/>
        <input type="text" name="dui" id="dui" placeholder="Dui" pattern="[0-9_-]{9,10}" required/>
        <input type="email" name="correo" id="correo" placeholder="Correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
        <input type="password" name="password" id="password" placeholder="Contraseña" required/>
        <button name="signup" id="signup" >Registrarse</button>
        <p>¿Ya posees una cuenta?</p> 
        <p><a href="http://localhost/Proyecto-Lis/views/cliente/InicioSesion.php">Iniciar Sesión</a><p>
        <?php 
        //mensaje de error ?>
      </div>
    </form>
  </div>
</body>
<footer>
<!---?php include('../layouts/footer.php'); ?--->
</footer>
</html>
