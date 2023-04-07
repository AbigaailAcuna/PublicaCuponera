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
        //var_dump($_SESSION);
        if (isset($_SESSION['login_data'])) {
            foreach ($_SESSION['carrito'] as $cupon) {
                $Venta = [
                    'IdCuponR' => $cupon['Id'],
                    'IdCliente' => $_SESSION['login_data']['IdCliente'],
                    'Cantidad' => $cupon['Cantidad'],
                    'FechaCompra' => date("Y-m-d")
                ];
               
                $total += $cupon['Cantidad']*$cupon['Precio'];
                $ventasModel->insert($Venta);
                for ($i = 0; $i < $cupon['Cantidad']; $i++) {
                    $idCuponV = $cupon['IdEmpresa'] . substr(str_repeat(0, 7) . rand(0, 9999999), -7);
                    //var_dump($idCuponV);



                    $CuponV = [
                        'IdCuponV' => $idCuponV,
                        'IdVenta' => $ventasModel->getIdVenta()[0]['IdVenta'],
                        'IdCupon'  => $cupon['Id'],
                        'IdCliente' => $_SESSION['login_data']['IdCliente'],
                        'Estado' => "disponible"


                    ];
                    $IdCupones[] = $idCuponV;
                    $ventasModel->insertCuponV($CuponV);
                }
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
                        background-color: #40E0D0;
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
                        background-color: #00bcd4;
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
                </style>
            </head>
            <body>
                <h1>Confirmación de compra</h1>
                <h3>Detalles de compra</h3>';


        foreach ($_SESSION['carrito'] as $product) {


            // Add the subtotal to the total

            // Generate a new coupon div for this product
            $html .= '<div class="coupon">
                              <h3>' . $product['Nombre'] . '</h3>
                              <p>Precio: $' . $product['Precio'] . '</p>
                              <p>Cantidad: ' . $product['Cantidad'] . '</p>

                          </div>';
        }
        

        $html .= '<h3>Precio: $' .$total . '</h3>';
        $html .= '<div style = "page-break-after: always;"></div>';
        $html .= '<h1>Codigos de sus cupones</h1>';
        foreach ($IdCupones as $codigo) {

            $html .= '<h3>Id: ' . $codigo . '</h3>';
        }



        $html .= '</body>
        </html>';


        $dompdf = new Dompdf();
        // Load the HTML content into the Dompdf object and set the paper size and orientation
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'vertical');

        // Render the PDF and save it to a file with a unique filename
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
