<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Attribution</title>
    <base href="<?= ($BASE. '/' . $UI) ?>">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href='css/styles.css' rel="stylesheet" />
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-OMH/HCDnRd1gQ8mKjH0vDkkAow0dxblQ2AHc9WV0BxRs0AzQiYcz3g8GGbyM+HwD" crossorigin="anonymous">


</head>

<body class="sb-nav-fixed">
    <?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> Displays </div>
                        <a class="nav-link" href="<?= ($BASE . '/user/s_commissariat') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            ACCEUIL
                        </a>
                        <div class="sb-sidenav-menu-heading">ACTION</div>
                        <a class="nav-link active" href="<?= ($BASE . '/attribution') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            ATTRIBUTION
                        </a>
                        <a class="nav-link" href="<?= ($BASE . '/affectation') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-air-freshener"></i></div>
                            AFFECTATION
                        </a>
                        <a class="nav-link"  href="<?= ($BASE . '/accueil/rapport') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-air-freshener"></i></div>
                            RAPPORT
                        </a>

                    </div>

                </div>
                <div class="sb-sidenav-footer">
                    Table
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            <main>
                <?php if (isset($error)): ?>
                    
                        <div class="alert alert-danger" role="alert">
                            <?= ($error)."
" ?>
                        </div>
                    
                <?php endif; ?>
                <div class="container-fluid px-4">
                    <h2 class="mt-4"><a href="<?= ($BASE . '/attribution') ?>"><i class="fa fa-arrow-left"
                                aria-hidden="true" style="color: black;"></i></a> ATTRIBUTION</h2>
                    <hr>
                    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
                    <div class="card">
                        <div class="card-body shadow">
                            <?php foreach (($arme?:[]) as $arm): ?>

                            <?php endforeach; ?>
                            <div class="modal-body">

                                <div class="form-group col-md-6">
                                    <label for="" class="form-inline">Nom Policier : </label>

                                    <Strong class="form-group"><?= ($police['nom']) ?></Strong>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-inline">Prenom : </label>
                                    <Strong class="form-group"><?= ($police['prenom']) ?></Strong>

                                </div>
                                <form action="/attribution/<?= ($police['id_policier']) ?>/<?= ($arm['id_arme']) ?>" method="POST">

                                    <div class="row">
                                        <p>Attribution d'arme et minution</p> <hr>

                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Type d'arme</strong></label>
                                            <select id="arme" name="type_arme" class="form-control">
                                                <?php foreach (($arme?:[]) as $armes): ?>
                                                    <option id="<?= ($armes['id_arme']) ?>" value="<?= ($armes['type_arme']) ?>">
                                                        <?= ($armes['type_arme']) ?></option>
                                                <?php endforeach; ?>
                                            </select><br>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for=""><strong>Nombre de minution en stock</strong></label>
                                            <input type="number" id="nombre_munition" name="nombre_munition"
                                                value="nombre_munition" class="form-control">
                                        </div><br>
                                        <!-- <div class="form-group col-md-6">
                                    <label for=""><strong>Date d'attribution</strong></label>
                                    <input type="date" name="date_attrib" value="" class="form-control">
                                </div><br> -->
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Date de début d'attribution</strong></label>
                                            <input type="date" name="date_debut_attrib" value="" class="form-control">
                                        </div><br>
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Date de fin d'attribution</strong></label>
                                            <input type="date" name="date_fin_attrib" value="" class="form-control">
                                        </div><br>
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Nombre de munition à attibuer</strong></label>
                                            <input type="number" name="nombre_attrib" value="" class="form-control"
                                                placeholder="Nombre de minution"><br>
                                        </div><br><br>
                                    </div>
                                    <input type="hidden" value="<?= ($armes['id_arme']) ?>" id="id_arme" name="id_arme">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- FIN EDIT POP -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src='js/scripts.js'></script>
    <script src='js/ajout_policier.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src='js/datatables-simple-demo.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-sPfW9HxI/5FhSSTV5K5ue5+7eQzsgLUKj1SkQCBc9dtFM7zi+ucfJ+w/w3SlArB1"
        crossorigin="anonymous"></script>
    <script>
        select_arme = document.getElementById("arme");
        select_arme.addEventListener("change", function () {
            input_nombre_munition = document.getElementById("nombre_munition");
            num_arme = document.getElementById("id_arme");
            <?php foreach (($munition?:[]) as $mun): ?>

                if(this.options[this.selectedIndex].id == <?= ($mun['type_munition']) ?>) {
                    input_nombre_munition.value = <?= ($mun['nombre_munition']) ?>;
                num_arme.value = <?= ($mun['type_munition']) ?>;
                    }
            <?php endforeach; ?>
        }, false);

    </script>
</body>

</html>