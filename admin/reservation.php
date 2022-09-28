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
                Reservations
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Reservations</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-2">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h4 class="box-title">Type de reservation</h4>
                        </div>
                        <div class="box-body">
                            <!-- the events -->
                            <div id="external-events">
                                <div class="external-event bg-green">Reservation payée</div>
                                <div class="external-event bg-yellow">Reservation non-payée</div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->

                </div>
                <!-- /.col -->
                <div class="col-md-10">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
