<?php 
  include 'includes/sessionconnected.php';
  include 'includes/format.php'; 
?>
<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  $mois = date('m');
  if(isset($_GET['year']) AND isset($_GET['month'])){
    $year = $_GET['year'];
    $mois = $_GET['month'];
  }

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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Dashboard</li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
                $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_user");
                $stmt1->execute();
                $stmt2 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_site");
                $stmt2->execute();
                $usernumber =  $stmt1->fetch();
                $sitenumber =  $stmt2->fetch();

                echo "<h3>".$sitenumber['numrows']."</h3>";
              ?>
              <p>Sites touristiques</p>
            </div>
            <div class="icon">
              <i class="fa fa-print"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS summrows FROM tbl_reservation");
                $stmt->execute();
                $rrow =  $stmt->fetch();

                echo "<h3>".$rrow['summrows']."</h3>";
              ?>
              <p>Total des reservations</p>
            </div>
            <div class="icon">
              <i class="fa fa-desktop"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_reservation WHERE MONTH(Date)=:mois");
                $stmt->execute(['mois'=>$mois]);
                $rrow =  $stmt->fetch();

                echo "<h3>".$rrow['numrows']."</h3>";
              ?>
              <p>Reservations de ce mois</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_user");
                $stmt->execute();
                $prow =  $stmt->fetch();

                echo "<h3>".$prow['numrows']."</h3>";
              ?> 
              <p>Utilisateurs</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservation mensuelle</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Selectionnez l'année: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2040; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
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

<!-- Chart Data -->
<?php
$reservation = array();
$months = array();
for( $m = 1; $m <= 12; $m++ ) {
    try{
        $stmt = $conn->prepare("SELECT COUNT(CodeReservation) as nombre FROM tbl_reservation WHERE MONTH(DateDepart)=:month AND YEAR(DateDepart)=:year");
        $stmt->execute(['month'=>$m, 'year'=>$year]);
        $total = 0;
        foreach($stmt as $row){
            $nombre = $row['nombre'];
        }
        array_push($reservation, round($nombre, 2));
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
}

$months = json_encode($months);
$reservation = json_encode($reservation);

?>
<!-- End Chart Data -->

<?php 
// $pdo->close(); 
?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'RESERVATION',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $reservation; ?>
      }
    ]
  }
  var barChartOptions                  = {
    scaleBeginAtZero        : true,
    scaleShowGridLines      : true,
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    scaleGridLineWidth      : 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines  : true,
    barShowStroke           : true,
    barStrokeWidth          : 2,
    barValueSpacing         : 5,
    barDatasetSpacing       : 1,
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
