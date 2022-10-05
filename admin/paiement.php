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
                Paiement des réservations
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Paiement des réservations</li>
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
                                    <th>Date</th>
                                    <th>Site</th>
                                    <th>Client</th>
                                    <th>Montant à payer</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT * FROM tbl_reservation
                                        INNER JOIN tbl_site
                                        ON tbl_reservation.CodeSite=tbl_site.CodeSite
                                        INNER JOIN tbl_client
                                        ON tbl_reservation.CodeClient=tbl_client.CodeClient
                                        LEFT JOIN tbl_paiement
                                        ON tbl_reservation.CodeReservation=tbl_paiement.CodeReserv
                                        ORDER BY DateDepart DESC");
                                        $stmt->execute();
                                        foreach($stmt as $client){
                                            $status = ($client['Status']) ? '<span class="label label-success">Payé</span>' : '<span class="label label-danger">non payé</span>';
                                            $button = ($client['Status']) ? '' : "<button class='btn btn-primary btn-sm payer btn-flat' data-id='".$client['CodeReservation']."'><i class='fa fa-money'></i> </button>";
                                            echo "
                          <tr>
                            <td>".date("d/m/Y", strtotime($client['DateDepart']))."</td>
                            <td>".$client['Designation']."</td>
                            <td>".$client['NomClient'].' '.$client['PostnomClient'].' '.$client['PrenomClient']."</td>
                            <td>".$client['Prevision'].'$ pour '.$client['TempsPrevision']."</td>
                            <td>".$status."</td>
                            <td>".$button."</td>
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
    <?php include 'modal/paiement.php'; ?>
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

        $(document).on('click', '.payer', function(e){
            e.preventDefault();
            $('#payer').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });


    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'operation/paiement_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.code').val(response.CodeReservation);
                $('#nombre').val(response.Prevision);
                $('.fullname').html(response.NomClient+' '+response.PostnomClient+' '+response.PrenomClient);
                $('.site').html(response.Designation);
            }
        });
    }
</script>
</body>
</html>
