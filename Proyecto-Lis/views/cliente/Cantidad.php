<?php

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
         if($_GET["a"]=="restar"){
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_GET['id']){
                $numero=$i;
                if($arreglo[$numero]['Cantidad'] > 1) {
                    $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']-1;
                }
                else {
                    unset($arreglo[$numero]);
                }
                $_SESSION['carrito']=$arreglo;
            }
            }
   
         }
            header('Location:?c=Principal&a=carrito');
    }
}
