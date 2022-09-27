<div class="page-banner" style="background-image: url('images/2.jpg')">
    <div class="page-banner-bg"></div>
    <h1>Se connecter</h1>
    <nav>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index">Acceuil</a></li>
        </ol>
    </nav>
</div>


<div class="page-content pt_50 pb_60">
    <div class="container">
        <div class="row cart">





            <div class="col-md-12">
                <div class="reg-login-form">
                    <div class="inner">

                        <form action="https://hotelpoint.phpscriptpoint.com/customer/login/store" method="post">
                            <?php
                            if(isset($_SESSION['error'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
                                  ".$_SESSION['error']."
                                </div>
                              ";
                                unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                                echo "
                                <div class='alert alert-success alert-dismissible'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <h4><i class='icon fa fa-check'></i> Succès!</h4>
                                  ".$_SESSION['success']."
                                </div>
                              ";
                                unset($_SESSION['success']);
                            }
                            ?>
                            <div class="form-group">
                                <label for="">Adresse mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Mot de passe</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Se connecter</button>
                            <div class="new-user">
                                Etez-vous nouveau? <a href="register" class="link">Creez un compte</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>