<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?= ($BASE. '/' . $UI) ?>"> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Commissariat</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="package/dist/chart.js"></script>
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
                            <a class="nav-link active" href="<?= ($BASE . '/accueil') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ACCEUIL
                            </a>
                            <div class="sb-sidenav-menu-heading">ACTIONS</div>
                            <a class="nav-link" href="<?= ($BASE . '/add_police') ?>">
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
                        Start
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Acceuil</h1>
                        <ol class="breadcrumb mb-4">
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li> -->
                        </ol>
                        </ol>
                            <div class="row row-cols-1 row-cols-md-3 g-7">
                                <div class="col">
                                    <div class="card text-white bg-secondary mb-3" >
                                        <div class="card-header">Nombre de policiers enregistré</div>
                                        <div class="card-body">
                                            <h5 class="card-title"> Nous avons actuellement <?= ($countPolicier) ?> policiers enregistrés dans notre systeme</h5>
                                            <p class="card-text">Nous sommes fiers de fournir un service de qualité pour aider les policiers à suivre leur equipement et leur formation. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-primary mb-3" >
                                        <div class="card-header">Nombre d'armes Enregistrées</div>
                                        <div class="card-body">
                                            <h5 class="card-title"> Nous avons actuellement <?= ($countArme) ?> types  armes enregistrées dans notre registre</h5>
                                            <p class="card-text">Cela inclut un large éventail de types d'armes, allant des pistolets aux fusils en passant par le mittraillette et aux arme Automatique.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success mb-3" >
                                        <div class="card-header">Nombre de Munition </div>
                                        <div class="card-body">
                                            <h5 class="card-title"> Nous avons actuellement  <?= ($countMunition) ?> types munitions enregistrées dans notre registre</h5>
                                            <p class="card-text"> cette information est mise à jour régulierement pour refleter les munitions actuellement enregistrées dans notre système.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <h4 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Statistique</h4>
                            <div class="col-4">
							    <canvas id="myChart" style="width:100%;max-width:400px"></canvas>
                            </div>
                            <div class="col-4">
                                <!-- affichage chart Pie de statistiques des des armes et munition déjà attribuée-->
                                <canvas id="myChartPie" style="width:100%;max-width:350px; height: 90px;"></canvas>


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
           

        </script>
        <script>
            
			var xValues = ["Policiers avec arme", "Policiers sans Arme"];
			var yValues = [<?= ($countAttrib) ?>,<?= ($countNotAttr) ?>];
			var barColors = ["green", "red"];
            

            new Chart("myChart", {
					type: "bar",
					data: {
						labels: xValues,
						datasets: [{
                        label: "Nombre de policiers sans et avec arme",
						backgroundColor: barColors,
						data: yValues
						}]
					},
					options: {
						legend: {display: false},
						title: {
						display: true,
							text: "Personne Enregistrée"
						}
					}
			});

            var xValues = ["Armes", "Munitions"];
            var yValues = [<?= ($countArme) ?>,<?= ($countMunition) ?>];
            var barColors = ["blue", "red"];

            new Chart("myChartPie", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                        }]
                    },
                    options: {
                        title: {
                        display: true,
                        text: "Armes et Munitions"
                        }
                    }
            });

            
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
