<?php
    session_start();
    require_once '../model/resultat.php';
    require_once '../model/vote.php';

    if(!empty($_POST['idCandidature']))
    {
        $idCandidature = intval(htmlspecialchars($_POST['idCandidature']));
        $idEtudiant = intval($_SESSION['idEtudiant']);
        $idPromotion = intval($_SESSION['idPromotion']);
        
        $vote = new Vote($idEtudiant, $idCandidature, $idPromotion);

        //vérifier que le soit fait une seule fois
        if($vote->checkVotePromo()){
            $resultat = new Resultat();

            $resultat->setIdCandidature($idCandidature);
            
            $resultat->voter($idEtudiant);
    
            $_SESSION['votePromo'] = 'vote enregistré!';
            header('Location: ../view/voterPromo.php');
        }
        else{
            $_SESSION['votePromo'] = 'vous avez déjà voté';
            header('Location: ../view/voterPromo.php');
        }
    }
    else
    {
        $_SESSION['votePromo'] = 'pas enregistrer!';
        header('Location: ../view/voterPromo.php');
    } 
?>