<?php
    class Candidat
    {
        private $projet;
        private $typeCandidature;
        private $idEtudiant;
        private $idPromotion;
        private $photo;

        private $bdd;
       

        public function __construct()
        {
            $this->bdd = new PDO("mysql:host=localhost;dbname=jevote", "root", "");
        }

        public function setAttribut($typeCandidature, $projet, $idEtudiant, $idPromotion, $photo){
            $this->typeCandidature = $typeCandidature;
            $this->projet = $projet;
            $this->idEtudiant = $idEtudiant;
            $this->idPromotion = $idPromotion;
            $this->photo = $photo;
        }
        //la méthode verifie l'existance d'une candidature
        public function checkExistance():bool{
            $requete = $this->bdd->prepare('SELECT * FROM candidat WHERE idetudiant = ? AND typeCandidature = ?');
            $requete->execute([$this->idEtudiant, $this->typeCandidature]);

            $trouver = $requete->fetchAll();
            
            if(count($trouver) == 0)
                return true;
            return false;
        }
        //insertion des candidature dans la bdd
        public function postuler()
        {
            $requete = $this->bdd->prepare('INSERT INTO candidat SET projet = ?, typecandidature = ?, 
            idetudiant = ?, idpromotion = ?, photo =?');
            $requete->execute([$this->projet, $this->typeCandidature, $this->idEtudiant, $this->idPromotion, 
            $this->photo]);
        }

        //cette méthode retourne toute les candidature d'une promotion 
        public function getAllCandidatureById($idPromotion):array{
            $requete = $this->bdd->prepare("SELECT * FROM candidat AS c 
            INNER JOIN etudiant AS e ON c.idetudiant = e.idetudiant
            INNER JOIN promotion AS p ON c.idpromotion = p.idpromotion
            WHERE c.idpromotion = ? AND c.typeCandidature = 'promotionnel'");  
            $requete->execute([$idPromotion]);
            
            $trouver = $requete->fetchAll();

            return $trouver;
        }

        //cette methode retourne toute les candidature valides d'une promotion
        public function getAllCandidatureValidePromotion($idPromotion):array{
            $requete = $this->bdd->prepare("SELECT * FROM candidat AS c 
            INNER JOIN etudiant AS e ON c.idetudiant = e.idetudiant
            INNER JOIN promotion AS p ON c.idpromotion = p.idpromotion
            WHERE c.idpromotion = ? 
            AND c.typeCandidature = 'promotionnel'
            AND c.status = 1");  
            $requete->execute([$idPromotion]);
            
            $trouver = $requete->fetchAll();

            return $trouver;
        }

        //cette methode retourne toute les candidature valides d'une promotion
        public function getAllCandidatureValidePresidance():array{
            $requete = $this->bdd->prepare("SELECT * FROM candidat AS c 
            INNER JOIN etudiant AS e ON c.idetudiant = e.idetudiant
            INNER JOIN promotion AS p ON c.idpromotion = p.idpromotion
            WHERE c.typeCandidature = 'presidence' AND c.status = 1");  
            
            $requete->execute();
            
            $trouver = $requete->fetchAll();

            return $trouver;
        }

        //cette méthode retourne toute les candidature à la présidance 
        public function getAllCandidaturePresidance():array{
            $requete = $this->bdd->query("SELECT * FROM candidat AS c 
            INNER JOIN etudiant AS e ON c.idetudiant = e.idetudiant
            INNER JOIN promotion AS p ON c.idpromotion = p.idpromotion
            WHERE c.typeCandidature = 'presidence' ");
            
            $trouver = $requete->fetchAll();

            return $trouver;
        }
        //cette méthode valide un candidat
        public function validerCandidat($idCandidature):void{
            $requete = $this->bdd->prepare("UPDATE candidat SET status = 1 WHERE idcandidature = ?");
            $requete->execute([$idCandidature]);

            $requete = $this->bdd->prepare("INSERT resultat(idcandidature) VALUES(?)");
            $requete->execute([$idCandidature]);
        }
        //cette méthode supprime un candidat
        public function supprimerCandidat($idCandidature):void{
            $requete = $this->bdd->prepare("DELETE FROM vote WHERE idCandidature = ?");
            $requete->execute([$idCandidature]);

            $requete = $this->bdd->prepare("DELETE FROM resultat WHERE idcandidature = ?");
            $requete->execute([$idCandidature]);

            $requete = $this->bdd->prepare("DELETE FROM candidat WHERE idcandidature = ?");
            $requete->execute([$idCandidature]);
        }

        public function getProjet($idCandidature):array{
            $requete = $this->bdd->prepare('SELECT projet FROM candidat WHERE idcandidature = :id');
            $requete->bindParam(':id', $idCandidature);
            $requete->execute();

            $trouver = $requete->fetchAll();
            return $trouver;
        }
    }
?>