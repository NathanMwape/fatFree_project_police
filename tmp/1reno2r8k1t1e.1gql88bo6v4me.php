<!-- 
    ceci la page de connexion qui va nous permettre de se connecter à notre application

 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <base href="<?= ($BASE. '/' . $UI) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #ac838b;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block m-10">
                                <img src="image/pnc_drc.png" width="500" height="100" alt="login form"
                                    class="img-fluid p-4" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="<?= ($BASE.'/admin/check') ?>" method="POST">
                                        <?php if (isset($error)): ?>
                                            
                                                <div class="alert alert-danger" role="alert">
                                                    <?= ($error)."
" ?>
                                                </div>
                                            
                                        <?php endif; ?>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Authentification</span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17" name="login"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4 d-flex justify-content-center">
                                            <input class="btn btn-primary btn-lg rounded-pill" type="submit"
                                                value="Connecter" name="envoi">
                                        </div>
                                        <a class="small text-muted">Terms of use.</a>
                                        <a class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <!-- <script src="js/scripts.js"></script> -->
</body>

</html>