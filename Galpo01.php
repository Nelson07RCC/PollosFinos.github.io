<?php include("Galpones.crud/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Sistema para Ponedoras</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/checkout.css">
  <link rel="stylesheet" href="galpon01.css">
  <!-- Additional CSS Files -->

  <!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
</head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/Gallina.png" height="80px" alt="JAC "> </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="Galpones.crud/Galpones.php" class="bg-gradient bg-opacity-25">Inicio</a></li>

              <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- ***** Header Area End ***** -->


  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="left-image">
            <img src="assets/images/galpo01.png" alt="">
          </div>
        </div>

        <?php

        if (isset($_POST['galpon'])) {;
          $numero = $_POST['numero'];
        }
        ?>

        <div class="col-lg-5 align-self-center">
          <h4>GALPON N°<?php echo "$numero" ?></h4>
          <p>EN ESTE GALPON HAY GALLINAS.</p>
          <ul class="button-list">
            <li>
              <form action="Galpones/Alta/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="ALTAS">
              </form>
            </li>
            <li>
              <form action="Galpones/Bajas/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="BAJAS">
              </form>
            </li>
            <li>
            <form action="Galpones/Ventas/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="VENTAS">
              </form>
            </li>
            <li>
            <form action="Galpones/Gastos/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="GASTOS">
              </form>
            </li>
            <li>
            <form action="Galpones/Salud/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="CONTROL DE SALUD">
              </form>
            </li>
            <li>
            <form action="Galpones/Ganancias/index.php" method="POST">
                <input type="hidden" name="numero" value="<?php echo "$numero" ?>">
                <input type="submit" name="galpon" class="btn btn-primary" value="GANANCIAS">
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function() {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
      e.preventDefault();
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>

</html>