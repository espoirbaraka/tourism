<div class="page-banner" style="background-image: url('images/2.jpg')">
    <div class="page-banner-bg"></div>
    <h1>S'inscrire</h1>
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


                        <form action="operation/create_account.php" method="POST">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="">Post-nom</label>
                                <input type="text" class="form-control" name="postnom">
                            </div>
                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input type="text" class="form-control" name="prenom">
                            </div>
                            <div class="form-group">
                                <label for="">Telephone</label>
                                <input type="tel" class="form-control" name="telephone">
                            </div>
                            <div class="form-group">
                                <label for="">Nationalité</label>
                                <input type="text" class="form-control" name="nationalite">
                            </div>
                            <div class="form-group">
                                <label for="">Adresse mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Mot de passe</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="inscription">S'inscrire</button>
                            <div class="new-user">
                                Avez-vous déjà un compte? <a href="connection" class="link">Connectez-vous</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>