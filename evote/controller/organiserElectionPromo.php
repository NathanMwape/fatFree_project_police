<?php
    session_start();
    require_once "../model/election.php";
    if(!empty($_POST['dateDebutCandidature']) && !empty($_POST['dateFinCandidature']) && !empty($_POST['dateFinVote'])){
        if(($_POST['dateDebutCandidature'] <= $_POST['dateFinCandidature'])){
            if($_POST['dateFinCandidature'] <= $_POST['dateFinVote']){

                $idCoordination = $_SESSION['idCoordination'];
                $dateDebut = htmlspecialchars($_POST['dateDebutCandidature']);
                $dateFin = htmlspecialchars($_POST['dateFinCandidature']);
                $dateFinVote = htmlspecialchars($_POST['dateFinVote']);

                $election = new Election();
                $election->lancerCandidaturePromo($dateDebut, $dateFin, $dateFinVote, $idCoordination);
                $_SESSION['notifOrganiserElectionPromo'] = 'les candidatures ont été lancées';
                header('Location: ../view/organiserElectionPromo.php');
            }
            else{
                $_SESSION['notifOrganiserElectionPromo'] = 'la date de fin de vote doit être supérieur celle de la fin de candidature';
                header('Location: ../view/organiserElectionPromo.php');
            }
        }
        else{
            $_SESSION['notifOrganiserElectionPromo'] = 'la date de début doit être supérieur à la date de fin';
            header('Location: ../view/organiserElectionPromo.php');
        }
}
else{
    $_SESSION['notifOrganiserElectionPromo'] = 'pas des champs vide svp !!!';
    header('Location: ../view/organiserElectionPromo.php');
}
?>