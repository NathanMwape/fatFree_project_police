 <!-- ======= Header ======= -->
<?php 
if(!isset($_SESSION))
{
  session_start();
}
require_once ('../model/election.php');
$election = new Election();
$idPromotion = $_SESSION['idPromotion'];
$dateActuelle = date('y-m-d');
$dateActuelle = '20'.$dateActuelle;

$candidatureLancerPromotion = $election->checkLancementPromotionnel($idPromotion, $dateActuelle);
$candidatureLancerPresidance = $election->checkLancementPresidance($dateActuelle);
?>
<header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>Jevote<span>.</span></h1>
  </a>

    
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="accueil.php">Accueil</a></li>
     <li> <div class="nav-item dropdown">
        <?php 
            if($_SESSION['idPromotion'] >= 2 && $_SESSION['idPromotion'] <= 8){
                  echo '<a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Postuler</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                  if($candidatureLancerPresidance){
                    echo '<li><a class="dropdown-item" href="candidat.php?type=presidence">Présidence</a></li>';
                  }
                  else{
                    echo '<span class="dropdown-item">Candidatures non lancées pour la présidance</span>';
                  }
                  if($candidatureLancerPromotion){
                    echo  '<li><a class="dropdown-item" href="candidat.php?type=promotionnel">promotionnel</a></li>';
                  }
                  else{
                      echo '<span class="dropdown-item">Candidatures non lancées pour la promotion</span>';
                  }
                  
                  echo'</ul>
            </div>
       </li>';
          }
          elseif($_SESSION['idPromotion'] == 1 || ($_SESSION['idPromotion'] >= 9 && $_SESSION['idPromotion'] <= 13)){
            if($candidatureLancerPromotion){
              echo '<li><a href="candidat.php?type=promotionnel">Postuler</a></li>';
            }
            else{
              echo '<span class="dropdown-item">Candidatures non lancées</span>';
            }
         }
        ?>
      <li>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Voter</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="voterPresidance.php">Présidence</a></li>
            <li><a class="dropdown-item" href="voterPromo.php">promotionnel</a></li>
          </ul>
        </div>
      </li>
      <li>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Résultat</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="resultat.php?type=presidance">Présidence</a></li>
            <li><a class="dropdown-item" href="resultat.php?type=promotionnel">promotionnel</a></li>
          </ul>
        </div>
      </li>
        <li><a href="../controller/deconnexion.php">Se déconnecter</a></li>
      </ul>
  </nav>

  </div>
</header>
