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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-OMH/HCDnRd1gQ8mKjH0vDkkAow0dxblQ2AHc9WV0BxRs0AzQiYcz3g8GGbyM+HwD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tableData.css">
</head>

<style>
        /* Add custom styles here */
        body {
            background-color: #f8f9fa;
        }
        .card-header {
            background-color: #343a40;
            color: white;
        }
        table {
            background-color: white;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        .modal-content {
            background-color: #f8f9fa;
        }
        /* ... (other custom styles) ... */
    </style>

<body class="sb-nav-fixed">
    <?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">D</div>
                        <a class="nav-link " href="<?= ($BASE . '/user/s_commissariat') ?>">
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
                        <a class="nav-link" href="<?= ($BASE . '/accueil/rapport') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
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
                    <h2 class="mt-4">ATTRIBUTION</h2>
                    <ol class="breadcrumb mb-4">
                    </ol>
                    <!-- LIST OF POLICE WAS ATTRIBUATE -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Liste de Policiers
                        </div>
                        <div class="card-body shadow">
                            <div class="search-bar">
                                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher...">
                            </div>

                            <div class="menu-bar">
                                <label for="itemsPerPage">Valeurs par page:</label>
                                <select id="itemsPerPage" onchange="changeItemsPerPage()">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Post Nom</th>
                                        <th>Prenom</th>
                                        <th>Validation</th>
                                        <th>Attribution</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- en utilisant la boucle repeat de fatfree -->
                                    <?php if ($SESSION['login'] != 'inspection'): ?>
                                        
                                            <?php foreach (($policier?:[]) as $p): ?>
                                                <tr>
                                                    <td><?= ($p['nom']) ?></td>
                                                    <td><?= ($p['post_nom']) ?></td>
                                                    <td><?= ($p['prenom']) ?></td>
                                                    <td>
                                                        <?php if ($p['armes']!='' and $p['nb_munition'] !=0): ?>
                                                            <!--- lorsque l'arme ou munition sont attribuées, on affiche une icône ronde de "très bien" avec une couleur verte en bootstrap, sinon on affiche une icône en point d'interrogation avec une couleur rouge-->
                                                            
                                                                <i class="fa fa-check-circle fa-2x" aria-hidden="true"
                                                                    style="color: green;"></i>
                                                            
                                                            <?php else: ?>
                                                                <i class="fa fa-question-circle fa-2x"
                                                                    aria-hidden="true"
                                                                    style="color: rgb(240, 59, 59);"></i>
                                                            
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= ($BASE . '/attrib/maj/' . $p['id_policier']) ?>">
                                                            <input name="" id="" class="btn btn-primary" type="button"
                                                                value="Attribution">
                                                        </a>
                                                        <a href="<?= ($BASE . '/desattribuer/' . $p['id_policier']) ?>">
                                                            <input name="" id="" class="btn btn-danger" type="button"
                                                                value="Désaffecter">
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        
                                        <?php else: ?>
                                            <?php foreach (($policierT?:[]) as $p): ?>
                                                <tr>
                                                    <td><?= ($p['nom']) ?></td>
                                                    <td><?= ($p['post_nom']) ?></td>
                                                    <td><?= ($p['prenom']) ?></td>
                                                    <td></td>
                                                    <td>
                                                        <?php if ($p['armes']!='' and $p['nb_munition'] !=0): ?>
                                                            <!--- lorsque l'arme ou munition sont attribuées, on affiche une icône ronde de "très bien" avec une couleur verte en bootstrap, sinon on affiche une icône en point d'interrogation avec une couleur rouge-->
                                                            
                                                                <i class="fa fa-check-circle fa-2x" aria-hidden="true"
                                                                    style="color: green;"></i>
                                                            
                                                            <?php else: ?>
                                                                <i class="fa fa-question-circle fa-2x"
                                                                    aria-hidden="true"
                                                                    style="color: rgb(240, 59, 59);"></i>
                                                            
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= ($BASE . '/attrib/maj/' . $p['id_policier']) ?>">
                                                            <input name="" id="" class="btn btn-primary" type="button"
                                                                value="Attribution">
                                                        </a>
                                                        <a href="<?= ($BASE . '/desattribuer/' . $p['id_policier']) ?>">
                                                            <input name="" id="" class="btn btn-danger" type="button"
                                                                value="Désaffecter">
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        
                                    <?php endif; ?>

                                </tbody>
                            </table>

                            <div class="pagination">
                                <a class="active">1</a>
                                <a>2</a>
                                <a>3</a>
                                <!-- Ajoutez plus de liens de pagination ici -->
                            </div>
                        </div>




                    </div>
                </div>
        </div>
        </main>



        <!-- END MAIN -->
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
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByTagName("table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "dom": '<"table-title"f><"table-responsive"t><"table-footer"p>',
                "lengthMenu": [10, 25, 50, 75, 100],
                "pageLength": 10 // Définit le nombre d'entrées par page par défaut
            });
        });
    </script>
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