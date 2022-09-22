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
                Provinces
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Provinces</li>
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
            <!-- debut tableau -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="#addprovince" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                        </div>
                        <div class="box-body">
                            <div style="overflow: auto;">
                                <table id="tableau" class="table table-bordered">
                                    <thead>
                                    <th>Province</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT * FROM tbl_province");
                                        $stmt->execute();
                                        foreach($stmt as $user){

                                            echo "
                          <tr>
                            <td>".$user['Province']."</td>
                            <td>
                                <button class='btn btn-primary btn-sm edit btn-flat' data-id='".$user['CodeProvince']."'><i class='fa fa-edit'></i> </button>
                                <button class='btn btn-danger btn-sm remove btn-flat' data-id='".$user['CodeProvince']."'><i class='fa fa-remove'></i> </button>
                            </td>
                          </tr>
                        ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo $e->getMessage();
                                    }

                                    $pdo->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'modal/province.php'; ?>
</div>
<!-- ./wrapper -->


<?php include 'includes/scripts.php'; ?>
<script>
    $(function(){

        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.remove', function(e){
            e.preventDefault();
            $('#remove').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });



    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'operation/province_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.code').val(response.CodeProvince);
                $('#province').val(response.Province);
                $('.fullname').html(response.Province);
            }
        });
    }
</script>
</body>
</html>
