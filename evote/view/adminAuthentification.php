<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>evote</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  
</head>

<body>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Se connecter</h2>
        </div>
        
        <div class="row gx-lg-0 gy-4">
            <div class="col-lg-2">
            </div>

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Localisation:</h4>
                  <p>05, AV. FEMMES KATANGAISES, LUBUMBASHI - RDC</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@esisalama.org</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+(243) 82 226 74 72</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-4">
            <form action="../controller/authentificationAdmin.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text" name="matricule" class="form-control" id="matricule" placeholder="Matricule" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
                </div>
              </div>
              <div class="row">
              </div>
              <div class="text-center"><button type="submit">Se connecter</button></div>
              <?php
                if(isset( $_SESSION['notifAdminAuth']))
                  echo $_SESSION['notifAdminAuth'];
              ?>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!--ce script doit etre retravailler car il fait en sorte que l'authentification ne passe pas
   il le laisse sur l'en cour de telechargement-->
<!-- <script src="../assets/vendor/php-email-form/validate.js"></script>-->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html> 