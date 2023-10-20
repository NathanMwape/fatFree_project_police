<?php
if(!isset($_SESSION))
{
  session_start();
}
require_once '../model/resultat.php';
require_once '../model/election.php';

$election = new Election();

$dateActuelle = date('y-m-d');
$dateActuelle = '20'.$dateActuelle;

$resultat = new Resultat();

if(isset($_GET['type']))
    if($_GET['type'] == 'promotionnel'){
      $resultats = $resultat->getResultatPromotion($_SESSION['idPromotion']);

      $idCoordination = $_SESSION['idCoordination'];
      $tempsVote = $election->checkFinVotePromotion($dateActuelle, $idCoordination);
    }
    else if($_GET['type'] == 'presidance'){
      $resultats = $resultat->getResultatPresidance();
      $tempsVote = $election->checkFinVotePresidence($dateActuelle);
    }
        
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

    

 <!-- ======= Our Team Section ======= -->
 <?php if($tempsVote):?>
  <section id="team" class="team">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Résultat obtenu...</h2>
          </div>
          <div class="row gy-4">
          <?php foreach($resultats as $data):?>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <img src="<?php echo $data['photo']?>" class="img-fluid" alt="">
                <h4><?php  echo $data['nom'].' '.$data['post_nom'].' '.$data['prenom'];?></h4>
                <span><?php  echo $data['typeCandidature'];?></span>
                <span><?php  echo $data['filiere'];?></span>
               <!--   <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php// echo $datas['nombreVoix'];?></div>
                  
                  </div> -->
                  <button data-bs-toggle="modal" type="" class="btn btn-success fw-bolder px-4 ms-2 fs-8">
                  <?php  echo $data['nombreVoix'].'  '.'voix';?>
                </button>
              </div>
              
            </div><!-- End Team Member -->

          <?php endforeach;?>
          </div>
          
          </div>

        </div>
      </section><!-- End Our Team Section -->
  <?php else:?>
    <h1>Vote en cours</h1>
  <?php endif;?>


  </main><!-- End #main -->

  <?php
    require_once '../includes/div-footer.php';
    require_once '../includes/div-js.php';
  ?>

</body>

</html>