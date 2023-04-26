<!-- les details pour un policier -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Police</title>
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
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= ($BASE . '/accueil/') ?>">Acceuil</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ajouter Policier
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Policier</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/police/police_add" method="POST" onsubmit="return check();">

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="post_nom" id="postnom" class="form-control" placeholder="Post-nom">
                                                </div><br><br>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select name="sexe"  class="form-control">
                                                        <option value="" selected disabled>sexe</option>
                                                        <option value="M">M</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" id="age" name="age" class="form-control" placeholder="Age">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="pays_origine" class="form-control" placeholder="Pays d'origine">
                                                </div><br><br>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="lieu_naissance" class="form-control" placeholder="Lieu de naissance">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="date" name="date_naissance" class="form-control">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="adresse" class="form-control" placeholder="Adresse">
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="matricule" class="form-control" placeholder="Matricule">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select name="etat_civil" id="" class="form-control">
                                                        <option value="" selected disabled>Etat civil</option>
                                                        <option value="celibataire">celibataire</option>
                                                        <option value="Marie">Marie</option>
                                                        <option value="Divorce">Divorce</option>
                                                    </select>
                                                </div><br><br>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="num_dossier" class="form-control" placeholder="Numero Dossier">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="num_region" class="form-control" placeholder="Numero Region">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="unite_appartenance" class="form-control" placeholder="Unite d'appartenance">
                                                </div><br><br>
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="observation" id="" cols="" rows="3" placeholder="Observations"></textarea>
                                                </div><br><br>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                                                <button type="submit"  class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                        </div>

                            <!-- DEBUT DU POP DETAILS -->

                            <div class="modal fade" id="detailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">DETAIL DU POLICIER</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="font-family: sans-serif; font-size: 13px;" class="row">
                                            <div class="col-md-6">
                                                <p>Nom : <strong id="detNom"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Post-nom : <strong id="detPostnom"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Prenom : <strong id="detPrenom"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Sexe : <strong id="detSexe"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>date_naissance : <strong id="detDateNaissance"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Age : <strong id="detAge"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>pays_origine : <strong id="detPaysOrigine"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>lieu_naissance : <strong id="detLieuNaissance"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>adresse : <strong id="detAdresse"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>matricule : <strong id="detMatricule"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Etat_civile : <strong id="detEtatCivil"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>num_dossier : <strong id="detNum_dossier"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>num_region : <strong id="detNum_region"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>unite_appartenace : <strong id="detUnite_app"></strong></p> 
                                            </div>
                                            <div class="col-md-12x">
                                                <p>observation : <strong id="detOberservation"></strong></p> 
                                            </div><br><br>
                                            <hr>
                                            <div class="col-md-6">
                                                <p>Arme : <strong id="detArme"></strong></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <p>Nombre munition : <strong id="detNb_munition"></strong></p> 
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--  FIN DU POP DETAILS-->

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table Policier
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Post-nom</th>
                                            <th>Prenom</th>
                                            <th>Sexe</th>
                                            <th>date naissance</th>
                                            <th>age</th>
                                            <th>Pays_origine</th>
                                            <th>lieu_naissance</th>
                                            <th>adresse</th>
                                            <th>matricule</th>
                                            <th>etat_civil</th>
                                            <th>num_dossier</th>
                                            <th>num_region</th>
                                            <th>unite_appartenance</th>
                                            <th>observation</th>
                                            <th>arme</th>
                                            <th>nb_munition</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (($policier?:[]) as $police): ?> 
                                        <tr>
                                            <td><?= ($police['nom']) ?></td>
                                            <td><?= ($police['post_nom']) ?></td>
                                            <td><?= ($police['prenom']) ?></td>
                                            <td><?= ($police['sexe']) ?></td>
                                            <td><?= ($police['date_naissance']) ?></td>
                                            <td><?= ($police['age']) ?></td>
                                            <td><?= ($police['pays_origine']) ?></td>
                                            <td><?= ($police['lieu_naissance']) ?></td>
                                            <td><?= ($police['adresse']) ?></td>
                                            <td><?= ($police['matricule']) ?></td>
                                            <td><?= ($police['etat_civil']) ?></td>
                                            <td><?= ($police['num_dossier']) ?></td>
                                            <td><?= ($police['num_region']) ?></td>
                                            <td><?= ($police['unite_appartenance']) ?></td>
                                            <td><?= ($police['observation']) ?></td>
                                            <td><?= ($police['armes']) ?></td>
                                            <td><?= ($police['nb_munition']) ?></td>
                                            
                                            <td>
                                                <a href="<?= ($BASE . '/police/maj/' . $police['id_policier']) ?>"><input name="" id="" class="btn btn-primary" type="button" value="Modifier"></a>
                                                <a href="<?= ($BASE . '/police/supprimer/' . $police['id_policier']) ?>"><input name="" id="" class="btn btn-danger deletebtn" type="button" value="Supprimer"></a>
                                                <input name="" id="detail" class="detail btn btn-success viewbtn" type="button" value="Detail">
                                                <a href="<?= ($BASE . '/police/imprimer/' . $police['id_policier']) ?>"><input name="" id="" class="btn btn-warning" type="button" value="Imprimer"></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

        

<!-- SCRIPT Pour affichier la boite de dialogue de la mise à jour -->
        <script>

            $(document).ready(function () {
                $('.editbtn').on('click', function () {
                    $('#editmodal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#EdNom').val(data[0]);
                    $('#EdPostnom').val(data[1]);
                    $('#EdPrenom').val(data[2]);
                    $('#EdSexe').val(data[3]);
                    $('#EdDate_naiss').val(data[4]);
                    $('#EdAge').val(data[5]);
                    $('#EdPays_origine').val(data[6]);
                    $('#EdLieu_naiss').val(data[7]);
                    $('#EdAdresse').val(data[8]);
                    $('#EdMatricule').val(data[9]);
                    $('#EdEtat_civil').val(data[10]);
                    $('#EdNum_Dossier').val(data[11]);
                    $('#EdNum_region').val(data[12]);
                    $('#EdUnite_appart').val(data[13]);
                    $('#EdObservation').val(data[14]);


                    });
                });
        </script>


<!-- Affichage de la boite de dialogue de Details -->
        <script>
            $(document).ready(function () {
                $('.viewbtn').on('click', function () {
                    $('#detailmodal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);
                    document.getElementById("detNom").textContent = data[0];
                    document.getElementById("detPostnom").textContent = data[1];
                    document.getElementById("detPrenom").textContent = data[2];
                    document.getElementById("detSexe").textContent = data[3];
                    document.getElementById("detAge").textContent = data[5];
                    document.getElementById("detDateNaissance").textContent = data[4];
                    document.getElementById("detPaysOrigine").textContent = data[6];
                    document.getElementById("detLieuNaissance").textContent = data[7];
                    document.getElementById("detAdresse").textContent = data[8];
                    document.getElementById("detMatricule").textContent = data[9];
                    document.getElementById("detEtatCivil").textContent = data[10];
                    document.getElementById("detNum_dossier").textContent = data[11];
                    document.getElementById("detNum_region").textContent = data[12];
                    document.getElementById("detUnite_app").textContent = data[13];
                    document.getElementById("detOberservation").textContent = data[14];
                    document.getElementById("detArme").textContent = data[15];
                    document.getElementById("detNb_munition").textContent = data[16];
                    });
                });
        </script>

    </body>
</html>