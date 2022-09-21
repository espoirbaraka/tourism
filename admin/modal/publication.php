<!-- modifier -->
<div class="modal fade" id="editpub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier le titre</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/edit_publication.php" enctype="multipart/form-data">
                    <input type="hidden" class="publication" name="id">
                    <div class="form-group">
                        <label for="etat" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-9">
                            <input name="titre" class="form-control" id="edit_titre"/>
                        </div>
                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Supprimer -->
<div class="modal fade" id="delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier la publication</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/delete_publication.php" enctype="multipart/form-data">
                    <input type="hidden" class="publication" name="id">
                    <div class="text-center">
                        <p>SUPPRIMER LA PUBLICATION</p>
                        <h2 class="bold fullname"></h2>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="delete"><i class="fa fa-save"></i> Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












