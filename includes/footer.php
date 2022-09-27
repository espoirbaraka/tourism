
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="footer-item footer-service">
                    <h2>Categories</h2>
                    <ul class="fmain">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM tbl_categorie");
                        $stmt->execute();
                        foreach ($stmt as $row){
                            ?>
                            <li>
                                <a href="detail_categorie.php?code=<?php echo $row['CodeCategorie'] ?>"><?php echo $row['Categorie'] ?></a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="footer-item footer-contact">
                    <h2>Contactez-nous</h2>
                    <ul>
                        <li>
                            <p>Goma, Nord-kivu , RDC</p>
                        </li>
                        <li>
                            <p>info@kivutour.com</p>
                        </li>
                        <li>
                            <p>+243 977 746 6..</p>
                        </li>
                    </ul>
                </div>
                <div class="footer-item footer-service">
                    <div class="footer-social-link">
                        <ul>
                            <li><a href="#" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="#" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="scroll-top">
    <i class="fas fa-long-arrow-alt-up"></i>
</div>

<script src="frontend/js/custom.js"></script>
<script src="frontend/js/ltr.js"></script>



</body>

<!-- Mirrored from hotelpoint.phpscriptpoint.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2022 14:22:33 GMT -->
</html>