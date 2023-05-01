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
        <script src="package/js/tinymce/tinymce.min.js"></script>
        <script> tinymce.init({ selector:'#pclu-textarea', branding: false});</script>


    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">COMMISSARIAT</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <p style="color: rgb(0, 136, 255);
                    margin-top: 10px;
                    font-weight: bold;
                    text-transform: uppercase;
                    "><?= ($SESSION['login']) ?></p>
                    
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="<?= ($BASE . '/admin/deconnection') ?>">
                               <i class="fa fa-power-off btn-danger fa-2x" style="background-color: red" aria-hidden="true"></i>
                               <span style="font-weight: bold;" >Deconnection</span>
                        </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> Displays </div>
                            <a class="nav-link " href="<?= ($BASE . '/user/s_commissariat') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ACCEUIL
                            </a>
                            <a class="nav-link active" href="<?= ($BASE . '/accueil/rapport') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
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
                        <h1 class="mt-4" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">RAPPORT</h1>
                        <div class="card mb-4">
                            

                        <div>
                            <button class="btn btn-success" aria-current="page" id="rapport-link">Rapport</button>
                            <button class="btn btn-primary" href="#" id="visualisation-link">Visualisation</button>
                        </div>
                        <div id="rapport-form" >
                            <div class="card-body">
                                <form action="/rapport/rapportDbS" method="POST" style="width: 90%; margin: 20PX;">
                                    <textarea name="contenues" id="pclu-textarea" cols="30" rows="12"></textarea>
                                    <div style="margin: 20px;  text-align: center;">
                                        <input type="submit"  value="envoyer" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="visualisation-content" style="display: none;">
                            <!-- contenu visualisation de contenue du rapport-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Contenue</th>
                                                <th>Nom du fichier</th>
                                                <th>Date de creation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (($rapports?:[]) as $rp): ?>
                                                <tr>
                                                    <td><?= (substr($rp['descriptions'], 0,10)) ?></td>
                                                    <td>
                                                        <a href="<?= ("../../"  . $rp['filename']) ?>"><?= (substr($rp['filename'], 10)) ?></a>
                                                    </td>
                                                    <td><?= ($rp['date_creation']) ?></td>
                                                    <td>
                                                        <button class="btn btn-success">Voir</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
            $(document).ready(function() {
            $('#myTable').DataTable( {
                "dom": '<"table-title"f><"table-responsive"t><"table-footer"p>',
                "lengthMenu": [ 10, 25, 50, 75, 100 ],
                "pageLength": 10 // Définit le nombre d'entrées par page par défaut
            } );
            } );
        </script>
        <script>
            // Récupération des éléments HTML
            const rapportLink = document.getElementById("rapport-link");
            const visualisationLink = document.getElementById("visualisation-link");
            const rapportForm = document.getElementById("rapport-form");
            const visualisationContent = document.getElementById("visualisation-content");

            // Fonction pour cacher le formulaire de rapport et afficher le contenu de visualisation
            function showVisualisationContent() {
                visualisationContent.style.display = "block";
                rapportForm.style.display = "none";
            }

            // Fonction pour cacher le contenu de visualisation et afficher le formulaire de rapport
            function showRapportForm() {
                visualisationContent.style.display = "none";
                rapportForm.style.display = "block";
            }

            // Ajout des gestionnaires d'événements de clic pour les boutons
            rapportLink.addEventListener("click", showRapportForm);
            visualisationLink.addEventListener("click", showVisualisationContent);

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
