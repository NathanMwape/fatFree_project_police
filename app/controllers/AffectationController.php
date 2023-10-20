<?php

class AffectationController extends BaseController
{

    public function affectation()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if (isset($login) && isset($password)) {

            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());
            $this->f3->set("policiers", $policier->getPoliceByCommissariat($login));

            $commissariat = new Commissariat($this->db);
            $this->f3->set("commissariats", $commissariat->all());

            $affectation = new Affectation($this->db);
            $this->f3->set("affectations", $affectation->all());
            if (isset($_GET["error"])) {
                $this->f3->set("info_ajout", "Veuillez renseigner toutes les dates");
            }

            $ctrl_fin = [];
            $aff = new Affectation($this->db);
            $pol = new Policier($this->db);
            $pol = $pol->getPoliceByCommissariat($login);
            $date_actuelle = date("Y-m-d");
            foreach( $aff->find()  as $a) {
                $cond = $a->date_fin > $date_actuelle;
                
                foreach($pol as $p) {
                    if($a->nom_commissariat == $p->nom_commissariat && $a->nom_policier == $p->nom) {
                        $ctrl_fin[$p->nom] = $cond;
                    }
                }
            }
            $this->f3->set("conds", $ctrl_fin);
            // $this->f3->set("")
            
            echo Template::instance()->render("affectation.html");
        } else {
            echo Template::instance()->render("404.html");
        }
    }




    public function addAffectation()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if (isset($login) && isset($password)) {
            $dateAffect = $_POST["dateAffect"];
            $dateFinaffect = $_POST["dateFinAffect"];
            $date_actuelle = new DateTime(date("Y-m-d H:i:s"));
            if (empty($dateAffect) || empty($dateFinaffect)) {
                $this->f3->reroute("/affectation?error=1");
            } else {
                $nom_policier = $_POST["nom_policier"];
                $nom_commissariat = $login;
                
                $affectation = new Affectation($this->db);
                $affectation->nom_policier = $nom_policier;
                $affectation->date_affectation = $dateAffect;
                $affectation->date_fin = $dateFinaffect;
                $affectation->nom_commissariat = $nom_commissariat;
                $affectation->save();

                $this->f3->set("info_ajout", " $nom_policier a ete affecte au commissariat $nom_commissariat");
                $this->f3->reroute("/affectation");
            }
        }
    }

    public function desaffecter($id)
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if (isset($login) && isset($password)) {
            $affectation = new Affectation($this->db);
            $this->f3->set("affectations", $affectation->all());
            $dateAffect = $_POST["dateAffect"];
            $dateFinaffect = $_POST["dateFinAffect"];
            $date_actuelle = new DateTime(date("Y-m-d H:i:s"));;
            $affectation->delete($id);

            // $arme= new Arme($this->db);
            // $arme->load(array('id_arme=?', $arme_id));
            // $arme->nombre_arme = $arme->nombre_arme - 1;
            // $arme->save();
            // Vérifier si la date actuelle est supérieure ou égale à la date de fin
            if ($date_actuelle >= new DateTime($dateFinaffect)) {
                $this->f3->set("desaffecter", $affectation->desaffecter());
                // $affectation->desaffecter(); // Appel à une nouvelle méthode dans le modèle
                $this->f3->reroute("/affectation");
            }
            $this->f3->reroute("/affectation");
        }
    }
}
