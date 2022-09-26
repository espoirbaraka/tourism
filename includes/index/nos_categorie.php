<div class="popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Nos categories</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $stmt = $conn->prepare("SELECT * FROM tbl_categorie");
            $stmt->execute();
            foreach ($stmt as $category){
                $categ = $category['CodeCategorie'];
                $stmt = $conn->prepare("SELECT COUNT(*) as nbre FROM tbl_site WHERE CodeCategorie=:code");
                $stmt->execute(['code'=>$categ]);
                $nbre = $stmt->fetch();
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp">
                    <div class="popular-category-item effect-item"
                         style="background-image: url(admin/img/<?php echo $category['Image'] ?>);">
                        <div class="bg image-effect"></div>
                        <div class="text">
                            <h4><?php echo $category['Categorie'] ?></h4>
                            <p><?php echo $nbre['nbre'] ?> sites</p>
                        </div>
                        <a href="detail_categorie.php?code=<?php echo $category['CodeCategorie'] ?>"></a>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>