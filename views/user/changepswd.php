    <div class="col-sm-7 col-md-7">
            <div class="well">
                <h3> Changer Votre Mot de passe</h3>


        
            <form class="form-horizontal" id="changepswd" method="post" action="<?php echo BASE_URL."/user/changePasswordAction/".$this->session->read('user')->id?>">
                  <fieldset>

                    <div class="form-group">
                        <label class="control-label">Votre mot de passe actuel</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge form-control" id="passwordA" name="passwordA" rel="popover">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Votre nouveaux mot de passe</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge form-control" id="password" name="password" rel="popover">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Confirmer votre mot de passe</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge form-control" id="passwordC" name="passwordC" rel="popover">
                        </div>
                    </div>
                


                    <div class="form-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success" name="changeOk" >Changer le mot de passe</button>
                        </div>
                    </div>



            </form>
    
                    </div>
        </div>

            </div>
        </div>
  
</div>
    </div>