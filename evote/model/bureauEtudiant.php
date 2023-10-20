<?php 
class BureauEtudiant
{
    private $pseudo;
    private $pwd;
    private $bdd;

    public function __construct($pseudo, $pwd)
    {
        $this->pseudo = $pseudo;
        $this->pwd = $pwd;
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }
    
    public function checkAuth():bool{
        $requete = $this->bdd->prepare('SELECT * FROM bureauEtudiant WHERE pseudo = ? AND mdp = ?');
        $requete->execute([$this->pseudo, $this->pwd]);

        $trouver = $requete->fetchAll();
        if(count($trouver) != 0)
            return true;
        return false;
    }

    public function getId():int{
        $requete = $this->bdd->prepare('SELECT id FROM bureauEtudiant WHERE pseudo = ? AND mdp = ?');
        $requete->execute([$this->pseudo, $this->pwd]);

        $trouver = $requete->fetch();

        return $trouver['id'];
    }
}
