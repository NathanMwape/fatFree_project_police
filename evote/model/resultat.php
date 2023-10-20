<?php 

class Resultat
{
    private $idresultat;
    private $idCandidature;
    private $voix;
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
    }
    public function voter($idEtudiant)
    {
        //récuperation de voix
        Resultat::getNombreVoix();
        $requete = $this->bdd->prepare('UPDATE resultat SET nombreVoix = ? WHERE idCandidature = ?');
        $requete->execute([$this->voix + 1, $this->idCandidature]);

        //insertion de l'étudiant dans table vote
        $requete = $this->bdd->prepare("INSERT INTO vote(idEtudiant, idCandidature) VALUES(?, ?)");
        $requete->execute([$idEtudiant, $this->idCandidature]);
    }
    //la méthode retourne le nombre de voix pour une candidat
    private function getNombreVoix(){
        $requete = $this->bdd->prepare('SELECT nombreVoix FROM resultat WHERE idcandidature = ?');
        $requete->execute(array($this->idCandidature));

        $trouver = $requete->fetch();
        $this->voix = $trouver['nombreVoix'];
    }

    public function setIdCandidature($idCandidature){
        $this->idCandidature = $idCandidature;
    }
   
    public function getResultatPromotion($idPromotion):array
    {
        $requete = $this->bdd->prepare('SELECT * FROM candidat AS c 
        INNER JOIN etudiant AS e
        ON c.idetudiant = e.idetudiant
        INNER JOIN promotion AS p
        ON e.idpromotion = p.idpromotion 
        INNER JOIN resultat AS r
        ON c.idcandidature = r.idcandidature
        WHERE c.idpromotion = ?
        AND c.status = 1 AND c.typeCandidature = "promotionnel" ');

        $requete->execute([$idPromotion]);
        return $requete->fetchAll();
    }

    public function getResultatPresidance():array
    {
        $requete = $this->bdd->query('SELECT * FROM candidat AS c 
        INNER JOIN etudiant AS e
        ON c.idetudiant = e.idetudiant
        INNER JOIN promotion AS p
        ON e.idpromotion = p.idpromotion 
        INNER JOIN resultat AS r
        ON c.idcandidature = r.idcandidature
        WHERE c.status = 1 AND c.typeCandidature = "presidence" ');

        return $requete->fetchAll();
    }
}

