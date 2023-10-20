<?php
session_start();
require_once "../model/etudiant.php";

if(!empty($_POST['matricule']) && !empty($_POST['password']))
{  
    $matricule = $_POST['matricule'];
    $password = $_POST['password'];

    $etudiant = new Etudiant($matricule, $password);

    $data = $etudiant->authentification($_POST['matricule'], $_POST['password']);
    if (is_array($data)){
        $_SESSION['utilisateur'] = $data['matricule'];
        $_SESSION['idEtudiant'] = $data['idetudiant'];
        $_SESSION['idPromotion'] = $data['idpromotion'];      
        $_SESSION['idCoordination'] = $etudiant->getIdCoord($_POST['matricule'], $_POST['password']);    
        header('location:../view/accueil.php');
    }
    else
    {
        $_SESSION['erreurAuthEtudiant'] = "matricule ou mot de passe incorrect";
        header('location:../view/authentification.php');
    }
}
else{
    $_SESSION['erreurAuthEtudiant']="champ vide";
    header('location:../view/authentification.php');
}

?>
