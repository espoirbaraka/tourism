
<div class="home-video" style="background-image: url(images/gorilla.jpg)">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>VISIT-DRC</h2>
                <p>
                </p>

            </div>
        </div>
    </div>
</div>


<div class="hotel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Sites touristiques</h2>
                    <h3>Decouvrez le kivu</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $stmt = $conn->prepare("SELECT CodeSite as id, Designation, Adresse, Longitude, Latitude, Prevision, TempsPrevision, tbl_site.Image as image, Categorie, Province FROM tbl_site
                                            INNER JOIN tbl_categorie
                                            ON tbl_site.CodeCategorie=tbl_categorie.CodeCategorie
                                            INNER JOIN tbl_province
                                            ON tbl_site.CodeProvince=tbl_province.CodeProvince
                                            ORDER BY CodeSite DESC LIMIT 9");
            $stmt->execute();
            foreach ($stmt as $site){
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInLeft">
                    <div class="hotel-item effect-item">
                        <div class="photo image-effect">
                            <a href="detail_site.php?code=<?php echo $site['id'] ?>"><img
                                        src="admin/img/<?php echo $site['image'] ?>" alt=""></a>


                            <div class="featured-text"><?php echo $site['Categorie'] ?></div>
                        </div>
                        <div class="text">

                            <div class="type-price">
                                <div class="type">
                                    <div class="inner-sale">
                                        <?php echo $site['Prevision'] ?> $
                                    </div>
                                </div>
                                <div class="price">
                                    <span class="per-night">(<?php echo $site['TempsPrevision'] ?>)</span>
                                </div>
                            </div>

                            <h3><a href="detail_site.php?code=<?php echo $site['id'] ?>"><?php echo $site['Designation'] ?></a></h3>
                            <div class="location">
                                <i class="fas fa-map-marker-alt"></i> <?php echo $site['Adresse'].', '.$site['Province']; ?>
                            </div>


                        </div>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>