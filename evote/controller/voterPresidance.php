<?php
    session_start();
    require_once '../model/resultat.php';
    require_once '../model/vote.php';

    if(!empty($_POST['idCandidature']))
    {
        $idCandidature = intval(htmlspecialchars($_POST['idCandidature']));
        $idEtudiant = intval($_SESSION['idEtudiant']);
        $idPromotion = $_SESSION['idPromotion'];
        
        $vote = new Vote($idEtudiant, $idCandidature, $idPromotion);

        //vérifier que le soit fait une seule fois
        if($vote->checkVotePresidance()){
            $resultat = new Resultat();

            $resultat->setIdCandidature($idCandidature);
            
            $resultat->voter($idEtudiant);
    
            $_SESSION['votePresidance'] = 'vote enregistré!';
            header('Location: ../view/voterPresidance.php');
        }
        else{
            $_SESSION['votePresidance'] = 'vous avez déjà voté';
            header('Location: ../view/voterPresidance.php');
        }
    }
    else
    {
       $_SESSION['votePresidance'] = 'pas enregistrer!';
        header('Location: ../view/voterPresidance.php');
    } 
?>