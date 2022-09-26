<!-- Add -->
<div class="modal fade" id="addsite">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"><b>Ajouter un site</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/add_site.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9">
                            <input type="text" id="designation" name="designation" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-9">
                            <input type="text" id="adresse" name="adresse" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Longitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="longitude" name="longitude" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Latitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="latitude" name="latitude" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Prevision prix ($)</label>
                        <div class="col-sm-9">
                            <input type="number" id="prix" name="prix" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Prevision temps </label>
                        <div class="col-sm-9">
                            <input type="text" id="temps" name="temps" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Gestionnaire </label>
                        <div class="col-sm-9">
                            <input type="text" id="gestionnaire" name="gestionnaire" autocomplet="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Categorie </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="categorie" required>
                                <option value="">--Selectionnez une categorie--</option>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM tbl_categorie");
                                $stmt->execute();
                                foreach ($stmt as $row){
                                    ?>
                                    <option value="<?php echo $row['CodeCategorie'] ?>"><?php echo $row['Categorie'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Image </label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" autocomplet="off" class="form-control" required>
                        </div>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier le site <span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/edit_site.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9">
                            <input type="text" name="designation" id="edit_designation" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_adresse" name="adresse" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Longitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_longitude" name="longitude" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Latitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_latitude" name="latitude" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Prevision prix ($)</label>
                        <div class="col-sm-9">
                            <input type="number" id="edit_prix" name="prix" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Prevision temps </label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_temps" name="temps" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Gestionnaire </label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_gestionnaire" name="gestionnaire" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-edit"></i> Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- remove -->
<div class="modal fade" id="remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Supprimer le site</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/delete_site.php" enctype="multipart/form-data">

                    <input type="hidden" name="id" class="code">
                    <h2 class='bold fullname'></h2>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="remove"><i class="fa fa-remove"></i> Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>



