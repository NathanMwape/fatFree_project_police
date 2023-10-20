<?php
require_once '../includes/navbarPresidance.php';
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
  <link href="../assets/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/template/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/template/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/template/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/template/css/main.css" rel="stylesheet">

  
</head>

<body>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">delais candidature</h4>
                  <p class="card-description">
                    inserez la date de debut et de fin de candidature
                  </p>
                  <form class="forms-sample" action="../controller/organiserElectionPresidance.php" method="post" style="margin-top: 40px;">
                    <div class="form-group">
                      <label for="dateDebutCandidature">choisir la date de début: </label>
                      <input type="date"  class="form-control" name="dateDebutCandidature" id="">
                     </div>
                    <div class="form-group">
                      <label for="dateFinCandidature">choisir la date de fin:</label>
                      <input type="date" class="form-control" name="dateFinCandidature" id="">
                      <label for="dateFinVote">choisir la date de fin de vote:</label>
                      <input type="date" class="form-control" name="dateFinVote" id="">
                    </div>
                    <button type="submit" value="valider" class="btn btn-primary mr-2">valider</button>
                  </form>
    <?php
        if(isset($_SESSION['notifOrganiserElectionPresidance']))
            echo $_SESSION['notifOrganiserElectionPresidance'];
    ?>
  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php
require_once '../includes/_footerCoordination.php';
?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../assets/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../assets/template/js/off-canvas.js"></script>
  <script src="../assets/template/js/hoverable-collapse.js"></script>
  <script src="../assets/template/js/template.js"></script>
  <script src="../assets/template/js/settings.js"></script>
  <script src="../assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../assets/template/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../assets/template/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../assets/template/js/file-upload.js"></script>
  <script src="../assets/template/js/typeahead.js"></script>
  <script src="../assets/template/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
