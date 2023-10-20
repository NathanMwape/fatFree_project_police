<?php
session_start();
require_once "../model/candidat.php";
if(!empty($_GET['idCandidature'])){
    $idCandidature = intval($_GET['idCandidature']);
    $promotion = new Candidat();
    $promotion->supprimerCandidat($idCandidature);
    
    $_SESSION['notifDashboardPresidence'] = "candidat supprimer avec succès";
    header('Location: ../view/dashboardPresidence.php');
}
else{
    header('Location: ../view/dashboardPresidence.php');
}