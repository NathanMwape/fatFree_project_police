<?php

class AdminController extends BaseController {

    public function authenticate() {

        $password = $this->f3->get("POST.password");
        $login = $this->f3->get("POST.login");
        if(isset($password) && isset($login))
        {
            // Parcours tous les enregistrement dans la table admins
            $admin_m = new Admin($this->db); //Mapper
            $admin_m->login = "SELECT nom_commissariat FROM users WHERE users.id_user=admin.id_user";
            $admin_m ->password = "SELECT passwords FROM users WHERE users.id_user=admin.id_user";
            $admin_m->all();

            $user = new User($this->db);
            $user->all();

            while(! $admin_m->dry() && ! $user->dry())
            {
                if(strcmp($login, $admin_m->login) == 0 && strcmp($password, $admin_m->password) == 0)
                {
                    new Session();
                    $this->f3->set("SESSION.login", $login);
                    $this->f3->set("SESSION.password", $password);
                    $this->f3->reroute("/admin/accueil");
                    return;
                }elseif (strcmp($login, $user->nom_commissariat) == 0 && strcmp($password, $user->passwords) == 0) {

                    if($user->role != "admin")
                    {
                        $policier= new Policier($this->db);
                        $policier->getPoliceByCommissariat($login);
                        new Session();
                        $this->f3->set("SESSION.login", $login);
                        $this->f3->set("SESSION.password", $password);
                        $this->f3->set("SESSION.nom_commissariat", $user->nom_commissariat);

                        $this->f3->set("policiersDuCommissariat", $user->nom_commissariat);  
                        $this->f3->reroute("/users/accueil");
                        return;
                    }else{
                        $this->f3->reroute("/admin/accueil");
                    }
                }
                $user->next();   
            }
            
        }
        // on affiche le message d'erreur sur la page de login
        $this->f3->set("error", "mot de passe ou login est incorrect");
        echo Template::instance()->render("login.html");
    }

    public function login(){
        $error =" mot de passe ou login est incorrect";
        $this->f3->set("error",$error);
        echo Template::instance()->render("login.html");
    }

        public function deconnexion() {
            session_start();
            session_unset();
            session_destroy();
            header("Cache-Control: no-cache, no-store, must-revalidate");

            // Redirection vers la page de connexion
            $this->f3->reroute("/login");
        }

    // Page d'accueil de l'administrateur
    public function accueil() {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password)){
            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());
            // $this->f3->set("unite_appart", $policier->police_unite_appartenance());
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

    //page d'ajout du policierr

    public function pageAjout()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password))
        {
            /* Je peu soit utiliser trois variable pour les administrateurs,
               tous les utilisateurs*/
            $users = new User($this->db);
            $this->f3->set("users", $users->all());
            echo Template::instance()->render("add_police.html");
        }
        else 
            echo Template::instance()->render("404.html");
    }


    // Suppression d'un utilisateur du systeme
    public function delete() {
        $id = $this->f3->get("PARAMS.id");
        if(isset($id))
        {
            $user = new User($this->db);
            $user->getById($id);
            switch($user->role) {
                case 'Admin' :
                    $sub_user = new Admin($this->db);
                    break;
                // case 'Policier' :
                //     $sub_user = new Policier($this->db);
                //     break;
            }
            if(isset($sub_user)) {
                $sub_user->deleteByUserId($id);
                $user->delete();
            }
            $this->f3->reroute("admin/accueil");
        }
    }

    

    public function getSubUserType(string $role) {
        switch($role) {
            case "Policier" :
                return new Policier($this->db);
            case "Administrateur" :
                return new Admin($this->db);
        }
    }

    public function s_commissariat()
    {
        new Session();
        $login = $this->f3->get("SESSION.login");
        $password = $this->f3->get("SESSION.password");
        if(isset($login) && isset($password))
        {
            
            $policier = new Policier($this->db);
            $this->f3->set("policier", $policier->all());


            $countp = $policier->countPolicier();
            $this->f3->set('countPolicier', $countp);

            // affichage de nombre de policier dans la base de donne et ainsi que le  nombre de ceux qui ont déjà des arme où pas
            $countAtt = $policier->countPolicierAtt();
            $this->f3->set("countAttrib",$countAtt);
            $countNattr = $policier->countPolicierNoAttr();
            $this->f3->set("countNotAttr",$countNattr);

            $policier->getPoliceByCommissariat($login);
            $this->f3->set("policiersDuCommissariat", $policier->getPoliceByCommissariat($login));

            echo Template::instance()->render("s_commissariat.html");
        }
        else 
            echo Template::instance()->render("404.html");
    }

}
 