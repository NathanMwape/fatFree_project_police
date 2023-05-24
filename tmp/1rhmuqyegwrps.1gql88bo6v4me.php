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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body 
    style="
    background-color: rgb(183, 196, 189);
    ">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <?php if (isset($error)): ?>
                                    
                                        <div class="alert alert-danger" role="alert">
                                            <?= ($error)."
" ?>
                                        </div>
                                    
                                <?php endif; ?>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <!-- image avec avec des coins arrondi -->
                                    <div class="card-header">
                                        
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">
                                        <img src="image/pnc_drc.png" alt="" style="width: 250px; height: 200px; border-radius: 0%;">
                                    </div>
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= ($BASE.'/admin/check') ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="login" type="text" placeholder="name@example.com" autocomplete="off" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" autocomplete="on"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" >Forgot Password?</a>
                                                <input class="btn btn-primary" type="submit" value="connecter" name="envoi">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
