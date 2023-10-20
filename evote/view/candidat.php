<?php
session_start();
if(isset($_GET['type']))
  $_SESSION['type'] = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
        require_once '../includes/div-head.php';
?>
<body>
    <?php
        require_once '../includes/div-navbar.php';
    ?>

  <main id="main">


    <!-- ======= Contact Section ======= -->
    
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Postuler</h2>
          <p>Mentionnez votre projet de candidature</p>
        </div>

        <div class="row gx-lg-0 gy-4">

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

          <div class="col-lg-8">
            <form action="../controller/candidat.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                <input type="hidden" name="typeCandidature"  value="<?php echo $_SESSION['type'];?>">
                <input type="hidden" name="idEtudiant"  value="<?php echo $_SESSION['idEtudiant'];?>">
                <input  type="hidden" name="idPromotion"  value="<?php echo $_SESSION['idPromotion'];?>">
                <input type="file" name="photo" id="">
                <div class="form-group mt-3">
                    <textarea class="form-control" name="projet" rows="15" placeholder="Mentionnez votre projet"></textarea>
                </div>          
                <div class="text-center">
                  <button type="submit">Postuler</button>
                </div>
            </form>
            <?php 
              if(isset($_SESSION['notifCandidature']))
                echo $_SESSION['notifCandidature'];
            ?>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  </main><!-- End #main -->

  <?php
    require_once '../includes/div-footer.php';
    require_once '../includes/div-js.php';
  ?>

</body>

</html>