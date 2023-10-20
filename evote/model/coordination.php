<?php 
class Coordination
{
    private $id;
    private $matricule;
    private $pwd;
    private $bdd;

    public function __construct($matricule, $pwd)
    {
        $this->matricule = $matricule;
        $this->pwd = $pwd;
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }
    
    public function checkAuth():bool{
        $requete = $this->bdd->prepare('SELECT * FROM coordination WHERE matricule = ? AND pwd = ?');
        $requete->execute([$this->matricule, $this->pwd]);

        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }


    public function getNom():string{
        $requete = $this->bdd->prepare('SELECT matricule FROM coordination WHERE matricule = ? AND pwd = ?');
        $requete->execute([$this->matricule, $this->pwd]);

        $trouver = $requete->fetch();

        return $trouver['matricule'];
    }

    public function getIdPromotion():int{
        $requete = $this->bdd->prepare('SELECT idPromotion FROM coordination WHERE matricule = ? AND pwd = ?');
        $requete->execute([$this->matricule, $this->pwd]);

        $trouver = $requete->fetch();

        return $trouver['idPromotion'];
    }
   
    public function getId():int{
        $requete = $this->bdd->prepare('SELECT id FROM coordination WHERE matricule = ? AND pwd = ?');
        $requete->execute([$this->matricule, $this->pwd]);

        $trouver = $requete->fetch();

        return $trouver['id'];
    }
}
