<div class="page-banner" style="background-image: url('images/2.jpg')">
    <div class="page-banner-bg"></div>
    <h1>Reserver <?php echo $site['Designation'] ?></h1>
    <nav>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index">Acceuil</a></li>
        </ol>
    </nav>
</div>


<div class="page-content pt_50 pb_60">
    <div class="container">
        <div class="row cart">





            <div class="col-md-6">
                <div class="contact">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td class="w-300">Site</td>
                                <td>
                                    <?php echo $site['Designation'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-300">Adresse</td>
                                <td>
                                    <?php echo $site['Adresse'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="w-300">Province</td>
                                <td>
                                    <?php echo $site['Province'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Latitude</td>
                                <td>
                                    <?php echo $site['Latitude'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Logitude</td>
                                <td>
                                    <?php echo $site['Longitude'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Prix</td>
                                <td>
                                    <?php echo $site['Prevision'] ?> $
                                </td>
                            </tr>

                            <tr>
                                <td>Temps</td>
                                <td>
                                    <?php echo $site['TempsPrevision'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Gestionnaire</td>
                                <td>
                                    <?php echo $site['Gestionnaire'] ?>
                                </td>
                            </tr>




                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="reg-login-form">
                    <div class="inner">
                        <form action="operation/reserver.php" method="post">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['id_client'] ?>">
                                <input type="hidden" class="form-control" name="site" value="<?php echo $_GET['code'] ?>">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <button type="submit" class="btn btn-primary" name="reserver">Reserver</button>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>