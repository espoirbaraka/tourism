<!-- Edit password -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier la province</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/edit_province.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">
                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Province</label>
                        <div class="col-sm-8">
                            <input type="text" name="province" id="province" class="form-control">
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



<!-- Add -->
<div class="modal fade" id="addprovince">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"><b>Ajouter une province</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/add_province.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Province</label>
                        <div class="col-sm-9">
                            <input type="text" id="province" name="province" autocomplet="off" class="form-control" required>
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




<!-- remove -->
<div class="modal fade" id="remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Supprimer la province</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/delete_province.php" enctype="multipart/form-data">

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



