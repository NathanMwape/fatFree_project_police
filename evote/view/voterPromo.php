<?php
if(!isset($_SESSION))
{
  session_start();
}
//$d=array();
require_once '../model/candidat.php';
require_once '../model/election.php';

$candidature = new Candidat();
//$vote=$candidature->getCandidat();

$candidats = $candidature->getAllCandidatureValidePromotion($_SESSION['idPromotion']);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php
        require_once '../includes/div-head.php';
    ?>
<body>
    <?php
        require_once '../includes/div-navbar.php';
        $election = new Election();
        $tempsDeVote = $election->checkLancementVotePromotion($dateActuelle, $_SESSION['idCoordination']);
        
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
              <form action="../controller/voterPromo.php" method="post">
                <input type="hidden" name="idCandidature"  value="<?php echo ($data['idcandidature']);?>">
             <div>
             <?php if($tempsDeVote): ?>
                <button data-bs-toggle="modal" type="submit" class="btn btn-success fw-bolder px-4 ms-2 fs-8">
                  Voter
                </button>
              <?php endif;?>
              </form>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary fw-bolder fs-8">
                  <a href="voirprojet.php?idCandidature=<?php echo $data['idcandidature'];?>" >Motivation</a> 
              </button>

              <!--  start datamodal   -->
              <!-- Button trigger modal -->
                  <button type="button" id="motivationID" class="btn btn-primary viewbtn" data-toggle="modal" data-target="#exampleModalCenter">
                    Motivation
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Motivation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              <!--  End datamodel-->
             </div>           
            </div>
          </div><!-- End Team Member -->

          <?php endforeach;?>
          <?php
            if(isset($_SESSION['votePromo']))
                echo $_SESSION['votePromo'];
          ?>
        </div>

      </div>
    </section><!-- End Our Team Section -->

  </main><!-- End #main -->

  <?php
    require_once '../includes/div-footer.php';
    require_once '../includes/div-js.php';
  ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
            // $(document).ready(function () {
            //     $('.viewbtn').on('click', function () {
            //         $('#motivationID').modal('show');
            //         $tr = $(this).closest('tr');
            //         var data = $tr.children("td").map(function () {
            //             return $(this).text();
            //         }).get();
            //       });
            //   });
        
</script>
</body>

</html>