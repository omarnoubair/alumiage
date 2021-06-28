<div class="container">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0   " >


        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->session->read('user')->pseudo; ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php foreach ($user as $u) { 
                        if($u->photo == NULL){
                        ?>
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                        <?php }else{
                            ?>
                     <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo BASE_URL . DS . 'docs' . DS. $u->photo ?>" class="img-circle img-responsive"> </div>
                        <?php } ?>
                        <div class=" col-md-9 col-lg-9 "><table class="table table-user-information" >
                                <form class="form-horizontal" method="Post" action="<?php echo BASE_URL . "/user/monEspaceModifAction/" . $this->session->read('user')->id; ?>" enctype="multipart/form-data"/>
                                  
                                    <tbody>
                                        <tr>
                                            <td>Nom</td>
                                            <td><input  name="nom" id="nom" value="<?php echo $u->nom; ?>" class="form-control"
                                                        placeholder="nom"></td>

                                        </tr>
                                        
                                        <tr>
                                            <td>Prenom</td>
                                            <td><input  name="prenom" id="prenom" value="<?php echo $u->prenom; ?>" class="form-control" 
                                                        placeholder="prenom"></td>

                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Pseudo </td>
                                            <td><input  name="pseudo" id="pseudo" value="<?php echo $u->pseudo; ?>" class="form-control" 
                                                        placeholder="Pseudo"></td>

                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Numero de telephone</td>
                                            <td><input  name="tel" id="tel" value="<?php echo $u->tel; ?>" class="form-control" 
                                                        placeholder="0123456789"></td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="nom" name="mail" id="email" value="<?php echo $u->mail; ?>" class="form-control"
                                                       placeholder="somebody@example.com"></td>

                                        </tr>
                                       
                                        <tr>
                                            <td>Mot de Passe </td>
                                            <td>
                                                <a href="<?php echo BASE_URL . "/user/ChangePassword/" . $this->session->read('user')->pseudo; ?>"
                                                   class="btn btn-primary btn-xs pull-right"> Modifier Votre mot de passe </a>
                                            </td>
                                        </tr>
                                        <?php if ($u->role == 4 || $u->role == 3) { ?>

                                        <tr>
                                            <td>Promotion</td>
                                            <td><input type="nom" name="promo" id="promo" value="<?php echo $u->promo; ?>" class="form-control"
                                                       placeholder="2000"></td>

                                        </tr>
                                    <?php } ?>
                                        <tr>
                                            <td>Image</td>
                                            <td><input type="file" name="photo" id="email"  class="form-control"></td>

                                        </tr>

                                        </tr>

                                    </tbody>
                                </table>


                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" id="ValiderBtn" name="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i>Valider vos Modifications</button>
                <?php } ?>

            </div>
            </form>
        </div>
    </div>
</div>
</div>