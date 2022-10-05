<!-- Paiement -->
<div class="modal fade" id="payer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Effectuer le paiement de <span class="fullname"></span> (<span class="site" style="color: rgba(255,0,0,0.73); "></span>)</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="operation/paiement_reservation.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="code">

                    <div class="form-group">
                        <label for="text" class="col-sm-3 control-label">Montant($)</label>
                        <div class="col-sm-8">
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-primary btn-flat" name="payer"><i class="fa fa-edit"></i> Payer</button>
                </form>
            </div>
        </div>
    </div>
</div>






