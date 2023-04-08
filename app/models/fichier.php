<?php
  // Dans votre fichier controller, par exemple UserController.php

  class Fichier extends DB\SQL\Mapper {
    
  $policier_id = $_POST['policier_id'];
  $arme_id = $_POST['arme_id'];
  $munition_quantite = $_POST['munition_quantite'];

  //vérification que le policier et l'arme existent dans la base de données
  $policier = $db->exec("SELECT * FROM policier WHERE id = ?", $policier_id);
  $arme = $db->exec("SELECT * FROM arme WHERE id = ?", $arme_id);
  if(!$policier || !$arme){
      echo "Le policier ou l'arme n'existent pas";
      exit;
  }

  //vérification que la quantité de munitions est disponible pour cette arme
  $munition_disponible = $db->exec("SELECT quantite FROM munition WHERE arme_id = ?", $arme_id);
  if($munition_disponible < $munition_quantite){
      echo "La quantité de munitions demandée n'est pas disponible";
      exit;
  }

  //mise à jour de la table d'attribution
  $db->exec("INSERT INTO attribution (policier_id, arme_id, munition_quantite) VALUES (?, ?, ?)", $policier_id, $arme_id, $munition_quantite);

  //mise à jour de la table de munitions
  $munition_restante = $munition_disponible - $munition_quantite;
  $db->exec("UPDATE munition SET quantite = ? WHERE arme_id = ?", $munition_restante, $arme_id);

  //affichage d'un message de confirmation
  echo "L'arme et les munitions ont été attribuées au policier avec succès";
}




public function attribution_dbb()
    {
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
        $munition->load(array('nombre_munition>=?',$nombre_attrib));

        //vérifier que le nombre de munitions disponibles est suffisant pour l'attribution
        if ($munition->dry()) {    
        echo "Il n'y a pas assez de munitions disponibles pour cette arme.";
        } else {    
            //réduire le nombre de munitions disponibles
            $munition->nombre_munition -= strstr($nombre_attrib, ' ', true);    
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
            $police->nb_munition = $nombre_attrib;
            $police->save();
            $this->f3->reroute("/attribution");
        }
        
        }
        



<script>
            // Définition des armes et des munitions
            const armes = [
            
            { nom: " : Fusil d'assaut", image: "image/Fusil de chasse.jpeg", nombre: 5 },
            { nom: " : Pistolet-mitrailleur", image: "image/mitraillette.jpg", nombre: 3 },
            { nom: " : Fusil à pompe", image: "image/Fusil.png", nombre: 2 },
            { nom: " : AK47", image: "image/AK47.jpg", nombre: 7 },
            ];

            // const armes = [
            // <?php foreach($armes as $arme): ?>
            //     { nom: "<?php echo $arme['nom']; ?>", image: "<?php echo $arme['image']; ?>", nombre: <?php echo $arme['nombre']; ?> },
            // <?php endforeach; ?>
            // ];
            const munitions = [
            { nom: " : Balles de fusil", image: "image/Balles de pistolet-mitrailleur.jpg", nombre: 100 },
            { nom: " : Cartouches de fusil à pompe", image: "image/cartouches-pour-fusils-a-pompe-3-burst-asg-p-image-153917-grande.png", nombre: 50 },
            { nom: " : Balles de pistolet-mitrailleur", image: "image/balfisul.jpg", nombre: 200 },
            ];

            // Affichage des armes
            const btnArmes = document.getElementById("btn-armes");
            const listeArmes = document.getElementById("liste-armes");
            btnArmes.addEventListener("click", () => {
            listeArmes.innerHTML = "";
            armes.forEach((arme) => {
                const divArme = document.createElement("div");

                    divArme.classList.add("mb-3");

            const imgArme = document.createElement("img");
            imgArme.src = arme.image;
            imgArme.alt = arme.nom;
            imgArme.classList.add("me-3");
            imgArme.style.width = "50%";
            imgArme.style.height = "100%";

            const spanArme = document.createElement("span");
            spanArme.textContent = `${arme.nombre} ${arme.nom}`;

            divArme.appendChild(imgArme);
            divArme.appendChild(spanArme);

            listeArmes.appendChild(divArme);
        });
        });

        // Affichage des munitions
        const btnMunitions = document.getElementById("btn-munitions");
        const listeMunitions = document.getElementById("liste-munitions");
        btnMunitions.addEventListener("click", () => {
        listeMunitions.innerHTML = "";
        munitions.forEach((munition) => {
            const divMunition = document.createElement("div");
            divMunition.classList.add("mb-3");

            const imgMunition = document.createElement("img");
            imgMunition.src = munition.image;
            imgMunition.alt = munition.nom;
            imgMunition.classList.add("me-3");
            imgMunition.style.width = "50%";
            imgMunition.style.height = "100%";

            const spanMunition = document.createElement("span");
            spanMunition.textContent = `${munition.nombre} ${munition.nom}`;

            divMunition.appendChild(imgMunition);
            divMunition.appendChild(spanMunition);

            listeMunitions.appendChild(divMunition);
        });
        });

        </script>



+-------------+      Asynchrone     +-------------+
|   Client 1  |<--------------------|   Serveur   |
+-------------+                     +-------------+
       |                                     |
       | Synchrone                          |
       |                                     |
+-------------+                     +-------------+
|   Client 2  |<--------------------|   Serveur   |
+-------------+      Asynchrone     +-------------+



+------------------+   Asynchrone, chiffré   +--------------------+  Asynchrone, clair       +-----------------------+
|   Fournisseur    |------------------------>|    Serveur Paiement |------------------------>|     Système Financier  |
+------------------+                          +--------------------+                         +-----------------------+
       |                                                                                                       |
       |                                                                                                       |
       |                                                                                                       |
+------------------+     Synchrone, chiffré     +------------------+   Asynchrone, chiffré   +--------------------+
|   Client (Web)   |<--------------------------|  Serveur Web (SSL)|------------------------>|    Serveur Paiement |
+------------------+                            +------------------+                          +--------------------+



+------------------+                          +--------------------+                       +-----------------------+
|    Navigateur     |------------------------>|   Serveur Web      |<----------------------|        Base de données |
+------------------+                          +--------------------+                       +-----------------------+
                       Asynchrone, clair                                                 Asynchrone, clair
