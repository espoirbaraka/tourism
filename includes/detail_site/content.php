<div class="hotel-single-banner"
     style="background-image: url('admin/img/<?php echo $site['image'] ?>');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $site['Designation'] ?></h1>
                <div class="price">
                    <?php echo $site['Prevision'] ?> $
                    <span>(<?php echo $site['TempsPrevision'] ?>)</span>
                </div>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i> <?php echo $site['Adresse'] . ', ' . $site['Province'] ?>
                </div>


                <div class="hotel-items">

                    <a href="reserver.php?code=<?php echo $site['id'] ?>">
                        <i class="fas fa-money-bill"></i> Reserver
                    </a>


                </div>


            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="hotel-page">
                    <h2><i class="fas fa-folder"></i> Description</h2>
                    <p>
                        <?php
                        echo $site['Description']
                        ?>


                    <div class="gap"></div>
                    <h2><i class="fas fa-image"></i> Photos</h2>
                    <div class="photo-all">
                        <div class="row">
                            <?php
                            $code = $site['id'];
                            $stmt = $conn->prepare("SELECT * FROM tbl_photo 
                                                            WHERE CodeSite=$code");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="item">
                                        <a href="admin/img/<?php echo $row['Photo'] ?>"
                                           class="magnific">
                                            <img src="admin/img/<?php echo $row['Photo'] ?>" alt="">
                                            <div class="icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>


                    <div class="gap"></div>
                    <h2><i class="fas fa-atom"></i> Detail</h2>
                    <div class="contact">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">

            </div>
        </div>
    </div>
</div>