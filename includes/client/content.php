


<div class="page-content pt_50 pb_60" style="">
    <div class="container">
        <div class="row cart">

            <section id="breadcrumb">
                <div class="container">

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


                    <ol class="breadcrumb">
                        <li class="active">Espace client</li>
                    </ol>
                </div>
            </section>


            <?php
            $client = $_SESSION['id_client'];
            $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_reservation
                                                                            WHERE CodeClient=$client");
            $stmt1->execute();
            $clientnumber =  $stmt1->fetch();
            ?>
            <section id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="#dashboard" class="list-group-item active main-color-bg">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                                </a>
                                <a href="#reservation" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Mes reservations <span class="badge"><?php echo $clientnumber['numrows'] ?></span></a>
                                <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Se deconnecter </a>
                            </div>




                        </div>
                        <div class="col-md-9">
                            <!-- Website Overview -->
                            <div class="panel panel-default" id="dashboard">
                                <div class="panel-heading main-color-bg">
                                    <h3 class="panel-title">Statistiques</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <div class="well dash-box">
                                            <?php
                                            $client = $_SESSION['id_client'];
                                            $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_reservation
                                                                            WHERE CodeClient=$client");
                                            $stmt1->execute();
                                            $clientnumber =  $stmt1->fetch();
                                            ?>
                                            <h2><span class="glyphicon glyphicon-send" aria-hidden="true"></span> <?php echo $clientnumber['numrows'] ?></h2>
                                            <h4>Mes reservations</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="well dash-box">
                                            <?php
                                            $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_site");
                                            $stmt1->execute();
                                            $sitenumber =  $stmt1->fetch();
                                            ?>
                                            <h2><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $sitenumber['numrows'] ?></h2>
                                            <h4>Nos sites</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="well dash-box">
                                            <?php
                                            $client = $_SESSION['id_client'];
                                            $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tbl_categorie");
                                            $stmt1->execute();
                                            $categorienumber =  $stmt1->fetch();
                                            ?>
                                            <h2><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?php echo $categorienumber['numrows'] ?></h2>
                                            <h4>Nos categories</h4>
                                        </div>
                                    </div>

                                </div>
                            </div asi>

                            <!-- Latest Users -->
                            <div class="panel panel-default" id="reservation">
                                <div class="panel-heading main-color-bg">
                                    <h3 class="panel-title">Mes reservations</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Date reservation</th>
                                            <th>Place</th>
                                            <th>Date visite</th>
                                            <th>Prix</th>
                                            <th>Action</th>
                                        </tr>

                                        <?php
                                        $client = $_SESSION['id_client'];
                                        $stmt = $conn->prepare("SELECT * FROM tbl_reservation
                                                                        INNER JOIN tbl_site
                                                                        ON tbl_reservation.CodeSite=tbl_site.CodeSite
                                                                        WHERE CodeClient=$client");
                                        $stmt->execute();
                                        foreach ($stmt as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo date("d/m/Y", strtotime($row['Date'])) ?></td>
                                                <td><?php echo $row['Designation'] ?></td>
                                                <td><?php echo date("d/m/Y", strtotime($row['DateDepart'])) ?></td>
                                                <td><?php echo $row['Prevision'].' $ pour '.$row['TempsPrevision'] ?></td>
                                                <td>
                                                    <?php
                                                    if($row['Status']==0){
                                                        ?>
                                                        <form action="operation/annuler_reservation.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row['CodeReservation'] ?>">
                                                            <button type="submit" name="annuler" class="btn btn-danger">Annuler</button>
                                                        </form>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                            ?>



                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>