<?php 
require_once('../model/candidat.php');

session_start();
$candidature = new Candidat();
$idPromotion = $_SESSION['idPromotion'];
$trouver = $candidature->getAllCandidatureById($idPromotion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>evote</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/template/images/favicon.png" />
</head>
<body>
  
  
  <div class="container-scroller">
  <?php
        require_once '../includes/navbarCoordination.php';
      
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                      <th class="ml-5">profil</th>
                        <th class="ml-5">Nom</th>
                        <th>Post_nom</th>
                        <th>Prenom</th>
                        <th>pourcentage</th>
                        <th>confession	</th>
                        <th>motivation</th>
                        <th>decision</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($trouver as $candidatures){?>
                        <tr>
                                   <td class="py-1"> <img src=<?php echo $candidatures['photo']?> alt="image"/> </td>
                                    <td><?php echo $candidatures['nom'];?></td>
                                    <td><?php echo $candidatures['post_nom'];?></td>
                                    <td><?php echo $candidatures['prenom'];?></td>
                                    <td><?php echo $candidatures['pourcentage'];?></td>
                                    <td><?php echo $candidatures['confession'];?></td>
                                    <td><?php echo $candidatures['projet'];?></td>
                                    <td>
                                    <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                            <a href="../controller/validerCandidatPromo.php?idCandidature=<?php echo $candidatures['idcandidature'];?>"> Valider <i class="typcn typcn-edit btn-icon-append"></i> </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                            <a href="../controller/supprimerCandidatPromo.php?idCandidature=<?php echo $candidatures['idcandidature']; ?>"> Supprimer <i class="typcn typcn-delete-outline btn-icon-append"></i> </a>
                                        </button>
                                        </div>
                                    </td>
                            </tr>
                   <?php }
                ?>
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
          <?php
          if(isset($_SESSION['notifDashboard']))
              echo $_SESSION['notifDashboard'];
        ?>
        </div>
       
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
          if(isset($_SESSION['notifVoirCandidatPromo']))
              echo $_SESSION['notifVoirCandidatPromo'];
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
  <!-- Plugin js for this page-->
  <script src="../assets/template/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets/template/js/off-canvas.js"></script>
  <script src="../assets/template/js/hoverable-collapse.js"></script>
  <script src="../assets/template/js/template.js"></script>
  <script src="../assets/template/js/settings.js"></script>
  <script src="../assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/template/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

