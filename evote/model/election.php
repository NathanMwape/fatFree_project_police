<?php 
class Election
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }
    
    public function lancerCandidaturePromo($dateDebut, $dateFin, $dateFinVote, $idCoordination):void{
        if(Election::verifLancementPromotionnel($idCoordination)){
            $requete = $this->bdd->prepare('UPDATE election SET date_debut = :date_debut, date_fin = :date_fin, dateFinVote = :dateFinVote
            WHERE idCoordination = :idCoordination');

            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':dateFinVote', $dateFinVote);
            $requete->bindParam(':idCoordination', $idCoordination);

            $requete->execute();
        }
        else{
            $requete = $this->bdd->prepare('INSERT INTO election(date_debut, date_fin, dateFinVote, idCoordination)
            VALUES(:date_debut, :date_fin, :dateFinVote, :idCoordination)');
            
            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':dateFinVote', $dateFinVote);
            $requete->bindParam(':idCoordination', $idCoordination);
    
            $requete->execute();
        }

    }

    public function lancerCandidaturePresidance($dateDebut, $dateFin, $dateFinVote, $idBureauEtudiant):void{
        if(Election::verifLancementPresidance($idBureauEtudiant)){
            $requete = $this->bdd->prepare('UPDATE election SET date_debut = :date_debut, date_fin = :date_fin, dateFinVote = :dateFinVote
            WHERE idBureauEtudiant = :idBureauEtudiant');

            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':dateFinVote', $dateFinVote);
            $requete->bindParam(':idBureauEtudiant', $idBureauEtudiant);

            $requete->execute();
        }
        else{
            $requete = $this->bdd->prepare('INSERT INTO election(date_debut, date_fin, dateFinVote, idBureauEtudiant)
            VALUES(:date_debut, :date_fin, :dateFinVote, :idBureauEtudiant)');

            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':dateFinVote', $dateFinVote);
            $requete->bindParam(':idBureauEtudiant', $idBureauEtudiant);

            $requete->execute();
        }

    }
    /*  cette methode vérifie si les candidature d'une promotion sont lancées afin
        de savoir si il faut faire un UPDATE ou un INSERT
    */
    private function verifLancementPromotionnel($idCoordination):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election WHERE idCoordination = :idCoordination');
        $requete->bindParam(':idCoordination', $idCoordination);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }

    /*  cette methode vérifie si les candidature de la présidance sont lancées afin
        de savoir si il faut faire un UPDATE ou un INSERT
    */
    private function verifLancementPresidance($idBureauEtudiant):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election WHERE idBureauEtudiant = :idBureauEtudiant');

        $requete->bindParam(':idBureauEtudiant', $idBureauEtudiant);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }
    public function checkLancementPromotionnel($idPromotion, $dateActuelle):bool{
        //récuperation de l'id de la coordination
        $requete = $this->bdd->prepare('SELECT id FROM coordination WHERE idPromotion = ?');
        $requete->execute([$idPromotion]);
        $trouver = $requete->fetch();

        $idCoordination = $trouver['id'];

        //vérifier si les candidature sont lancées
        $requete = $this->bdd->prepare('SELECT * FROM election WHERE date_fin >= ? AND idCoordination = ?');
        $requete->execute([$dateActuelle, $idCoordination]);
        $pourDate = $requete->fetchAll();

        $requete = $this->bdd->query('SELECT * FROM candidat WHERE typeCandidature = "promotionnel" ');
        $pourNombre = $requete->fetchAll();
        
        if(count($pourDate) != 0 && count($pourNombre) < 6)
            return true;
        return false;
    }
    
    //vérifier si les candidature sont lancées (en vérifiant la date de fin de candidature)
    public function checkLancementPresidance($dateActuelle):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election WHERE date_fin >= ? AND idBureauEtudiant = 1');
        $requete->execute([$dateActuelle]);
        $pourDate = $requete->fetchAll();

        $requete = $this->bdd->query('SELECT * FROM candidat WHERE typeCandidature = "presidence" ');
        $pourNombre = $requete->fetchAll();

        if(count($pourDate) != 0 && count($pourNombre) < 6)
            return true;
        return false;
    }
    //méthode verifie si le vote du côte promotionnelle est lancé
    public function checkLancementVotePromotion($dateActuelle, $idCoordination):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election 
        WHERE date_fin < ? 
        AND dateFinVote  > ? 
        AND idCoordination = ?');
        $requete->execute([$dateActuelle, $dateActuelle, $idCoordination]);
        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }

    //méthode verifie si le vote du côte presidance est lancé
    public function checkLancementVotePresidance($dateActuelle):bool{
        $requete = $this->bdd->prepare("SELECT * FROM election 
        WHERE dateFinVote > :dateActuelle 
        AND date_fin < :dateActuelle
        AND idBureauEtudiant = 1");
        $requete->bindParam(':dateActuelle', $dateActuelle);
        $requete->execute();

        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }

    //méthode verifie la fin de temps de vote
    public function checkFinVotePromotion($dateActuelle, $idCoordination):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election 
        WHERE dateFinVote  < :dateActuelle
        AND idCoordination = :idCoordination ');

        $requete->bindParam(':dateActuelle', $dateActuelle);
        $requete->bindParam(':idCoordination', $idCoordination);
        $requete->execute();

        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }

    //méthode verifie la fin de temps de vote
    public function checkFinVotePresidence($dateActuelle):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election 
        WHERE dateFinVote  < :dateActuelle
        AND idBureauEtudiant = 1');

        $requete->bindParam(':dateActuelle', $dateActuelle);
        $requete->execute();
        
        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }
}
