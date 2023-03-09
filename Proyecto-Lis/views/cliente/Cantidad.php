<?php
session_start();

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
                $_SESSION['carrito']=$arreglo;
            }
            header('Location:?c=Principal&a=carrito');
            }
   
         }
         if($_GET["a"]=="restar"){
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_GET['id']){
                $numero=$i;
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']-1;
                $_SESSION['carrito']=$arreglo;
            }
            header('Location:?c=Principal&a=carrito');
            }
   
         }
    }
}

?>