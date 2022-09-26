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

$code = $_GET['code'];

$stmt = $conn->prepare("SELECT * FROM tbl_site
                                INNER JOIN tbl_province
                                ON tbl_site.CodeProvince=tbl_province.CodeProvince
                                WHERE CodeSite=:code");
$stmt->execute(['code'=>$code]);
$site = $stmt->fetch();
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
                Detail site
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Detail site</li>
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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="./img/<?php echo $site['Image']; ?>"
                                 alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $site['Designation']; ?></h3>


                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Adresse</b> : <a class="pull-right"><?php echo $site['Adresse']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Province</b> : <a class="pull-right"><?php echo $site['Province']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Longitude</b> : <a class="pull-right"><?php echo $site['Longitude']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Latitude</b> : <a class="pull-right"><?php echo $site['Latitude']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Prix</b> : <a class="pull-right"><?php echo $site['Prevision']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Temps</b> : <a class="pull-right"><?php echo $site['TempsPrevision']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gestionnaire</b> : <a class="pull-right"><?php echo $site['Gestionnaire']; ?></a>
                                </li>




                                <br>
                                <button class='btn btn-primary btn-sm image btn-flat' style="float: right" data-id="<?php echo $site['CodeSite']; ?>"><i class='fa fa-plus'></i> Image</button>



                            </ul>


                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- About Me Box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#consulter" data-toggle="tab">Images</a></li>
                            <li class=""><a href="#maps" data-toggle="tab">Description</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="consulter">

                                        <div class="row">
                                            <?php
                                            $stmt = $conn->prepare("SELECT * FROM tbl_photo
                                                                        INNER JOIN tbl_site
                                                                        ON tbl_photo.CodeSite=tbl_site.CodeSite
                                                                        WHERE tbl_photo.CodeSite=$code");
                                            $stmt->execute();
                                            foreach ($stmt as $row){
                                                ?>
                                                <div class="col-lg-3 col-md-4 col-xs-6">
                                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $row['Designation'] ?>"
                                                       data-image="img/<?php echo $row['Photo'] ?>"
                                                       data-target="#image-gallery">
                                                        <img class="img-thumbnail"
                                                             src="img/<?php echo $row['Photo'] ?>"
                                                             alt="Image"
                                                             style="height: 150px; width: 250px; object-fit: cover;">
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>


                                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="image-gallery-title"></h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                                        </button>

                                                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                            </div>


                            <div class="tab-pane" id="maps">

                                <div style="padding: 5px;">
                                    <?php echo $site['Description']; ?>
                                </div>


                            </div>




                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'modal/site.php'; ?>
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

        $(document).on('click', '.image', function(e){
            e.preventDefault();
            $('#image').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });



    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'operation/site_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.code').val(response.CodeSite);
                $('#edit_designation').val(response.Designation);
                $('#edit_adresse').val(response.Adresse);
                $('#edit_longitude').val(response.Longitude);
                $('#edit_latitude').val(response.Latitude);
                $('#edit_prix').val(response.Prix);
                $('#edit_temps').val(response.TempsPrevision);
                $('#edit_gestionnaire').val(response.Gestionnaire);
                $('.fullname').html(response.Designation);
            }
        });
    }
</script>





<!--IMAGE-->
<script>
    let modalId = $('#image-gallery');

    $(document)
        .ready(function () {

            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
                $('#show-previous-image, #show-next-image')
                    .show();
                if (counter_max === counter_current) {
                    $('#show-next-image')
                        .hide();
                } else if (counter_current === 1) {
                    $('#show-previous-image')
                        .hide();
                }
            }

            /**
             *
             * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
             * @param setClickAttr  Sets the attribute for the click handler.
             */

            function loadGallery(setIDs, setClickAttr) {
                let current_image,
                    selector,
                    counter = 0;

                $('#show-next-image, #show-previous-image')
                    .click(function () {
                        if ($(this)
                            .attr('id') === 'show-previous-image') {
                            current_image--;
                        } else {
                            current_image++;
                        }

                        selector = $('[data-image-id="' + current_image + '"]');
                        updateGallery(selector);
                    });

                function updateGallery(selector) {
                    let $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-title')
                        .text($sel.data('title'));
                    $('#image-gallery-image')
                        .attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if (setIDs == true) {
                    $('[data-image-id]')
                        .each(function () {
                            counter++;
                            $(this)
                                .attr('data-image-id', counter);
                        });
                }
                $(setClickAttr)
                    .on('click', function () {
                        updateGallery($(this));
                    });
            }
        });

    // build key actions
    $(document)
        .keydown(function (e) {
            switch (e.which) {
                case 37: // left
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                        $('#show-previous-image')
                            .click();
                    }
                    break;

                case 39: // right
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                        $('#show-next-image')
                            .click();
                    }
                    break;

                default:
                    return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action (scroll / move caret)
        });

</script>





<!--MAPS-->
<script>
    var customLabel = {
        restaurant: {
            label: 'R'
        },
        bar: {
            label: 'B'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-33.863276, 151.207977),
            zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('http://localhost:81/tourism/admin/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }



    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIHUeUWbdKyMCEtYdHWL_v1ji6hWDzbQ&callback=initMap"
        defer
></script>
</body>
</html>
