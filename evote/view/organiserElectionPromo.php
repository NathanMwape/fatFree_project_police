<?php
require_once '../includes/navbarCoordination.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>evote</title>
  <link rel="stylesheet" href="../assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/template/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/template/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/template/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../assets/template/images/favicon.png" />
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
                  <form class="forms-sample" action="../controller/organiserElectionPromo.php" method="post" style="margin-top: 40px;">
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
                      if(isset($_SESSION['notifOrganiserElectionPromo']))
                        echo $_SESSION['notifOrganiserElectionPromo'];
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
