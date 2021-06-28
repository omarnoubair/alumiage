<div class="body-container" style="margin-left: 18%;">
    <div class="admin-panel-container" >


        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo BASE_URL . '/user/index/0' ?>"><span class="glyphicon glyphicon-home"></span>
                                Accueil</a>
                        </h4>

                    </div>
                <?php if ($this->session->checkAdmin()) { ?>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-list-alt">
                                    </span>Administration</a>
                            </h4>

                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/administration/manageProfs' ?>">Gérer les professeurs</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/administration/manageStudents' ?>">Gérer les étudiants</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/administration/manageMMA' ?>">Gérer les MMA</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/administration/manageAnciens' ?>">Gérer les anciens</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/administration/stats' ?>">Statistiques</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                                    </span>Actualités</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . '/actualites/createActu' ?>">Ajouter une actualité</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/actualites/AllActu' ?>">Gérer l'actualité</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-list-alt">
                                    </span>Evénements</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . '/Evenement/createEvent' ?>">Créer un évenement</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/Evenement/Allevent' ?>">Gérer les évenements</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                <?php } ?>

                <?php if ($this->session->checkProf()) { ?>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-list-alt">
                                    </span>Projets</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . '/offres/addp/' ?>">Ajouter un projet</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/projet/' ?>">lister les projets</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                                    </span>Evenements</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/evenement/All/0' ?>">Liste des évenements</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                <?php } ?>

                <?php if ($this->session->checkStudent()) { ?>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-list-alt">
                                    </span>Offres</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/5' ?>">Stages</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/8' ?>">Alternances</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/9' ?>">Emplois</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/projet/' ?>">Projets</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                                    </span>Evenements</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/evenement/All/0' ?>">Liste des évenements</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                <?php } ?>

                <?php if ($this->session->checkAncien()) { ?>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                                    </span>Mon parcours</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . "/parcour/Addparcour/" . $this->session->read('user')->id; ?>">Ajouter</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/parcour/EditParcours' ?>">Gérer mon parcours</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-list-alt">
                                    </span>Offres</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/5' ?>">Stages</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/8' ?>">Alternances</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/select/9' ?>">Emplois</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/offres/projet/' ?>">Projets</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                                    </span>Evenements</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/evenement/All/0' ?>">Liste des évenements</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                <?php } ?>

                <?php if ($this->session->checkMma()) { ?>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-list-alt">
                                    </span>Evenements</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . '/Evenement/createEvent' ?>">Créer un évenement</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=" glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/Evenement/AllEvent' ?>">Gérer les évenements</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                <?php } ?>


                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><span class="glyphicon glyphicon-user">
                                </span>Annuaire</a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><?php $iduser = $this->session->user("id"); ?>
                                        <span class="glyphicon   glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/user/ancien/'?>">Anciens</a>
                                    </td>                           
                                </tr>
                                <tr>
                                    <td><?php $iduser = $this->session->user("id"); ?>
                                        <span class="glyphicon  glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/user/professeur/'?>">Professeurs</a>
                                    </td>                           
                                </tr>
                                <tr>
                                    <td><?php $iduser = $this->session->user("id"); ?>
                                        <span class="glyphicon  glyphicon glyphicon-cog text-primary"></span><a href="<?php echo BASE_URL . '/user/entreprise/'?>">Entreprises</a>
                                    </td>                           
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-user">
                                </span>Mon Compte</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><?php $iduser = $this->session->user("id"); ?>
                                        <span class="glyphicon  glyphicon-plus text-primary"></span><a href="<?php echo BASE_URL . '/user/monEspace/' . $iduser ?>">Profil</a>
                                    </td>                           
                                </tr>
                                <tr>
                                    <td>
                                        <span ></span><a href="<?php echo BASE_URL . "/user/monEspaceModif/" . $this->session->read('user')->id; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" ><i class="glyphicon glyphicon-edit"></i> Modifier compte</a>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>