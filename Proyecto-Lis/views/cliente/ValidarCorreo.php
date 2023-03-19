<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La cuponera</title>
    <link href="http://localhost/Proyecto-Lis/recursos/css/log.css" rel="stylesheet" />
</head>
<body>
  <form action="../../controllers/Validar.php" method="POST" >
    <div class="vid-container">
      <div class="box">
        <h1>Validar Token</h1>
        
        <input type="email" name="correo" id="correo" placeholder="Correo" required/>
        <input type="text" name="token" id="token" placeholder="Token" required/>
        <button name="validar" id="validar">Validar</button>

      </div>
    </div>
  </form>
</body>
<footer>
<?php include('../layouts/footer.php'); ?>
</footer>
</html>