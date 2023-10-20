<!DOCTYPE html>
<html lang="en">
<?php
require_once '../model/candidat.php';
if(isset($_GET['idCandidature']))
  $idCandidature = $_GET['idCandidature'];

$candidature = new Candidat();
$projet = $candidature->getProjet($idCandidature);
//var_dump($vote);
?>
        <div class="row gy-4">
          <?php foreach($projet as $data):?>

              <h4><?php  echo $data['projet'];?></h4>
          <?php endforeach;?>
        </div>
    
</body>

</html>