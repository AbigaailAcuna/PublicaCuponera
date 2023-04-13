<?php
require_once 'recursos/vendor/autoload.php';
require_once "models/HistorialModel.php";

use Dompdf\Dompdf;

class HistorialController
{
    public function generarPdf()
    {
        $historialpdf = new HistorialModel();
        if (isset($_SESSION['login_data'])) {
            $info["historialpdf"]['Disponibles'] = $historialpdf->getCuponDisponibles($_SESSION['login_data']['IdCliente'], $_POST['IdCuponv']);
        }
        $descuento = $info["historialpdf"]['Disponibles'][0]['PrecioOferta']*100/($info["historialpdf"]['Disponibles'][0]['PrecioRegular']);
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
                <p>Gracias por comprar con nosotros, a continuación tienes el detalle de tu cupon:</p>
            </div>
            <h3>Detalle de cupon</h3>';
        
      
        // Generando un div para separar cada cupon en cuadros que reprentan cupones
        $html .= '<div class="coupon">
              <h3>' .  $info["historialpdf"]['Disponibles'][0]['Titulo'] . '</h3>
              <p>Descuento: ' . $descuento . '%</p>
              <p>Valido hasta: ' . $info["historialpdf"]['Disponibles'][0]['FechaLimiteUso'] . '</p>
              <p>Id Cupon: ' . $info["historialpdf"]['Disponibles'][0]['IdCuponV'] . '</p>
        
          </div>';
        
        
       
        $dompdf = new Dompdf();
// Cargar el contenido dentro de Dompdf
$dompdf->loadHtml($html);
//seteando tamaño de pagina
$dompdf->setPaper('A4', 'vertical');

// Renderizar el pdf y guardarlo en la carpeta Pdf
$dompdf->render();

$filename = 'PdfDetalle.pdf'; // Generate filename with date and time
$filepath = '.\Pdf\\' . $filename; // Set the file path
file_put_contents($filepath, $dompdf->output());
$dompdf->stream('.\Pdf\PdfDetalle.pdf');
header('Location:index.php');
     
    }
}





?>
