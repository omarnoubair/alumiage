<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Installation de la plateforme</title>



        <link href="<?php echo CSS . DS . 'bootstrap3.css' ?>" rel="stylesheet" media="screen">


    <div id="wrap">



        <div class="navbar navbar-googlebar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">


                    <div class="nav-collapse">
                        <ul class="nav">
                        </ul>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <p class="dropdown-toggle navbar-text" data-toggle="dropdown" id="userDrop">
                                    <span class="icon-bar"></span>
                                    <a href="#"></a>
                                    <b class="caret"></b>
                                </p>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-home"></i> </a></li>				
                                </ul>
                            </li>
                        </ul></div>
                </div>


            </div>

        </div>

        <div class="container">
            <div class="l_content">


                <div id="wrap">
                    <div class="container">
                        <div class="page-header">
                            <h4>Début d'installation</h4>
                            <h4>   <?php echo ( $this->session->getNotification()); ?></h4>
                        </div>
                        <div class="row">
                            <div class="span6">
                                <form class="form-horizontal" method="post" action="<?php echo BASE_URL . '/setup/installAction' ?>">
                                    <h5 class="alert alert-info">Votre dossier /configuration doit être accessible en écriture </h5>
                                    <fieldset>
                                        <legend><small>Saisir les infos de la base de données</small></legend>
                                        <div class="control-group">
                                            <label class="control-label" for="dbHost">Nom du host</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="host" name="host" value="" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="dbName">Nom de la base de données</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="base" name="base" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="dbUser">Nom d'utilisateur</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="user" name="user" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="dbPass">Mot de passe</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="pass" name="pass" value="">
                                            </div>
                                        </div>
                                    </fieldset>
                            </div>
                            <div class="span5 offset1">

                                <fieldset>
                                    <legend><small>Compte d'administrateur</small></legend>
                                    <div class="control-group">
                                        <label class="control-label" for="adminUser">Email d'administrateur</label>
                                        <div class="controls">
                                            <input type="email" class="input-large" id="adminUser" name="adminUser" value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="adminPass">Mot de passe</label>
                                        <div class="controls">
                                            <input type="text" class="input-large" id="adminPass" name="adminPass" value="">
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="pull-right btn btn-primary">Installer</button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="push"></div>
</div>

<div id="footer">
    <div class="container">
        <br />

    </div>
</div>



<script src="<?php echo JS . DS . 'jquery.js' ?>"></script>
<script src="<?php echo JS . DS . 'bootstrap3.js' ?>"></script>


</body>
</html>