<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <base href="<?= ($BASE. '/' . $UI) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Stockage</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">DISPLAYS</div>
                        <a class="nav-link" href="<?= ($BASE . '/accueil_now/') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            ACCEUIL
                        </a>
                        <div class="sb-sidenav-menu-heading">ACTION</div>
                        <a class="nav-link" href="<?= ($BASE . '/policier/inspecteur') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            POLICIER
                        </a>
                        <a class="nav-link active" href="<?= ($BASE . '/stockage') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                            STOCKAGE
                        </a>
                        <a class="nav-link" href="<?= ($BASE . '/rapport/admin') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-air-freshener"></i></div>
                            RAPPORT
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    Start
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">STOCKAGES</h1>
                    <ol class="breadcrumb mb-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= ($BASE . '/accueil_now/') ?>">Acceuil</a></li>
                            <li class="breadcrumb-item active">Stokage</li>
                        </ol>
                    </ol>
                    
                    <div class="d-flex justify-content-between" style="margin: 15px;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Ajouter Arme</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                            data-bs-whatever="@fat">Ajouter Munition</button>
                    </div>
                    <!-- Modal Arme -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Arme</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/arme_add" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nom de l'arme</label>
                                            <input type="text" name="type_arme" class="form-control" id="recipient-name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Nombres</label>
                                            <input type="number" name="nombre_arme" class="form-control"
                                                id="recipient-name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Image</label>
                                            <input type="file" name="images" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Enregistre</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Arme-->

                    <!-- Modal Munition -->

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" style="padding-left: 50px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Munition</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/munition_add" method="POST">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Type de munition</label>
                                            <select id="arme" name="type_arme" class="form-control">
                                                <?php foreach (($arme?:[]) as $armes): ?>

                                                    <option id="<?= ($armes['id_arme']) ?>" value="<?= ($armes['type_arme']) ?>">
                                                        <?= ($armes['type_arme']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="id_arme" value="<?= ($armes['id_arme']) ?>" name="type_munition">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Nombre</label>
                                            <input type="text" name="nombre_munition" class="form-control"
                                                id="recipient-name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Enregistre</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Munition -->



                    <!--  BODY OF Storage Weapon and  munition-->
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow rounded">
                                    <div class="card-header">
                                        Armes
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary" id="btn-armes">Afficher les armes</button>
                                        <div class="mt-3" id="liste-armes"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow rounded">
                                    <div class="card-header">
                                        Munitions
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary" id="btn-munitions">Afficher les
                                            munitions</button>
                                        <div class="mt-3" id="liste-munitions"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BODY -->

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script>
        select_arme = document.getElementById("arme");
        select_arme.addEventListener("change", function () {
            id_arme = document.getElementById("id_arme");
            <?php foreach (($munition?:[]) as $mun): ?>
                <?php if (empty($mun['type_munition'])): ?>
                    
                        if(this.options[this.selectedIndex].id == <?= ($mun['type_munition']) ?>) {
                            id_arme.value = <?= ($mun['type_munition']) ?>;
                            }
                    
                    <?php else: ?>
                        <?php foreach (($arme?:[]) as $as): ?>
                            if(this.options[this.selectedIndex].id == <?= ($as['id_arme']) ?>) {
                                id_arme.value = <?= ($as['id_arme']) ?>;
                                }
                        <?php endforeach; ?>
                    
                <?php endif; ?>
            <?php endforeach; ?>
        }, false);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src='js/ajout_policier.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        // Définition des armes et des munitions

        var armes = [];
      
            <?php foreach (($arme?:[]) as $a): ?>
                armes.push({nom: " -> <?= ($a['type_arme']) ?>", image: "<?= ("../../"  . $a['images']) ?>", nombre: <?= ($a['nombre_arme']) ?>})
            <?php endforeach; ?>
  


        var munitions = [];

        <?php foreach (($munition?:[]) as $m): ?>
            <?php foreach (($arme?:[]) as $aa): ?>
                <?php if ($m['type_munition'] == $aa['id_arme']): ?>
                    
                        munitions.push({nom: "<?= ($m['nombre_munition']) ?>",nombre: "<?= ($aa['type_arme']) ?> -> "})
                    
                <?php endif; ?>
            <?php endforeach; ?>

        <?php endforeach; ?>

        // Affichage des armes
        const btnArmes = document.getElementById("btn-armes");
        const listeArmes = document.getElementById("liste-armes");
        let listeVisible = true; // Pour suivre l'état de la liste

        btnArmes.addEventListener("click", () => {
            if (listeVisible) {
                listeArmes.innerHTML = ""; // Nettoie la liste
                listeVisible = false; // Cache la liste
            } else {
                // Affiche à nouveau la liste
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
                listeVisible = true; // Montre la liste
            }
        });

        // cache les armes

        // Affichage des munitions
        const btnMunitions = document.getElementById("btn-munitions");
        const listeMunitions = document.getElementById("liste-munitions");
        let listeMvisible = true;

        btnMunitions.addEventListener("click", () => {
            if (listeMvisible) {
                listeMunitions.innerHTML = ""; // Nettoie la liste
                listeMvisible = false; // Cache la liste
            } else {
                // Affiche à nouveau la liste
                munitions.forEach((munition) => {
                    const divMunition = document.createElement("div");

                    divMunition.classList.add("mb-3");

                    const spanMunition = document.createElement("span");
                    spanMunition.textContent = `${munition.nombre} ${munition.nom}`;

                    divMunition.appendChild(spanMunition);

                    listeMunitions.appendChild(divMunition);
                });
                listeMvisible = true; // Montre la liste
            }
        });	

    </script>
</body>

</html>