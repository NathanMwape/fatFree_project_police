<?php
if(!isset($_SESSION))
{
  session_start();
}
require_once '../model/candidat.php';
require_once '../model/election.php';
require_once '../model/resultat.php';
$election = new Election();

$dateActuelle = date('y-m-d');
$dateActuelle = '20'.$dateActuelle;

$tempsVote = $election->checkFinVotePresidence($dateActuelle);

$resultat = new Resultat();
$resultats = $resultat->getResultatPresidance();
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once '../includes/navbarPresidance.php';
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/template/images/favicon.png" />
</head>

<body>
    <?php if($tempsVote):?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">pourcentage obtenu</h4>
                  
                  <div class="table-responsive">
                    
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              photo
                            </th>
                            <th>
                              Nom
                            </th>
                            <th>
                              Post_nom
                            </th>
                            <th>
                              Prénom
                            </th>
                            <th>
                              matricule
                            </th>
                            <th>
                              nombre des voix obtenues
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($resultats as $data):?>
                          <tr>
                            <td class="py-1">
                              <img src=<?php echo $data['photo']?> alt="image"/>
                            </td>
                            <td>
                            <?php  echo $data['nom']?>
                            </td>
                            <td>
                            <?php  echo $data['post_nom']?>
                            </td>
                            <td>
                            <?php  echo $data['prenom']?>
                            </td>
                            <td>
                            <?php  echo $data['matricule']?>
                            </td>
                            <td>
                              <?php  echo $data['nombreVoix']?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                  </div>
                </div>
              </div>
            </div>
            </div>
            
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php else: ?>
    <h1>Vote en cours</h1>
  <?php endif;?>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../assets/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets/template/js/off-canvas.js"></script>
  <script src="../assets/template/js/hoverable-collapse.js"></script>
  <script src="../assets/template/js/template.js"></script>
  <script src="../assets/template/js/settings.js"></script>
  <script src="../assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
<?php
require_once '../includes/_footerCoordination.php';
?>
</html>
