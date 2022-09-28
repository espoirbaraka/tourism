<!-- Edit password -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier le client</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/edit_client.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">
                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-8">
                            <input type="text" name="nom" id="nom" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Postnom</label>
                        <div class="col-sm-8">
                            <input type="text" name="postnom" id="postnom" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Prenom</label>
                        <div class="col-sm-8">
                            <input type="text" name="prenom" id="prenom" class="form-control">
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
                <h4 class="modal-title"><b>Supprimer le client</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/delete_client.php" enctype="multipart/form-data">

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



