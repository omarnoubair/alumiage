<div class="body-container">
         <?php echo ( $this->session->getNotification());?>
<div class="register-container">
    <div class="col-sm-9 col-md-9">
        <div class="well">
      
            <form class="form-horizontal" id="register" method="post" action="<?php echo BASE_URL."/user/registerAction"?>">
                  <fieldset>

                    <legend>Inscrivez-vous!</legend>

                    <div class="form-group">
                        <label class="control-label">Prénom</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge form-control" id="last_name" name="first_name" rel="popover">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nom</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge form-control" id="last_name" name="last_name" rel="popover">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Pseudo</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge form-control" id="username" name="username" rel="popover">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge form-control" id="email" name="email" rel="popover" d="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge form-control" id="password" name="password" rel="popover">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Confirmer votre mot de passe</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge form-control" id="cpassword" name="cpassword" rel="popover">
                        </div>
                    </div>
                

                    <div class="form-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success" name="submit" value="ok">S'inscrire</button>
                        </div>
                    </div>



                </fieldset>
            </form>
        </div></div>


</div>
</div>
	