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
                Nos clients
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Nos clients</li>
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

                        <div class="box-body">
                            <div style="overflow: auto;">
                                <table id="tableau" class="table table-bordered">
                                    <thead>
                                    <th>Nom</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Nationalite</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT * FROM tbl_client");
                                        $stmt->execute();
                                        foreach($stmt as $client){

                                            echo "
                          <tr>
                            <td>".$client['NomClient'].' '.$client['PostnomClient'].' '.$client['PrenomClient']."</td>
                            <td>".$client['Telephone']."</td>
                            <td>".$client['Email']."</td>
                            <td>".$client['Nationalite']."</td>
                            
                            <td>
                                <button class='btn btn-primary btn-sm edit btn-flat' data-id='".$client['CodeClient']."'><i class='fa fa-edit'></i> </button>
                                <button class='btn btn-danger btn-sm remove btn-flat' data-id='".$client['CodeClient']."'><i class='fa fa-remove'></i> </button>
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
    <?php include 'modal/client.php'; ?>
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
            url: 'operation/client_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.code').val(response.CodeClient);
                $('#nom').val(response.NomClient);
                $('#postnom').val(response.PostnomClient);
                $('#prenom').val(response.PrenomClient);
                $('#password').val(response.Password);
                $('.fullname').html(response.NomClient);
            }
        });
    }
</script>
</body>
</html>
