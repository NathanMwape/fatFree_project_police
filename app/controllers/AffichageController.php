<?php 
    class AffichageController extends BaseController {

        public function affichageDetail() {
            new Session();
            $login = $this->f3->get("SESSION.login");
            $password = $this->f3->get("SESSION.password");
            if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());
            $this->f3->set("unite_appart", $policier->police_unite_appartenance());
            $countp = $policier->countPolicier();
            $this->f3->set('countPolicier', $countp);

            // affichage de nombre de policier dans la base de donne et ainsi que le  nombre de ceux qui ont déjà des arme où pas
            $countAtt = $policier->countPolicierAtt();
            $this->f3->set("countAttrib",$countAtt);
            $countNattr = $policier->countPolicierNoAttr();
            $this->f3->set("countNotAttr",$countNattr);

            // affichage de tous les armes dans la base de données 
            $arme = new Arme($this->db);
            $this->f3->set("arme", $arme->all());
            $countA = $arme->countArme();
            $this->f3->set('countArme', $countA);


            // affichage de tous le nombre de munition qui sont dans la table munition
            $munition = new Munition($this->db);
            $this->f3->set("munition", $munition->all());
            $countM = $munition->countMunition();
            $this->f3->set('countMunition', $countM);

            echo Template::instance()->render("index.html");
          }else{
            echo Template::instance()->render("404.html");
          }
        
        }



        public function rapportComm()
        {
            new Session();
            $login = $this->f3->get("SESSION.login");
            $password = $this->f3->get("SESSION.password");
            if(isset($login) && isset($password)){
              echo Template::instance()->render("rapport.html");
            }else{
                echo Template::instance()->render("404.html");
            }
        }

        public function accueil_comm()
        {
            new Session();
            $login = $this->f3->get("SESSION.login");
            $password = $this->f3->get("SESSION.password");
            # Si l'utilisateur est connecter on lui affiche sont 
            # page sinon on lui dit de se connecter
            if(isset($login) && isset($password))
            {
              $policier = new Policier($this->db);
              $this->f3->set("policier", $policier->all());
              $this->f3->set("unite_appart", $policier->police_unite_appartenance());
              $countp = $policier->countPolicier();
              $this->f3->set('countPolicier', $countp);

              // affichage de nombre de policier dans la base de donne et ainsi que le  nombre de ceux qui ont déjà des arme où pas
              $countAtt = $policier->countPolicierAtt();
              $this->f3->set("countAttrib",$countAtt);
              $countNattr = $policier->countPolicierNoAttr();
              $this->f3->set("countNotAttr",$countNattr);

                echo Template::instance()->render("s_commissariat.html");
            }
            else 
                echo Template::instance()->render("404.html");
        }



    public function addRapport(){
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");

        if(isset($login) && isset($password)){
            $rapport = new Rapports($this->db);

            $contenues = $_POST['contenues'];
            $rapport->descriptions = $contenues;
            $rapport->date_creation = date("Y-m-d H:i:s");
            $rapport->save();
        }else{
            echo Template::instance()->render("404.html");
        }
    }

}