<?php
require_once 'array.php';
require_once 'funciones.php'; 
require_once 'pieTotalsumaPagina.php'; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>1er Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listado.php">
              <i class="bi bi-circle"></i><span>Los mas vendidos</span>
            </a>
          </li>
          <li>
            <a href="recuperatorio.html">
              <i class="bi bi-circle"></i><span>Recuperatorio</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Listado de Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
          <li class="breadcrumb-item active">Los mas vendidos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Los mas vendidos </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valoración</th>
                        <th scope="col">Financiación</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < $CantidadListado; $i++) {?>
                          <?php $suma = obtenerVotos($Listado[$i]['Pos'], $Listado[$i]['Neg']); ?>
                          <?php $stock = $Listado[$i]['stock']; ?>
                          <?php $color = cambiarColorBarra($stock);?>
                          <?php $totalvotos= sumaVotos($Listado[$i]['Pos'], $Listado[$i]['Neg']);?>
                          <?php $colorCuotas = colorCuotas($suma);?>
                          <?php $msjCuotas = mensajeCuotas($suma);?>
                          <?php $colorValoracion = cambiarColorValoracion($suma);?>
                          <?php $backgroundCoutas=cambiarColorFinanciacion($suma);?>
                          <?php $PositivoTotales=PiePaginaSumaTotalPosYneg($Listado[$i]['Pos']);?>

                      <tr>
                        <th><?php echo ($i+1);  ?></th>
                        
                        <!--Columna Preview-->
                        <td> <img src='imagenes/<?php echo $Listado[$i]['img']; ?>' /></td>
                          
                        <!--Columna Descripción-->
                        <td>
                         <a href="#" class="text-primary fw-bold"><?php echo $Listado[$i]['Descripcion']; ?>
                            <div class="progress mt-3">
                              <div class=" progress-bar-striped  progress-bar-animated"
                                role="progressbar"  style="background-color: <?php echo $color ?>; width: <?php echo $stock; ?>%" aria-valuenow=" <?php echo $suma; ?>" aria-valuemin="0"
                                aria-valuemax="100" title='Stock Final: <?php echo $stock; ?>'>
                              </div>
                            </div>
                          </a>
                        </td>
                        <!--Columna Valoracion-->
                        <td>
                          <h3>
                            <span style="color: <?php echo $colorValoracion; ?>" title='Votos: Positivos <?php echo $Listado[$i]['Pos']; ?> y Negativos <?php echo $Listado[$i]['Neg']; ?>'
                              class="badge border-warning border-1 ">
                                <?php echo $suma; ?>%
                              <i class="bi bi-heart-fill danger"></i>
                            </span>
                          </h3>
                          Total votos: <?php echo $totalvotos; ?>
                          <!--Columna de Financiacion-->
                          <td >
                          <h4>
                            <span style="background-color:<?php echo $backgroundCoutas ?>" class="badge ">
                              <i class="bi bi-check-circle me-1"></i> <?php echo $msjCuotas; ?>
                            </span>
                          </h4>
                        </td> 
                        </td>



                      </tr>   
                          
                      
                     
                          <?php } //fin del FOR ?>
                     
                    
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->



            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Votos <span>| Total positivos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hand-thumbs-up-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $PositivoTotales;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Votos <span>| Total negativos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hand-thumbs-down-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>187</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div><!-- End Left side columns -->
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working html/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files 2023-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File 2023-->
  <script src="assets/js/main.js"></script>

</body>

</html>