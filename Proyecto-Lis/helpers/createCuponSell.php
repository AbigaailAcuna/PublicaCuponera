<?php

foreach ($_SESSION['carrito'] as $cupon) {
      $soldCuponId = $cupon['IdEmpresa'] . '-' . substr(str_repeat(0, 7) . rand(0, 9999999), -7);
      $soldCupon = [
            'id' => $soldCuponId,
            'idUsuario' => '',
            //PONER AHÍ EL ID DEL USUARIO REGISTRADO Y METER soldCupon EN LA TABLA CORRESPONDIENTE
      ];
}
