<?php
//hereda
include ('views/layouts/header.php');



?>
<!-- Modal -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Cupones disponibles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">IdCupon</th>
                            <th scope="col">Titulo</th>
                            
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                   if(isset($info["historial"]["Disponibles"])){
                    foreach ($info["historial"]["Disponibles"] as $elemento) { ?>
                    <tr>
                        <th><?php echo $elemento["IdCuponV"]; ?></th>
                        <td><?php echo $elemento["Titulo"]; ?></td>
                        
                        <td><?php echo $elemento["FechaCompra"]; ?></td>
                        <td><?php echo $elemento["Estado"]; ?></td>
                    </tr>
                <?php }}?>
                
                    </tbody>
                </table>
              
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Vencidos</button>
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Canjeados</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Cupones Vencidos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">IdCupon</th>
                            <th scope="col">Titulo</th>
                           
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                    
                   if(isset($info["historial"]["Vencidos"])){
                    foreach ($info["historial"]["Vencidos"] as $elemento) { ?>
                    <tr>
                        
                        <th><?php echo $elemento["IdCuponV"]; ?></th>
                        <td><?php echo $elemento["Titulo"]; ?></td>
                        
                        <td><?php echo $elemento["FechaCompra"]; ?></td>
                        <td><?php echo $elemento["Estado"]; ?></td>
                    </tr>
                <?php }}?>
                
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Disponibles</button>
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Canjeados</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel3">Cupones Canjeados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">IdCupon</th>
                            <th scope="col">Titulo</th>
                            
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                    
                   if(isset($info["historial"]['Canjeados'])){
                    foreach ($info["historial"]['Canjeados'] as $elemento) { ?>
                    <tr>
                        
                        <th><?php echo $elemento["IdCuponV"]; ?></th>
                        <td><?php echo $elemento["Titulo"]; ?></td>
                        
                        <td><?php echo $elemento["FechaCompra"]; ?></td>
                        <td><?php echo $elemento["Estado"]; ?></td>
                    </tr>
                <?php }}?>
                
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Disponibles</button>
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Ver Cupones Vencidos</button>
            </div>
        </div>
    </div>
</div>

 <!-- Header-->
 <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tu cuponera de confianza</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Todo lo que necesitas</p>
                </div>
            </div>
        </header>
  <!-- Section-->
  <section >
            <div class="container-fluid px-5 my-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   
                    <?php
                    foreach($info['cupones'] as $dato){
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img src="<?php echo './recursos/img/'. $dato["imagen"]?>" class="card-img-top"  alt="imágenes de cupones" width="40px"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    
                                    <h5 class="fw-bolder"><?php echo  $dato["Titulo"]?></h5>
                                    <!-- Product price-->
                                    <?php echo '$'. $dato["PrecioRegular"]?>
                                   
                                    
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                <a class="btn btn-dark mt-auto" href="?c=Principal&a=detalle&id=<?php echo $dato["IdCuponR"]?>"><i class="bi bi-eyeglasses"></i></a>
                                <?php
                                        if(!is_null($_SESSION['login_data'])) { ?>
                                    <a class="btn btn-success mt-auto" href="?c=Carrito&a=agregar&id=<?php echo $dato["IdCuponR"]?>"><i class="bi bi-cart"></i></a>
                              
                                  <?php
                                   }
                                   ?>
                                
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                    ?>
                     </div>
                </div>

                </div>
         
            </div>
        </section>

        <?php
//hereda
include ('views/layouts/footer.php');

?>
