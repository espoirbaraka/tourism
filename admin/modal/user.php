<!-- Edit password -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Editer le mot de passe</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/edit_user_password.php" enctype="multipart/form-data">
                <input type="hidden" name="id" class="code">
              <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" id="password" class="form-control">
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
<div class="modal fade" id="adduser">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" style="text-align: center;"><b>Ajouter utilisateur</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_user.php" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="username" class="col-sm-3 control-label">Nom d'utilisateur</label>
                      <div class="col-sm-9">
                          <input type="text" id="username" name="username" autocomplet="off" class="form-control" required>
                      </div>
                  </div>
                <div class="form-group">
                    <label for="etiquette" class="col-sm-3 control-label">Mail</label>
                    <div class="col-sm-9">
                      <input type="email" id="mail" name="mail" autocomplet="off" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-9">
                      <input type="password" id="password" name="password" class="form-control"  autocomplet="off" required>
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
              <h4 class="modal-title"><b>Supprimer l'utilisateur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_user.php" enctype="multipart/form-data">
                
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



     