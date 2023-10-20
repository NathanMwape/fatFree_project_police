<?php
class Vote{
    private $bdd;
    private $idEtudiant;
    private $idCandidature;
    private $idPromotion;

    public function __construct($idEtudiant, $idCandidature, $idPromotion){
        $this->idEtudiant = $idEtudiant;
        $this->idCandidature = $idCandidature;
        $this->idPromotion = $idPromotion;
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }

    public function checkVotePresidance():bool{
        
        $requete = $this->bdd->prepare("SELECT * FROM vote AS v 
        INNER JOIN candidat AS c ON v.idCandidature = c.idcandidature 
        WHERE v.idEtudiant = :idEtudiant AND c.typeCandidature = 'presidence'");
        
        $requete->bindParam(':idEtudiant', $this->idEtudiant);

        $requete->execute();
        $trouver = $requete->fetchAll();

        if(count($trouver) == 0)
            return true;
        return false;
    }
    

    public function checkVotePromo():bool{
        
        $requete = $this->bdd->prepare("SELECT * FROM vote AS v 
        INNER JOIN candidat AS c ON v.idCandidature = c.idcandidature 
        WHERE v.idEtudiant = :idEtudiant AND c.typeCandidature = 'promotionnel'");
        
        $requete->bindParam(':idEtudiant', $this->idEtudiant);

        $requete->execute();
        $trouver = $requete->fetchAll();

        if(count($trouver) == 0)
            return true;
        return false;
    }

}
?>