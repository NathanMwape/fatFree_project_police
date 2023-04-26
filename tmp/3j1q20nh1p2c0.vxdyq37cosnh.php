<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?= ($BASE. '/' . $UI) ?>"> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Attribution</title>
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
                            <div class="sb-sidenav-menu-heading">DISPLAYS</div>
                            <a class="nav-link " href="<?= ($BASE . '/accueil_now/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ACCEUIL
                            </a>
                            <div class="sb-sidenav-menu-heading">ACTION</div>
                            <a class="nav-link" href="<?= ($BASE . '/add_police') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                POLICE
                            </a>
                            <a class="nav-link" href="<?= ($BASE . '/stockage') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                                STOCKAGE
                            </a>
                            <a class="nav-link active" href="<?= ($BASE . '/attribution') ?>">
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
                        Start
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <!-- START the Body of a page -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ATTRIBUTION</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>

                        <!-- DEBUT DU POP Attribution-->

                        <div class="modal fade" id="AttribD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTRIBUTION</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="font-family: sans-serif; font-size: 13px;" class="row">
                                            <!-- information sur l'attribution dans un formulaire -->

                                            <form action="" method="get" class="form-group">
                                                <!-- nom de l'arme attribuer recuperer dan la base de donnees-->
                                                nom de l'arme : <input type="text" name="nom" id="nom" class="form-control" required>
                                                date d'attribution : <input type="date" name="date" id="date" class="form-control" required>
                                                <br>
                                                <!-- quantote d'arme en  stocke -->
                                                quantite d'arme en stocke : <input type="number" name="qte" id="qte" class="form-control" required>
                                                <br>
                                                <!-- quantite d'arme a attribuer -->
                                                quantite d'arme a attribuer : <input type="number" name="qteA" id="qteA" class="form-control" required>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-primary" >Valider</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--  FIN DU POP ATTRIBUTIOND-->

                                <!-- LIST OF POLICE WAS ATTRIBUATE -->
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste de Policiers 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Post Nom</th>
                                            <th>Prenom</th>
                                            <th>Validation</th>
                                            <th>Attribution</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Post Nom</th>
                                            <th>Prenom</th>
                                            <th>Validation</th>
                                            <th>Attribution</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <!-- en utilisant la boucle repeat de fatfree -->
                                    <?php foreach (($policier?:[]) as $p): ?>
                                        <tr>
                                            <td><?= ($p['nom']) ?></td>
                                            <td><?= ($p['post_nom']) ?></td>
                                            <td><?= ($p['prenom']) ?></td>
                                            <?php if ($p['armes'] !='' and $p['nb_munition']): ?>
                                                
                                                    <td><i class="fas fa-check-circle text-success fa-2x" aria-hidden="true"></i></td>
                                                
                                                <?php else: ?>
                                                    <td><i class="fas fa-cancel-circle text-danger fa-2x" aria-hidden="true"></i></td>
                                                
                                            <?php endif; ?>
                                            
                                            <td>
                                                <a href="<?= ($BASE . '/attrib/maj/' . $p['id_policier']) ?>"><input name="" id="" class="btn btn-primary" type="button" value="Attribution"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- END MAIN -->
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
            $(document).ready(function() {
            $('#myTable').DataTable( {
                "dom": '<"table-title"f><"table-responsive"t><"table-footer"p>',
                "lengthMenu": [ 10, 25, 50, 75, 100 ],
                "pageLength": 10 // Définit le nombre d'entrées par page par défaut
            } );
            } );
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

        <!-- Display the dialog box for attributions -->
        <script>
            $(document).ready(function () {

                $('.btnAttrib').on('click', function () {

                    $('#AttribD').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#fname').val(data[1]);
                    $('#lname').val(data[2]);
                    $('#course').val(data[3]);
                    $('#contact').val(data[4]);
                    });
                });
        </script>
    </body>
</html>
