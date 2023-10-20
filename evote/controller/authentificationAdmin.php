<?php
session_start();
require_once "../model/coordination.php";
require_once "../model/bureauEtudiant.php";

if(!empty($_POST['matricule']) && !empty($_POST['password']))
{  
    $matricule = $_POST['matricule'];
    $pwd = $_POST['password'];
    
    //création de la promotion
    $coord = new Coordination($matricule, $pwd);
    $bureauEtudiant = new BureauEtudiant($matricule, $pwd);

    //tester l'authentification
    if($coord->checkAuth()){
        $_SESSION['idPromotion'] = $coord->getIdPromotion();
        $_SESSION['idCoordination'] = $coord->getId();
        $_SESSION['matCoord'] = $coord->getNom();

        header('location: ../view/dashboard.php');
    }
    else if($bureauEtudiant->checkAuth()){
        $_SESSION['idBureauEtudiant'] = $bureauEtudiant->getId();
        header('location: ../view/dashboardPresidence.php');
    }
    else{
        $_SESSION['notifAdminAuth'] = "matricule ou mot de passe incorrect";
        header('location: ../view/adminAuthentification.php');
    }
}
else{
    $_SESSION['notifAdminAuth']="pas champ vide";
    header('location: ../view/adminAuthentification.php');
}

?>
