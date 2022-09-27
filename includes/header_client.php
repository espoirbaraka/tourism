<body>


<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12">
                <ul class="top-left">
                    <li><i class="fas fa-phone-alt"></i> +243 977 565 778</li>
                    <li><i class="fas fa-envelope"></i> info@kivutour.com</li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12">
                <ul class="top-right">

                    <?php
                    if(isset($_SESSION['client'])){
                        ?>
                        <li>
                            <a href="cli_dashboard" class="nav-link"><i class="fas fa-user"></i> Dashboard <?php echo $_SESSION['client'] ?></a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="connection" class="nav-link"><i class="fas fa-sign-in-alt"></i> Connection</a>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Navbar Area -->
<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index" class="logo">
            <img src="images/logo.png" alt="" style="height: 50px;">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index">
                    <img src="images/logo.png" alt="" style="height: 40px;">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">

                        </li>



                        <li class="nav-item">

                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->