

<!----------- SECONNECTER -------------->
<a name="seconnecter"></a>
<div class="intro-header"> 
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <div class="intro-message">
                    <div class="account-wall">
                        <img  src="images/logo.png" alt="" width="120" height="80">
                        <!--                                <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                                                  <hr class="colorgraph"><br>-->
                        <form class="form-signin" action="user/loginAction" method="post">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de pass" required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
                            <a href="#" class="pull-right need-help"> </a><span class="clearfix"></span>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->

<!----------- INSCRIPTION -------------->

<a  name="inscription"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">

                <div class="inscrivez-vous">
                    <h2>Inscrivez-vous maintenant !</h2>
                    <ul>
                        <li>
                            <p><span>&nbsp;&nbsp;</span>
                                Faites un retour en arrière et rappelez vous de la MIAGE.</p>
                        </li>
                        <li>
                            <p><span>&nbsp;&nbsp;</span>
                                Trouvez des offres et projets interessants !</p>
                        </li>
                        <li>
                            <p><span>&nbsp;&nbsp;</span>
                                Restez en contact avec la génération future.</p>
                        </li>
                        <li>
                            <p><span>&nbsp;&nbsp;</span>
                                Rejoignez-nous dès maintenant et retrouvez vos anciens amis!</p>
                        </li>
                    </ul>
                </div>                
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6"> <!-- INSCRIPTION -->
                <!--<img class="img-responsive" src="images/ipad.png" alt=""> -->
                <legend>Inscrivez-vous</legend>
                <div class="inscription" >

                    <form class="form-horizontal" id="register" method="post" action="<?php echo BASE_URL . "/user/registerAction" ?>">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="" name="lastname" type="text" placeholder="Nom" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="" name="firstname" type="text" placeholder="Prenom" class="form-control input-md" required="">

                                </div>
                            </div>
                            
                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control input-md" required="" >

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="" name="pseudo" type="text" placeholder="Nom utilisateur" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="" name="password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-11">
                                    <select name="role"  class="form-control input-md" required="">
                                        <option value="4">Etudiant</option>
                                        <option value="3">Ancien</option>
                                        <option value="2">MMA</option>
                                        <option value="1">Professeur</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">

                                <div class="col-md-11">
                                    <input id="" name="promo" type="text" placeholder="Promotion (Ancien ou Etudiant)" class="form-control input-md" >

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-11">
                                    <input type="checkbox" name="nobot" required="true"> Je confirme ne pas être un robot

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">

                                <div class="col-md-11">
                                    <button  type="submit" name="submit"  id="" class="btn btn-primary">      Enregistrer    </button>
                                </div>
                            </div>

                        </fieldset>
                    </form>                        
                </div> 
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->


<!-- /.content-section-b -->

<!-- /.content-section-a -->

<a  name="contact"></a>
<div class="banner">

    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <h2>Suivez nous sur :</h2>
            </div>
            <div class="col-lg-4">
                <ul class="list-inline banner-social-buttons">
                    <li>
                                                    <!--<a href="https://www.facebook.com/english.jokes/" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>-->
                        <a href="https://www.facebook.com/groups/MiageMulhouseAssiociation/?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->
