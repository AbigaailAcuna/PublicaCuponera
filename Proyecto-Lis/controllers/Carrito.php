<?php
error_reporting(E_ERROR | E_PARSE);
class CarritoController{

    public function agregar($id){
        require_once "models/CuponesModel.php";
        $cupones=new CuponesModel();
        $info["id"]=$id;
        $info["cupones"]=$cupones->getCupon($id);
       

    if (isset($_SESSION['carrito'])) {
        if ($_GET['id']) {
            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for ($i = 0; $i < count($arreglo); $i++) {
                if ($arreglo[$i]['Id'] == $_GET['id']) {
                    $encontro = true;
                    $numero = $i;
                }
            }
            if ($encontro == true) {
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
                $_SESSION['carrito'] = $arreglo;
            } else {
                $nombre = $info["cupones"]["Titulo"];
                $precio = $info["cupones"]["PrecioRegular"];
                $imagen = $info["cupones"]["imagen"];
                $idEmpresa = $info["cupones"]["IdEmpresaR"];
                $disponibilidad=$info["cupones"]["Disponibilidad"];

                $arreglonuevo = array(
                    'Id' => $_GET['id'],
                    'Nombre' => $nombre,
                    'Precio' => $precio,
                    'Imagen' => $imagen,
                    'IdEmpresa' => $idEmpresa,
                    'Disponibilidad'=>$disponibilidad,
                    'Cantidad' => 1
                );
                array_push($arreglo, $arreglonuevo);
                $_SESSION['carrito'] = $arreglo;
            }
            header('Location:?c=Principal&a=carrito');
        }
    } else if (isset($_GET['id'])) {
        $nombre = $info["cupones"]["Titulo"];
        $precio = $info["cupones"]["PrecioRegular"];
        $imagen = $info["cupones"]["imagen"];
        $idEmpresa = $info["cupones"]["IdEmpresaR"];
        $disponibilidad=$info["cupones"]["Disponibilidad"];

        $arreglo[] = array(
            'Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'IdEmpresa' => $idEmpresa,
            'Disponibilidad'=>$disponibilidad,
            'Cantidad' => 1
        );
        $_SESSION['carrito'] = $arreglo;
        header('Location:?c=Principal&a=carrito');
    }
    }

    public function borrar($id){
        if(isset($_SESSION['carrito'])){
            if($_GET['id']){
            $arreglo=$_SESSION['carrito'];   
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_GET['id']){
                  $numero=$i;
                  //seteando la cantidad a cero
                  $arreglo[$numero]['Cantidad']=0;
                  $_SESSION['carrito']=$arreglo;
    
                  //lo eliminamos completamente
                 if($arreglo[$i]['Cantidad']==0){
                 unset($arreglo[$i]);
                 //ordenamos el arreglo
                 $arreglo=array_values($arreglo);
                 $_SESSION['carrito']=$arreglo;
                 
                }
    
                }
            }   
        }
    }
    header('Location:?c=Principal&a=carrito');
    }

    public function sumar($id){
        //vemos qué acción hay que ejecutar
        if(isset($_SESSION['carrito'])){
            $arreglo=$_SESSION['carrito'];   
            //hay una acción en la url
            if(isset($_GET["a"])){
                if($_GET["a"]=="sumar"){
                    for($i=0;$i<count($arreglo);$i++){
                        if($arreglo[$i]['Id']==$_GET['id']){
                        $numero=$i;
                        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                        $dispo= $arreglo[$numero]['Disponibilidad'];
                        if($arreglo[$numero]['Cantidad']>$dispo)
                        {
                        ///mensaje
                        }else{
                            $_SESSION['carrito']=$arreglo;
                        }        
                    
                    }
                    }
        
                }
               
                    header('Location:?c=Principal&a=carrito');
            }
        }
    }

    public function restar($id){
        if(isset($_SESSION['carrito'])){
            $arreglo=$_SESSION['carrito'];   
            //hay una acción en la url
            if(isset($_GET["a"])){
        if($_GET["a"]=="restar"){
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_GET['id']){
                $numero=$i;
                if($arreglo[$numero]['Cantidad'] > 1) {
                    $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']-1;
                }
                else {
                    unset($arreglo[$i]);
                    $arreglo=array_values($arreglo);
                    $_SESSION['carrito']=$arreglo;
                    
                   }
                }
                $_SESSION['carrito']=$arreglo;
              
            }
            }

        }
        header('Location:?c=Principal&a=carrito');
        
    }
    }

}
