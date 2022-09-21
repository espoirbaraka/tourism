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
        Publication
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Publications</li>
      </ol>
    </section>
    
    <!-- Main content -->
      <section class="content">
          <?php
          if (isset($_SESSION['error'])) {
              echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
              unset($_SESSION['error']);
          }
          if (isset($_SESSION['success'])) {
              echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
              unset($_SESSION['success']);
          }
          ?>
          <div class="row">
              <div class="col-xs-12">
                  <div class="box" style="overflow: auto;">
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="col-md-12">
                              <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                      <li class="active"><a href="#liste" data-toggle="tab">Liste des publications</a></li>
                                      <li><a href="#newpub" data-toggle="tab">Nouvelle publication</a></li>
                                  </ul>
                                  <div class="tab-content">
                                      <div class="active tab-pane" id="liste">
                                          <table id="tableau" class="table table-bordered table-hover">
                                              <thead>
                                              <tr>
                                                  <th>Photo</th>
                                                  <th>Titre</th>
                                                  <th>Contenue</th>
                                                  <th>Categorie</th>
                                                  <th>Type</th>
                                                  <th>Date</th>
                                                  <th>Vues</th>
                                                  <th>Action</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                              $stmt = $conn->prepare("SELECT tbl_publication.id as id,SUBSTRING(titre, 1, 500) AS titre, SUBSTRING(description, 1, 1000) AS description,	tbl_publication.photo as photo,tbl_publication.created_on as created_on,created_by,count_seen,code_categ,code_type, username, Categorie, Type FROM tbl_publication
                                                                            INNER JOIN tbl_type_pub
                                                                            ON tbl_publication.code_type=tbl_type_pub.CodeType
                                                                            INNER JOIN tbl_categorie_pub
                                                                            ON tbl_publication.code_categ=tbl_categorie_pub.CodeCateg
                                                                            INNER JOIN tbl_user
                                                                            ON tbl_publication.created_by=tbl_user.id");
                                              $stmt->execute();
                                              foreach ($stmt as $row) {
                                                  ?>
                                                  <tr>
                                                      <td><img src="img/<?php echo $row['photo']; ?>" style="width: 70px; height: 70px;"></td>
                                                      <td><?php echo $row['titre']; ?></td>
                                                      <td><?php echo $row['description']; ?></td>
                                                      <td><?php echo $row['Categorie']; ?></td>
                                                      <td><?php echo $row['Type']; ?></td>
                                                      <td><?php echo date("d/m/Y", strtotime($row['created_on'])).' par '.$row['username']; ?></td>
                                                      <td><?php echo $row['count_seen']; ?></td>
                                                      <td>
                                                          <button class='btn btn-primary btn-sm edit btn-flat' data-id="<?php echo $row['id'] ?>"><i class='fa fa-edit'></i> </button>
                                                          <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['id'] ?>"><i class='fa fa-trash'></i> </button>
                                                      </td>
                                                  </tr>
                                                  <?php
                                              }
                                              ?>

                                              </tbody>

                                          </table>
                                      </div>



                                      <div class="tab-pane" id="newpub">
                                          <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="operation/add_publication.php">

                                              <div class="form-group">
                                                  <label for="titre" class="col-sm-2 control-label">Titre de la publication</label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" id="titre" name="titre" autocomplete="off" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="contenue" class="col-sm-2 control-label">Contenue de la publication</label>
                                                  <div class="col-sm-10">
                                                      <textarea class="textarea" name="contenue" placeholder="Taper le contenue" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <label for="titre" class="col-sm-2 control-label">Type de la publication</label>
                                                  <div class="col-sm-10">
                                                      <select class="form-control" name="type" required>
                                                          <?php
                                                          $types = $conn->prepare("SELECT * FROM tbl_type_pub");
                                                          $types->execute();
                                                          foreach ($types as $row){
                                                              ?>
                                                              <option value="<?php echo $row['CodeType'];?>"><?php echo $row['Type'];?></option>
                                                          <?php
                                                          }
                                                          ?>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <label for="titre" class="col-sm-2 control-label">Categorie de la publication</label>
                                                  <div class="col-sm-10">
                                                      <select class="form-control" name="categorie">
                                                          <?php
                                                          $categories = $conn->prepare("SELECT * FROM tbl_categorie_pub");
                                                          $categories->execute();
                                                          foreach ($categories as $row){
                                                              ?>
                                                              <option value="<?php echo $row['CodeCateg'];?>"><?php echo $row['Categorie'];?></option>
                                                              <?php
                                                          }
                                                          ?>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <label for="photo" class="col-sm-2 control-label">Image jointe</label>
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="photo" name="photo">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-offset-2 col-sm-10">
                                                      <button type="submit" name="ajouter" class="btn btn-success">Publier</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>

                                      <!-- /.tab-pane -->
                                  </div>

                              </div>
                              <!-- /.nav-tabs-custom -->
                          </div>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->




                  <!-- /.box -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- right col -->
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'modal/publication.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php

?>

<?php 
?>
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
<script>
$(function(){

$(document).on('click', '.edit', function(e){
  e.preventDefault();
  $('#editpub').modal('show');
  var id = $(this).data('id');
  getRow(id);
});

$(document).on('click', '.delete', function(e){
  e.preventDefault();
  $('#delete').modal('show');
  var id = $(this).data('id');
  getRow(id);
});

});

function getRow(id){
$.ajax({
  type: 'POST',
  url: 'operation/publication_row.php',
  data: {id:id},
  dataType: 'json',
  success: function(response){
    $('.publication').val(response.id);
    $('#edit_titre').val(response.titre);
    $('#edit_contenue').html(response.description);
      $('.fullname').text(response.titre);
   }
});
}
</script>
</body>
</html>
