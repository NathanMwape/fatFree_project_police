<?php 

class Etudiant
{
    private $idetudiant;
    private $nom;
    private $post_nom;
    private $prenom;
    private $matricule;
    private $password;
    private $genre;
    private $photo;
    private $confession;
    private $pourcentage;

    private $bdd;

    public function __construct($matricule, $password)
    {   
        $this->matricule = $matricule;
        $this->password = $password;
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }

    public function authentification()
    {
        $requete = $this->bdd->prepare('SELECT * FROM etudiant WHERE matricule = ? AND mdp = ?');
        $requete->execute([$this->matricule, $this->password]);
        return $requete->fetch();
    }

    public function getIdCoord():int{
        $requete = $this->bdd->prepare('SELECT idpromotion FROM etudiant WHERE matricule = ? AND mdp = ?');
        $requete->execute([$this->matricule, $this->password]);
        $idPromotion = $requete->fetch()['idpromotion'];

        $requete = $this->bdd->prepare('SELECT id FROM coordination WHERE idPromotion = ?');
        $requete->execute([$idPromotion]);
        $idCoordination = $requete->fetch()['id'];

        return $idCoordination;
    }
}