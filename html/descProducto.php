
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Productos Pagina 1</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="#" target="_blank">
           <strong class="blue-text"><img src="../img/costa-rica.png" width="50" height="50"> Mercado Virtual CR</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="home-page.html">Pagina Principal
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="aboutUs.html"
             >Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="PymesAsociadas.html"
              >PYMES Asociadas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link waves-effect" href="registrarvista.html"
              >Registrarse</a>
          </li>

          <li class="nav-item">
            <a class="nav-link waves-effect" href="anuncios.html"
              >Anuncios</a>
          </li>


        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect " href="checkout-page.html" >
              <span class="badge red z-depth-1 mr-1"> 0 </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Carrito </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.facebook.com/" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Main layout-->
  <?php
            include ('conexion.php');
$resultado = $con->query("SELECT * FROM PRODUCTOS ORDER BY PRD_ID DESC where PRD_ID = 1") or die($con -> error);
            while ($fila = mysqli_fetch_array($resultado)) {   
                echo 'Ciclo';     
            ?>
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

        

          <img src="../img/<?php echo $fila['PRD_IMAGEN'];?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">
          

		  <h4 class="my-4 h4">Kit de limpieza</h4>

            <p class="lead">
              <span class="mr-1">
                <del><?php echo $fila['PRD_PRICE'];?></del>
              </span>
              <span>$100</span>
            </p>

            <p class="lead font-weight-bold">Descripción</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
              sint voluptatibus!
              Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

            <form class="d-flex justify-content-left">
              <!-- Default input -->
              <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
              <button class="btn btn-primary btn-md my-0 p" type="submit"><a style="color:white;"  href = "checkout-page.php?PRD_ID = <?php echo $fila['PRD_ID'];?>">Agregar al carrito</a>
              <i class="fas fa-shopping-cart ml-1"></i>
            </button>
              <br>
              <button class="btn btn-primary btn-md my-0 p" type="submit"><a style="color:white;"  href = "product-page.php?PRD_ID = <?php echo $fila['PRD_ID'];?>">Ver mas productos</a>
                
             
              
              
            </form>
            
            

          </div>
          <!--Content-->

        </div>
        
        <!--Grid column-->
       
        
      </div>
      <!--Grid row-->
      

      <hr>
      <?php } ?>

    
  </main>
  <!--Main layout-->
  
  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="#" target="_blank"
        role="button">Eres una PYMES? Escribenos
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>
      

    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright

    </div>
    <!--/.Copyright-->
    
  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
  
</body>

</html>