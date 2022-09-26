<div class="page-banner"
     style="background-image: url('admin/img/<?php echo $categorie['Image']; ?>')">
    <div class="page-banner-bg"></div>
    <h1><?php echo $categorie['Categorie']; ?></h1>
    <nav>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index">Acceuil</a></li>
        </ol>
    </nav>
</div>

<div class="page-content">
    <div class="container">
        <div class="row hotel pt_0 pb_0">


            <?php
            foreach ($stmt2 as $row){
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="hotel-item effect-item">
                        <div class="photo image-effect">
                            <a href="detail_site.php?code=<?php echo $row['id'] ?>"><img
                                        src="admin/img/<?php echo $row['image'] ?>"
                                        alt=""></a>

                            <div class="featured-text"><?php echo $row['Categorie'] ?></div>
                        </div>
                        <div class="text">

                            <div class="type-price">
                                <div class="type">
                                    <div class="inner-sale">
                                        <?php echo $row['Prevision'] ?> $
                                    </div>
                                </div>
                                <div class="price">
                                    <span class="per-night">(<?php echo $row['TempsPrevision'] ?>)</span>
                                </div>
                            </div>

                            <h3><a href="detail_site.php?code=<?php echo $row['id'] ?>"><?php echo $row['Designation'] ?></a></h3>
                            <div class="location">
                                <a href="detail_site.php?code=<?php echo $row['id'] ?>"><i class="fas fa-map-marker-alt"></i> <?php echo $row['Adresse'].', '.$row['Province']; ?></a>
                            </div>


                        </div>
                    </div>
                </div>
            <?php
            }
            ?>




            <div class="col-md-12">

            </div>


        </div>
    </div>
</div>