
<link href="http://localhost/Proyecto-Lis/recursos/css/principal.css" rel="stylesheet" />

<div class="header-content">
<?php include 'views/layouts/header.php'; ?>
</div>

<!-- Modal -->

<body class="fondo">


 <!-- Header-->
 <header class="header py-5" >
            <div class="container px-5 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tu cuponera de confianza</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Todo lo que necesitas</p>
                </div>
            </div>
        </header>
  <!-- Section-->

  <section >
<!--agregando animacion al inicio de la pagina-->
  <div class="animation-container">
  <img src="http://localhost/Proyecto-Lis/cuponera.png">
</div>

<script>

    // Wait for the page to load
window.onload = function() {
  // Wait for the animation to complete
  setTimeout(function() {
    // Hide the animation container
    document.querySelector('.animation-container').style.display = 'none';
    // Show the main content
    document.querySelector('.main-content').style.display = 'block';
    document.querySelector('.header').style.display = 'block';
    document.querySelector('.footer-content').style.display = 'block';
    document.querySelector('.header-content').style.display = 'block';
    document.querySelector('.scroll-viewport').style.display = 'block';
    document.querySelector('.buscar').style.display = 'block';
    
  }, 3000); // Change 3000 to the duration of your animation in milliseconds
};

</script>

<!--agregando scroller de imagenes-->
<?php
$dir = './recursos/img'; // Change to the path of your image directory
$images = [];
if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $images[] = $file;
        }
    }
}
?>
<section>
  <div class="scroll-viewport">
    <div class="scroll-container">
      <?php foreach ($images as $image) { ?>
        <img src="./recursos/img/<?php echo $image; ?>" />
      <?php } ?>
    </div>
  </div>
  <script>
    var scrollContainer = document.querySelector('.scroll-container');
    var images = scrollContainer.getElementsByTagName('img');
    var currentImage = 0;

    setInterval(function() {
      currentImage = (currentImage + 1) % images.length;
      var nextImage = (currentImage + 1) % images.length;
      var lastImage = (currentImage + images.length - 1) % images.length;

      // Move the current image to the end of the container
      scrollContainer.appendChild(images[currentImage]);

      // Move the next image to the beginning of the container
      scrollContainer.insertBefore(images[nextImage], images[0]);

      // Move the last image to the position before the first image
      scrollContainer.insertBefore(images[lastImage], images[0]);
    }, 2500); // Change 3000 to the duration you want between image changes in milliseconds
  </script>
</section>

<!--Agregando el search bar para filtrar por palabras-->

<div class="buscar">
            <form action="" method="GET">
                <label for="search-input" class="visually-hidden">Buscar cupón:</label>
                <div class="input-group">
                    <input type="text" id="search-input" name="q" class="form-control" placeholder="Buscar cupón" aria-label="Buscar cupón" />
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <div>
                <form action="" method="POST">
                <label for="">Filtrar por categoria: </label>
                <select name="categoria" id="categoria">

                    <?php foreach ($info['categoria'] as $categoria) { ?>
                        <option name = 'IdCategoria' value='<?php echo $categoria['IdCategoria']; ?>'><?php echo $categoria['NombreCategoria'];  ?></option>

                    <?php } ?>
                </select>
                <button name = 'Enviar' type="submit" class="btn btn-primary">Filtrar</button>
                </form>
             

               
            </div>
        </div>


            <div class="main-content container-fluid px-5 my-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   
                    <?php
                    if(isset($_GET['q']) && !empty($_GET['q'])) {
                        $query = $_GET['q'];
                        $results = array_filter($info['cupones'], function($dato) use ($query) {
                          return strpos(strtolower($dato['Titulo']), strtolower($query)) !== false;
                        });
                        foreach($results as $dato) {
                      ?>
                        <div class="col mb-5">
                          <div class="card h-100">
                            <img src="<?php echo 'http://localhost/Proyecto-Lis/recursos/img/'. $dato["imagen"]?>" class="card-img-top"  alt="imágenes de cupones" width="40px"/>
                            <div class="card-body p-4">
                              <div class="text-center">
                                <h5 class="fw-bolder"><?php echo $dato["Titulo"]?></h5>
                                <?php echo '$'. $dato["PrecioRegular"]?>
                              </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center">
                                <a class="btn btn-dark mt-auto" href="?c=Principal&a=detalle&id=<?php echo $dato["IdCuponR"]?>"><i class="bi bi-eyeglasses"></i></a>
                                <?php if(!is_null($_SESSION['login_data'])) { ?>
                                  <a class="btn btn-success mt-auto" href="?c=Carrito&a=agregar&id=<?php echo $dato["IdCuponR"]?>"><i class="bi bi-cart"></i></a>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                        }
                      }  if (isset($_POST['categoria'])) {
                    
                        foreach($info['cuponesC']  as $dato){?>
                        <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img src="<?php echo 'http://localhost/Proyecto-Lis/recursos/img/' . $dato["imagen"] ?>" class="card-img-top" alt="imágenes de cupones" width="40px" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
    
                                            <h5 class="fw-bolder"><?php echo  $dato["Titulo"] ?></h5>
                                            <!-- Product price-->
                                            <?php echo '$' . $dato["PrecioRegular"] ?>
    
    
    
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-dark mt-auto" href="?c=Principal&a=detalle&id=<?php echo $dato["IdCuponR"] ?>"><i class="bi bi-eyeglasses"></i></a>
                                            <a class="btn btn-success mt-auto" href="?c=Carrito&a=agregar&id=<?php echo $dato["IdCuponR"] ?>"><i class="bi bi-cart"></i></a>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
    
                        <?php } 
    
                        
                        
                    } else {
                    foreach($info['cupones'] as $dato)
                    {
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img src="<?php echo 'http://localhost/Proyecto-Lis/recursos/img/'. $dato["imagen"]?>" class="card-img-top"  alt="imágenes de cupones" width="40px"/>
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
                                <a class="btn btn-success mt-auto" href="?c=Carrito&a=agregar&id=<?php echo $dato["IdCuponR"]?>"><i class="bi bi-cart"></i></a>   
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                }
                    ?>
                     </div>
                </div>

                </div>
         
            </div>
        </section>

</body>    
<div class="footer-content">
<?php include 'views/layouts/footer.php'; ?>
</div>

