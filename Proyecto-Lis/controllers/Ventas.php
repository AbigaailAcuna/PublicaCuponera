<?php
require_once "models/VentasModel.php";
require_once 'recursos/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer as PHPMailer1;
use PHPMailer\PHPMailer\Exception2 as PHPMailerException1;

use Dompdf\Dompdf;

class VentasController
{

    public function insertSale()
    {
        
        $total =  0;
        $IdCupones = array();

        $ventasModel = new VentasModel();
        //si hay una sesion iniciada, procedemos a recorrer el carrito
        if (isset($_SESSION['login_data'])) {
            //para cada cupon del carrito lo extraemos como $cupon, almacenamos la informacion dentro de otro arreglo llamado venta para poder pasar ese arreglo a la instancia del modelo de ventas
            foreach ($_SESSION['carrito'] as $cupon) {
                $Venta = [
                    'IdCuponR' => $cupon['Id'],
                    'IdCliente' => $_SESSION['login_data']['IdCliente'],
                    'Cantidad' => $cupon['Cantidad'],
                    'FechaCompra' => date("Y-m-d")
                ];
                //calculo del total para mostrar en el pdf
                $total += $cupon['Cantidad']*$cupon['Precio'];
                //guardar los datos del arreglo de venta en la tabla ventas
                $ventasModel->insert($Venta);
                //for para poder generar un codigo de cupon para cada cupon que se compra de cada cupon disponible 
                for ($i = 0; $i < $cupon['Cantidad']; $i++) {
                    //generando codigo
                    $idCuponV = $cupon['IdEmpresa'] . substr(str_repeat(0, 7) . rand(0, 9999999), -7);
                    //almacenando cada cupon y su respectivo codigo en un arreglo para mostrar psoteriormente en pdf
                    $couponCodes[] = array('nombre' => $cupon['Nombre'], 'codigo' => $idCuponV);

                        //declarando arreglo para insertar datos en cuponv, tabla que sirve para el historial de compra
                    $CuponV = [
                        'IdCuponV' => $idCuponV,
                        'IdVenta' => $ventasModel->getIdVenta()[0]['IdVenta'],
                        'IdCupon'  => $cupon['Id'],
                        'IdCliente' => $_SESSION['login_data']['IdCliente'],
                        'Estado' => "disponible"


                    ];
                    //guardando el arreglo en tabla cuponv
                    $ventasModel->insertCuponV($CuponV);
                }
                //al procesarse el pago se tiene que actualizar la cantidad disponible de los cupones que fueron adquiridos
                $ventasModel->updateCant($cupon['Id'], $cupon['Cantidad']);
                $ventasModel->updateCant2($cupon['Id'], $cupon['Cantidad']);
            }
        }

        //generando pdf

$html = '<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmación de compra</title>
    <style>
        body {
            font-family: "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            background-color: #fff;
            padding: 30px;
        }
        h1 {
            font-size: 36pt;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        h3 {
            font-size: 24pt;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .coupon {
            display: inline-block;
            width: 80%;
            border: 2px solid #333;
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 30px;
        }
        .coupon h3 {
            font-size: 28pt;
            margin-bottom: 20px;
        }
        .coupon p {
            font-size: 18pt;
            margin-bottom: 10px;
        }
        .coupon .total {
            font-size: 24pt;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }
        #header {
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        #header h2 {
            font-size: 36pt;
            font-weight: bold;
            color: #333;
        }
        #message {
            font-size: 18pt;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 40px;
            width: 100%;
            padding: 20px;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid #fff;
            padding: 12px;
        }
        th {
            background-color: #eee;
            font-weight: bold;
        }
        td {
            font-weight: 600;
        }
        tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.3);
        }
        tfoot td {
            border-top: 2px solid #fff;
            font-weight: bold;
            font-size: 16pt;
            padding-top: 20px;
        }
        tfoot td:last-child {
            font-size: 18pt;
        }
    </style>
</head>
<body>
    <div id="header">
        <h2>La Cuponera</h2>
    </div>
    <div id="message">
        <p>Gracias por comprar con nosotros, a continuación tienes el detalle de tus cupones adquiridos:</p>
    </div>
    <h3>Detalles de compra</h3>';

foreach ($_SESSION['carrito'] as $product) {
// Generando un div para separar cada cupon en cuadros que reprentan cupones
$html .= '<div class="coupon">
      <h3>' . $product['Nombre'] . '</h3>
      <p>Precio: $' . $product['Precio'] . '</p>
      <p>Cantidad: ' . $product['Cantidad'] . '</p>

  </div>';
}

$html .= '<h3>Precio: $' .$total . '</h3>';
$html .= '<div style="page-break-after: always;"></div>';
$html .= '<h1>Códigos de tus cupones</h1>

            <table>
                <thead>
                    <tr>
                        <th>Cupon</th>
                        <th>Codigo</th>
                    </tr>
                </thead>
                <tbody>';
                //reccorriendo el arreglo que contiene cada cupon y su codigo, para mostrarlos en una tabla
                foreach ($couponCodes as $coupon) {
                    $html .= '<tr>
                                    <td>' . $coupon['nombre'] . '</td>
                                    <td>' . $coupon['codigo'] . '</td>
                              </tr>';
                }

    $html .= '</tbody></table></body></html>';

        $dompdf = new Dompdf();
        // Cargar el contenido dentro de Dompdf
        $dompdf->loadHtml($html);
        //seteando tamaño de pagina
        $dompdf->setPaper('A4', 'vertical');

        // Renderizar el pdf y guardarlo en la carpeta Pdf
        $dompdf->render();
        $filename = 'CuponCompras_' . $_SESSION['login_data']['Correo'] . '_' . date('Ymd_His') . '.pdf'; // Generate filename with date and time
        $filepath = '.\Pdf\\' . $filename; // Set the file path
        file_put_contents($filepath, $dompdf->output());

        //mandando correo
        require('./recursos/PHPMailer/Exception.php');
        require('./recursos/PHPMailer/SMTP.php');
        require('./recursos/PHPMailer/PHPMailer.php');
        $mail = new PHPMailer1(true);


        try {
            // Envío del correo electrónico con el token
            /// Correo: lacuponeraservicios@gmail.com
            /// Contraseña: Contra@1
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'lacuponeraservicios@gmail.com';
            $mail->Password   = 'cqdgvpabzbtyfjka';
            $mail->SMTPSecure = PHPMailer1::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('lacuponeraservicios@gmail.com', 'La cuponera');
            $mail->addAddress($_SESSION['login_data']['Correo']);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Comprobante de compra' . date('Ymd_His');
            $mail->Body    = 'A continuación te enviamos un archivo PDF como comprobante de compra, en el podras encontrar el codigo de canjeo del cupon';
            $mail->addAttachment($filepath);
            $mail->send();
            header('location:index.php');
            unset($_SESSION['carrito']);
            $ventasModel->updateCant($cupon['Id'], $cupon['Cantidad']);
        } catch (PHPMailerException1 $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}
