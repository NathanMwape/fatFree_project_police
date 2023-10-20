<?php
    session_start();
    require_once '../model/candidat.php';
    if(!empty($_POST['projet']) && !empty($_POST['typeCandidature']) && isset($_FILES['photo']) && 
    !empty($_POST['idEtudiant']) && !empty($_POST['idPromotion']))
    {
        if($_FILES['photo']['error'] == 0){
            $photo = $_FILES['photo']['tmp_name'];
            $isImange = getimagesize($photo);

            //vérifier si le fichier est une image
            if($isImange){
                //tester si la taille est conforme
                if($_FILES['photo']['size'] < 80000000){
                    //uploader la photo
                    $nomPhoto = $_FILES['photo']['name'];
                    $chemin = '../assets/img/team/'.$nomPhoto;
                    move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                   
                    //insertion de la condidature
                    $typeCandidature = htmlspecialchars($_POST['typeCandidature']);
                    $projet = $_POST['projet'];
                    $idEtudiant = intval($_POST['idEtudiant']);
                    $idPromotion = intval($_POST['idPromotion']);

                    $candidature = new Candidat();
                    $candidature->setAttribut($typeCandidature, $projet, $idEtudiant, $idPromotion, $chemin);
                    //verifier que la candidature soit unique
                    if($candidature->checkExistance()){
                        $candidature->postuler();
                        $_SESSION['notifCandidature'] = 'candidature enregistré!';
                        header('Location: ../view/candidat.php?type='.$_SESSION['type']);
                    }
                    else{
                        $_SESSION['notifCandidature'] = 'vous ne pouvez pas postuler plus d\'une fois!';
                        header('Location: ../view/candidat.php?'.$_SESSION['type']);
                    }
                    
                    
                }
                else{
                    $_SESSION['notifCandidature'] = 'la taille est trop grande';
                    header('Location: ../view/candidat.php?'.$_SESSION['type']);
                }
            }
            else{
                $_SESSION['notifCandidature'] = 'veuillez choisir une image';
                header('Location: ../view/candidat.php?'.$_SESSION['type']);
            }
        }
        else{
            $_SESSION['notifCandidature'] = 'l\'image contient des erreurs';
            header('Location: ../view/candidat.php?'.$_SESSION['type']);
        }
    }
    else
    {
        $_SESSION['notifCandidature'] = 'pas des champs vide svp';
        header('Location: ../view/candidat.php?'.$_SESSION['type']);
    }
?>


