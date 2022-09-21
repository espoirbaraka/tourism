<?php
include 'includes/sessionconnected.php';
include 'includes/format.php';
?>
<?php
// $today = date('Y-m-d');
// $year = date('Y');
// if(isset($_GET['year'])){
//   $year = $_GET['year'];
// }

$conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modifier la thématique
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Modifier la thématique</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
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
            <div class="row">
                <div class="col-xs-12">
                    <div class="box" style="overflow: auto;">
                        <div class="box-body">
                            <div class="col-md-12">
                                <?php
                                $them = $_GET['them'];
                                $req = $conn->prepare("SELECT * FROM tbl_categorie_pub WHERE CodeCateg=$them");
                                $req->execute();
                                $thematique = $req->fetch();
                                ?>
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="operation/edit_thematique.php">
                                    <input type="hidden" name="id" value="<?php echo $thematique['CodeCateg'] ?>">
                                    <div class="form-group">
                                        <label for="titre" class="col-sm-2 control-label">Theme</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="titre" name="titre" autocomplete="off" value="<?php echo $thematique['Categorie'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contenue" class="col-sm-2 control-label">Detail</label>
                                        <div class="col-sm-10">
                                            <textarea class="textarea" name="detail" placeholder="Taper le contenue" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="photo" class="col-sm-2 control-label">Image illustrative</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="photo" name="photo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="edit" class="btn btn-success">Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->


<?php include 'includes/scripts.php'; ?>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(".textarea").wysihtml5();

    $(".module").click(function(){
        var text = $(this).text();
        $('.textarea').data("wysihtml5").editor.setValue(text);
    });
</script>
</body>
</html>
