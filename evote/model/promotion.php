<?php 
class Promotion
{
    private $idPromotion;
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }

    public function setId($idPromotion){
        $this->idPromotion = $idPromotion;
    }
    
    //la méthode retourne toute les promotion
    public function getAllPromotion():array{
        $requete = $this->bdd->query("SELECT idpromotion, filiere FROM promotion");
        $trouver = $requete->fetchAll();

        return $trouver;
    }

    //la méthode verifie l'eligibilité d'une promotion à la présidance
    public function checkEligibilite():bool{
        $tableau = [2, 3, 4, 5, 6, 7, 8];
        if(in_array($this->idPromotion, $tableau))
            return true;
        return false;
    }

    
}
