<!-- Edit password -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Modifier la categorie</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/edit_categorie.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">
                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Province</label>
                        <div class="col-sm-8">
                            <input type="text" name="categorie" id="categorie" class="form-control">
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
<div class="modal fade" id="addcategorie">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"><b>Ajouter une categorie</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/add_categorie.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Categorie</label>
                        <div class="col-sm-9">
                            <input type="text" id="categorie" name="categorie" autocomplet="off" class="form-control" required>
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
<!--<div class="modal fade" id="remove">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span></button>-->
<!--                <h4 class="modal-title"><b>Supprimer la categorie</b></h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form class="form-horizontal" method="POST" action="operation/delete_categorie.php" enctype="multipart/form-data">-->
<!---->
<!--                    <input type="hidden" name="id" class="code">-->
<!--                    <h2 class='bold fullname'></h2>-->
<!---->
<!---->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>-->
<!--                        <button type="submit" class="btn btn-primary btn-flat" name="remove"><i class="fa fa-remove"></i> Supprimer</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!-- Add image -->
<div class="modal fade" id="remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Ajouter une image</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/add_image_categorie.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">

                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Image </label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" autocomplet="off" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-edit"></i> Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>






