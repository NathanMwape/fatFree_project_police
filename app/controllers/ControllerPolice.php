<?php

class ControllerPolice extends BaseController {

    # Affiche le formulaire d'ajout d'un passager
    public function add_policier() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        $this->f3->set('nom_agent', $this->f3->get("SESSION.login"));
        if(isset($login) && isset($password)) { 
            echo Template::instance()->render("agent_ajouter_passager.html");
        }
        else {
            echo Template::instance()->render("erreur_page.html");
        }
    }

    public function add_munition(){
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){     
            $nombre = $_POST['nombre_munition'];
            $id_arme = $_POST['type_munition'];

            $munition = new Munition($this->db);
            $munition->load(array("type_munition = ?", $id_arme));

            if ($munition->type_munition == $id_arme) {
                $munition->nombre_munition += $nombre;
                $munition->save();
            }else if(!isset($munition->type_munition) and $munition->type_munition == "") {
                $munition->add();
            }

            $this->f3->reroute("/stockage");
        }else{
            echo Template::instance()->render("404.html");
        }
        
    }

    public function add_arme(){
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){     
             
            $arme = new Arme($this->db);
            $arme->add();
            $this->f3->reroute("/stockage");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    # Ajouter un policierr dans la base de donnees
    public function add_police_proc() {
        $policier = new Policier($this->db);
        $policier->add();
        $this->f3->reroute("/add_police");
    }


    public function add_police() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){ 
            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());
            echo Template::instance()->render("add_police.html");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    public function stockage() { 
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){  
            $arme = new Arme($this->db);
            $this->f3->set("arme", $arme->all());

            $munition = new Munition($this->db);
            $this->f3->set("munition", $munition->all());
            echo Template::instance()->render("stockage.html");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    public function accueil() {
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
    
    public function attribution()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){ 
            $arme = new Arme($this->db);
            $this->f3->set("arme", $arme->all());
            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());
            echo Template::instance()->render("attribution.html");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    public function delete() {
        $id = $this->f3->get("PARAMS.id");
        $attribution = new Attribution($this->db);
        $attribution->delete($id);
        
        $policier = new Policier($this->db);
        $policier->delete($id);
        $this->f3->reroute("/add_police");
    }
    

    public function maj_form() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password))
        {
            $policier = new Policier($this->db);
            $policier->getById($this->f3->get("PARAMS.id"));
            $this->f3->set("police", $policier);
            echo Template::instance()->render("mj_policier.html");
        }
        else 
            echo Template::instance()->render("404.html");
    }

    public function imprimer() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password))
        {
            $policier = new Policier($this->db);
            $policier->getById($this->f3->get("PARAMS.id"));
            $this->f3->set("police", $policier);
            echo Template::instance()->render("impression.html");
        }
        else 
            echo Template::instance()->render("404.html");
    }

    public function maj_attrib() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $policier->getById($this->f3->get("PARAMS.id"));
            $this->f3->set("police", $policier);  

            $munition = new Munition($this->db);
            $this->f3->set("munition", $munition->all());

            $arme = new Arme($this->db);
            $this->f3->set("arme", $arme->all());
            echo Template::instance()->render("mj_attrib.html");
        }else{
            echo Template::instance()->render("404.html");
        }
    }


    public function maj_attrib_proc() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $policier->edit($this->f3->get("PARAMS.id"));
            $this->f3->reroute("/attribution");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    public function policier_update_dbb() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $policier->edit($this->f3->get("PARAMS.id"));
            $this->f3->reroute("/add_police");
        }else{
            echo Template::instance()->render("404.html");
        }
    }

    public function attribution_dbb()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password)){
            //créer une instance de la classe Police
            $police = new Policier($this->db);
            // récupérer l'id_policier à partir des paramètres de la requête
            $id_policier = $this->f3->get("PARAMS.id_policier");
            
            //récupérer les paramètres POST
            $arme_id = $_POST['id_arme'];
            $type_munition  = $_POST['type_arme'];
            $nombre_attrib = $_POST['nombre_attrib'];
            $date_attrib = $_POST['date_attrib'];

            //récupérer l'objet Arme correspondant à partir de la base de données
            $arme = new Arme($this->db);
            $arme->load(array('id_arme=?', $arme_id));

            //récupérer l'objet Munition correspondant à partir de la base de données
            $munition = new Munition($this->db);
            $munition->load(array('type_munition=?', $arme_id));

            //vérifier que le nombre de munitions disponibles est suffisant pour l'attribution
            if ($munition->nombre_munition <= $nombre_attrib || $munition->dry()) {    
                echo "Il n'y a pas assez de munitions disponibles pour cette arme.";
            } else {

                //réduire le nombre de munitions disponibles
                $munition->nombre_munition -= $nombre_attrib;    
                $munition->save(); // enregistrement dans la base de données

                //enregistrer l'attribution dans la table Attribution
                $attribution = new Attribution($this->db);
                $attribution->id_policier = $id_policier;    
                $attribution->id_arme = $arme_id;
                $attribution->date_attribution = $date_attrib;      
                $attribution->nombre_munition = $nombre_attrib;
                $attribution->type_munition = $type_munition;
                $attribution->save();

                //mettre à jour les armes et le nombre de munitions du policier
                $police->load(array('id_policier=?', $id_policier));
                $police->armes = $type_munition;
                $police->nb_munition += $nombre_attrib;
                $police->save();
                
                $this->f3->reroute("/attribution");
            }

        }else{
            echo Template::instance()->render("404.html");
        }
        
    }

    public function rapport_admin() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        # Si l'utilisateur est connecter on lui affiche sont 
        # page sinon on lui dit de se connecter
        if(isset($login) && isset($password))
        {
            $policier = new Policier($this->db);
            $this->f3->set("police", $policier->all());

            $rapports = new Rapports($this->db);
            $this->f3->set("rapports", $rapports->all());
            echo Template::instance()->render("rapport_admin.html");
        }
        else 
            echo Template::instance()->render("404.html");
    }

    public function addRapport(){
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");

        if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $this->f3->set("police", $policier->all());

            $rapport = new Rapports($this->db);
            $this->f3->set("rapports", $rapport->all());

            $contenues = $this->f3->get("POST.contenues");
            if ($contenues == "" || $contenues == null) {
                echo Template::instance()->render("rapport_admin.html");
            }else{
                $contenues = strip_tags($contenues);
                $date_creation = date("Y-m-d H:i:s");
                $rapport->descriptions = $contenues;
                $rapport->date_creation = $date_creation;
                $rapport->Destinatair= $this->f3->get("SESSION.login");
                $rapport->save();
                echo Template::instance()->render("rapport_admin.html");
            }
        }else{
            echo Template::instance()->render("404.html");
        }
    }
 
}
