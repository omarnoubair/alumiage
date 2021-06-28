<div class="body-container">
    <?php echo ( $this->session->getNotification());?>
<div class="login-container">
  <div class="row">
		<div>
    		<div class="panel panel-default">
                             
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Connectez-vous!</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" action="<?php echo BASE_URL.'/user/loginAction'?>">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Email" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block form-control" type="submit" value="Se connecter">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>