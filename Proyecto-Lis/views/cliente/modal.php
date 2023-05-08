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
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Detalle</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                   if(isset($info["historial"]["Disponibles"])){
                    foreach ($info["historial"]["Disponibles"] as $elemento) { ?>
                    <tr>
                        
                        <form method="POST" action="?c=Historial&a=generarPdf" >
                        <th><?php echo $elemento["IdCuponV"]; ?></th>
                        <td><?php echo $elemento["Titulo"]; ?></td>
                        <td><?php echo $elemento["Cantidad"]; ?></td>
                        <td><?php echo $elemento["FechaCompra"]; ?></td>
                        <td><?php echo $elemento["Estado"]; ?></td>
                        <input type="hidden" name="IdCuponv" value="<?php echo $elemento['IdCuponV']; ?>">
                        <td><button class="btn btn-success" type='submit' name="Enviar">Detalle</button></td>
                        </form>
                        
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
                            <th scope="col">Cantidad</th>
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
                        <td><?php echo $elemento["Cantidad"]; ?></td>
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
                            <th scope="col">Cantidad</th>
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
                        <td><?php echo $elemento["Cantidad"]; ?></td>
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