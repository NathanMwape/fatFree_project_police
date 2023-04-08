<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Table</title>
        <base href="<?= ($BASE. '/' . $UI) ?>"> 
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href='css/styles.css' rel="stylesheet" />
        <link rel="stylesheet" href="css/style2.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-OMH/HCDnRd1gQ8mKjH0vDkkAow0dxblQ2AHc9WV0BxRs0AzQiYcz3g8GGbyM+HwD" crossorigin="anonymous">


    </head>
    <body class="sb-nav-fixed">
        <?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> Displays </div>
                            <a class="nav-link" href="<?= ($BASE . '/accueil_now/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ACCEUIL
                            </a>
                            <div class="sb-sidenav-menu-heading">ACTION</div>
                            <a class="nav-link active" href="<?= ($BASE . '/add_police') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                POLICE
                            </a>
                            <a class="nav-link" href="<?= ($BASE . '/stockage') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                                STOCKAGE
                            </a>
                            <a class="nav-link" href="<?= ($BASE . '/attribution') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ATTRIBUTION
                            </a>
                            <a class="nav-link" href="<?= ($BASE . '/rapport/admin') ?>">
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">INFO POLICIER</h1>
                        <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
                                    <div class="modal-body">
                                        <form action="/police/police_maj_dbb/<?= ($police['id_policier']) ?>" method="POST">

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    
                                                    <input type="text" name="nom" value="<?= ($police['nom']) ?>" class="form-control">
                                                    <strong ></strong>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="post_nom" value="<?= ($police['post_nom']) ?>" class="form-control" >
                                                </div><br><br>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="prenom" value="<?= ($police['prenom']) ?>" class="form-control" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select name="sexe" value="<?= ($police['sexe']) ?>" class="form-control">
                                                        <option value="" selected disabled>sexe</option>
                                                        <option value="M">M</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" name="age" value="<?= ($police['age']) ?>" class="form-control" >
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="date" name="date_naissance" value="<?= ($police['date_naissance']) ?>"  class="form-control">
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="pays_origine" value="<?= ($police['lieu_naissance']) ?>" class="form-control" placeholder="Votre pays">
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="lieu_naissance" value="<?= ($police['lieu_naissance']) ?>" class="form-control" placeholder="lieu de naissance">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="adresse" value="<?= ($police['adresse']) ?>" class="form-control" placeholder="Adresse">
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="matricule" value="<?= ($police['matricule']) ?>" class="form-control" placeholder="Matricule">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select name="etat_civil" value="<?= ($police['etat_civil']) ?>" class="form-control">
                                                        <option value="" selected disabled>Etat civil</option>
                                                        <option value="celibataire">celibataire</option>
                                                        <option value="Marie">Marie</option>
                                                        <option value="Divorcé">Divorcé</option>
                                                    </select>
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="num_dossier" value="<?= ($police['num_dossier']) ?>" class="form-control" placeholder="numero de dossier">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="num_region" value="<?= ($police['num_region']) ?>" class="form-control" placeholder="numero de region">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="unite_appartenance" value="<?= ($police['unite_appartenance']) ?>" class="form-control" placeholder="unite d'appartenace">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="observation" value="<?= ($police['observation']) ?>" cols="" rows="3" placeholder="votre observation">
                                                </div><br><br>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" onclick="imprimer()"  class="btn btn-warning">imprimer</button>
                                            </div>
                                        </form>
                            </div>
                            <!-- FIN EDIT POP -->
                            <!--  FIN DU POP DETAILS-->
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            function imprimer(){
                window.print();
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src='js/scripts.js'></script>
        <script src='js/ajout_policier.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src='js/datatables-simple-demo.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-sPfW9HxI/5FhSSTV5K5ue5+7eQzsgLUKj1SkQCBc9dtFM7zi+ucfJ+w/w3SlArB1" crossorigin="anonymous"></script>

    </body>
</html>
