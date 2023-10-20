<?php
session_start();
require_once "../model/candidat.php";
if(!empty($_GET['idCandidature'])){
    $idCandidature = intval($_GET['idCandidature']);
    $promotion = new Candidat();
    $promotion->validerCandidat($idCandidature);

    $_SESSION['notifDashboard'] = "candidat validée avec succès";
    header('Location: ../view/dashboard.php');
}
else{
    header('Location: ../view/dashboard.php');
}