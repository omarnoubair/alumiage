<div class="container">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0" style="width:70%" >
<?php foreach ($user as $u) { 
    $pseudo = $u->nom . "  " . $u->prenom;
}
?>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $pseudo; ?></h3>
            </div>
            <div class="panel-body" >
                <div class="row">
                    <?php foreach ($user as $u) { 
                        if($u->photo == NULL){
                        ?>
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                        <?php }else{
                            ?>
                     <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo BASE_URL . DS . 'docs' . DS. $u->photo ?>" class="img-circle img-responsive"> </div>
                        <?php } ?>
                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Nom</td>
                                        <td><?php echo $u->nom; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prenom</td>
                                        <td><?php echo $u->prenom; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pseudo </td>
                                        <td><?php echo $u->pseudo; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Numero de telephone</td>
                                        <td><?php echo $u->tel; ?></td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $u->mail; ?></td>
                                    </tr>



                                    </tr>

                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Les parcours -->

          
          
                <div id="parcours">
                    <h2 class="section-title pull-center">&nbsp; Parcours</h2>
                    <table id="Qtable" class="table table-striped table-bordered" style="width:90%;margin-left: 3em">
                        <thead>
                            <tr>
                                <th>Entreprise</th>
                                <th>Pays</th>
                                <th>Type Contrat</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Salaire</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">


                            <?php
                            if (!empty($parcours)) {
                                ?>
                                <?php foreach ($parcours as $q) { 
                                    if($q->masque == 0){
                                    ?>
                                        <td><?php echo $q->entreprise ?></td>
                                        <td><?php echo $q->pays ?></td>
                                        <td><?php echo $q->label ?></td>
                                        <td><?php echo $q->debut ?></td>
                                        <td><?php echo $q->fin ?></td>
                                        <td><?php echo $q->salaire." €" ?></td>
                                    </tr>
                                    <?php
                                }
                                }
                            }
                            ?>

                    </tbody>
                </table>

            </div> 
        </div>
    </div>
</div>
</div>