<!-- remove -->
<div class="modal fade" id="remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Supprimer le commentaire de</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="operation/delete_comment.php" enctype="multipart/form-data">

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



