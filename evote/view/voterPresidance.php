<?php
if(!isset($_SESSION))
{
  session_start();
}
require_once '../model/candidat.php';
require_once '../model/election.php';

$candidature = new Candidat();

$candidats = $candidature->getAllCandidatureValidePresidance();

?>
<!DOCTYPE html>
<html lang="en">

    <?php
        require_once '../includes/div-head.php';
    ?>
<body>
    <?php
        require_once '../includes/div-navbar.php';
        $election = new Election();
        $tempsDeVote = $election->checkLancementVotePresidance($dateActuelle);
    ?>

  <main id="main">   

 <!-- ======= Our Team Section ======= -->
 <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Candidats retenus </h2>
          <p>Je vote pour ...</p>
        </div>

        <div class="row gy-4">
          <?php foreach($candidats as $data):?>

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="<?php echo $data['photo']?>" class="img-fluid" alt="">
              <h4><?php  echo $data['nom'].' '.$data['post_nom'].' '.$data['prenom'];?></h4>
              <span><?php  echo $data['typeCandidature'];?></span>
              <span><?php  echo $data['filiere'];?></span>
              <form action="../controller/voterPresidance.php" method="post">
                <input type="hidden" name="idCandidature"  value="<?php echo $data['idcandidature'];?>">
             <div>
              <?php if($tempsDeVote):?>
                <button data-bs-toggle="modal" type="submit" class="btn btn-success fw-bolder px-4 ms-2 fs-8">
                  Voter
                </button>
              <?php endif;?>
              </form>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary fw-bolder fs-8">
                <a href="voirProjet.php?idCandidature=<?php echo $data['idcandidature'];?>" >Motivation</a>
              </button>

             </div>           
            </div>
          </div><!-- End Team Member -->

          <?php endforeach;?>
        </div>
        <?php
            if(isset($_SESSION['votePresidance']))
                echo $_SESSION['votePresidance'];
        ?>
      </div>
    </section><!-- End Our Team Section -->

  </main><!-- End #main -->

  <?php
    require_once '../includes/div-footer.php';
    require_once '../includes/div-js.php';
  ?>

</body>

</html>