<?php
require_once "models/VentasModel.php";

class VentasController
{

      public function insertSale()
      {
            $ventasModel = new VentasModel();
            var_dump($_SESSION);
            if (isset($_SESSION['user'])) {
                  foreach ($_SESSION['carrito'] as $cupon) {
                        for ($i = 0; $i < $cupon['Cantidad']; $i++) {
                              $idVenta = $cupon['IdEmpresa'] . '-' . substr(str_repeat(0, 7) . rand(0, 9999999), -7);
                              $cuponVendido = [
                                    'IdVenta' => $idVenta,
                                    'IdCupon' => $cupon['Id'],
                                    'IdCliente' => 'karletty.carolina@gmail.com',
                                    'Estado' => 'disponible'
                              ];

                              $ventasModel->insert($cuponVendido);
                        }
                        $ventasModel->updateCant($cupon['Id'], $cupon['Cantidad']);
                  }
            }
            unset($_SESSION['carrito']);
            header('location:index.php');
      }
}
