<?php
 session_start();?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CAMPUS</title>

  <!-- Favicons -->
  <link href="assets/img/CAMPUS.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= seccion de hero junto a los carruseles ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slider 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/img/slide/imagen1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Bienvenido a <span>CAMPUS</span></h2>
                <p class="animate__animated animate__fadeInUp">En nuestra pagina web para el estudiante encontraras todo lo que necesitas para poder desarrollarte como un buen informatico</p>
              </div>
            </div>
          </div>

          <!-- Slider 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/imagen2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Mantente informado acerca de todos tus cursos</h2>
              </div>
            </div>
          </div>

          <!-- Slider 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/imagen3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">¿A que esperas para formar parte de nuestra gran familia?</h2>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>CAMPUS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Image</a></li>
            <?php 
                    if(!isset($_SESSION['usuario'])){
            ?>
                  <li><a class="nav-link" href="./formulario.php"> Log in </a> </li>
            <?php }else{
                ?>
                 <li><a class="nav-link" href="./cierreSesion.php">Log Out </a> </li>
                 <?php if(isset($_SESSION['adm'])){ ?>
                        <li><a class="nav-link" href="./accesoAdmin/Inicio.php"><?php echo $_SESSION['usuario'] ?> </a> </li>
                <?php } 
                         if(isset($_SESSION['alumno'])){?>
                         <li><a class="nav-link" href="./accesoAlumno/inicio.php"><?php echo $_SESSION['usuario'] ?> </a> </li>
            <?php
                         }
                         if(isset($_SESSION['profesor'])){?>
                          <li><a class="nav-link" href="./accesoProfesor/inicio.php"><?php echo $_SESSION['usuario'] ?> </a> </li>
            <?php }
            }
           ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
          <p>Trabajo de fin de curso de Daw .Espacio de trabajo tanto para alumnos como para los profesores, la finalidad de esta aplicacion
            es facilitar a estar informado de todo lo que el profesor suba y poder ser mas facil comunicarse entre ambas partes.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Que asignaturas esta centrada esta aplicacion?</h3>
            <p class="fst-italic">
                Esta aplicacion esta centrada solo para el ambito infomatico , es decir para los cursos de DAM,DAW,SMR Y ASIR.
                EN  estos cursos suelen subir apuntes de las siguientes asignaturas y mucho mas.
            </p>
            <div class="skills-content">

              <div class="progress">
                <span class="skill">HTML <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">CSS <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">JavaScript <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">PHP <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>¿Cual es nuestro proposito?</h2>
          <p>Aprende y ponte al dia con todo lo que suben los profesores .</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4 class="title"><a href="">Comunicacion</a></h4>
              <p class="description">Resuelve todas tus dudas con los profesores o con tus propios compañeros .</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-chat"></i></div>
              <h4 class="title"><a href="">Conectado</a></h4>
              <p class="description">Manten la comunicacion con todos los usuarios a traves de nuestro cchat</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-book"></i></div>
              <h4 class="title"><a href="">Subida de archivos</a></h4>
              <p class="description">Subida de archivos diario para poder practicar </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Actualizaciones</a></h4>
              <p class="description">Esta aplicacion web evoluciona constantemente para ofrecer los mejores servicios.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Services Section -->
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Imagenes</h2>
          <p>Diferencias asignaturas referidas al ambito informatico </p>
        </div>
        <div class="row portfolio-container">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/daw.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Daw</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/dam.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>DAM</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/asir.jpg" width=410 class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>ASIR</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/smr.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>SMR</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Our Portfolio Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-info text-center">
            <p>
              <strong>Email:</strong> jeancris95@gmail.com<br>
            </p>
            <div class="social-links mt-3 text-center">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="credits">
        Designed by Jean Cristhofer Cantoral
      </div>
    </div>
  </footer><!-- End Footer -->
  <script>
    window.addEventListener('mouseover', initLandbot, { once: true });
    window.addEventListener('touchstart', initLandbot, { once: true });
    var myLandbot;
    function initLandbot() {
      if (!myLandbot) {
        var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
        s.addEventListener('load', function() {
          var myLandbot = new Landbot.Livechat({
            configUrl: 'https://chats.landbot.io/v3/H-1233859-RZG1VVXU41WUMP7C/index.json',
          });
        });
        s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
      }
    }
    </script>

  <!-- Vendor JS Files -->
  <script src="./assets/vendor/purecounter/purecounter.js"></script>
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="./assets/js/main.js"></script>

</body>

</html>