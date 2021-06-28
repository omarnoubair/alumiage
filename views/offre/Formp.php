
<div class="col-sm-9 col-md-8">
    <div class="well">
        <!--    <h1 class="section-title"> Créer Un </h1> -->

        <form id="question-form"class="question form-horizontal" method="post" action="<?php echo BASE_URL . "/offres/addaction/" . $this->session->read('user')->id ?>" enctype="multipart/form-data">
            <!-- Text input-->
            <br>
            <legend>Créer un Projet</legend>


            <div class="form-group">
                <label class="col-md-4 control-label" for="titre">Sujet</label>
                <div class="col-md-4 control-label">
                    <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" >  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="titre">Etudiant réalisateur</label>
                <div class="col-md-4 control-label">
                    <select name="std"  class="form-control input-md" required=""style="width: 150%">
                        <option>-- Selectionner l'étudiant--</option>

                        <?php foreach ($etudiant as $u) {
                                ?>
                                <option value="<?php echo $u->id; ?>"><?php echo $u->nom . " " . $u->prenom; ?></option>
                            <?php
                        }
                        ?>
                    </select> 
                </div>
            </div>
            <!-- File Button --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="file">Cahier de charge :</label>
                <div class="col-md-4">
    <!--                <input id="document" name="document" class="input-file" type="file">-->
                    <input type="file" name="file" id="document" class="input-file"  >
                </div>
            </div> 
            <div class="form-group">
                <div class="form-group col-md-11">
                    <input id="evaluationTitleSubmit"type="submit" value="valider" class="btn btn-primary  pull-right">
                </div>
            </div>
        </form>


    </div>

</div>