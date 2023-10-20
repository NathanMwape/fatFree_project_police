<?php
    session_start();
    require_once "../model/election.php";

    if(!empty($_POST['dateDebutCandidature']) && !empty($_POST['dateFinCandidature']) && !empty($_POST['dateFinVote'])){
        if(($_POST['dateDebutCandidature'] <= $_POST['dateFinCandidature'])){
            if($_POST['dateFinCandidature'] <= $_POST['dateFinVote']){

                $idBureauEtudiant = 1;
                $dateDebut = htmlspecialchars($_POST['dateDebutCandidature']);
                $dateFin = htmlspecialchars($_POST['dateFinCandidature']);
                $dateFinVote = htmlspecialchars($_POST['dateFinVote']);

                $election = new Election();
                $election->lancerCandidaturePresidance($dateDebut, $dateFin, $dateFinVote, $idBureauEtudiant);
                $_SESSION['notifOrganiserElectionPresidance'] = 'les candidatures ont été lancées';
                header('Location: ../view/organiserElectionPresidance.php');
            }
            else{
                $_SESSION['notifOrganiserElectionPresidance'] = 'la date de fin de vote doit être supérieur celle de la fin de candidature';
                header('Location: ../view/organiserElectionPresidance.php');
            }
        }
        else{
            $_SESSION['notifOrganiserElectionPresidance'] = 'la date de début doit être supérieur à la date de fin';
            header('Location: ../view/organiserElectionPresidance.php');
        }
    }
    else{
        $_SESSION['notifOrganiserElectionPresidance'] = 'pas des champs vide svp !!!';
        header('Location: ../view/organiserElectionPresidance.php');
    }
?>