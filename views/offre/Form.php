
<div class="col-sm-9 col-md-8">
    <div class="well">
<!--    <h1 class="section-title"> Créer Un </h1> -->
    <?php 
    
    foreach($type as $t){
    $id = $t->id_label;
    $label = $t->label;
        
    }
    ?>
    <form id="question-form"class="question form-horizontal" method="post" action="<?php echo BASE_URL . "/offres/addaction/".$this->session->read('user')->id ?>" enctype="multipart/form-data">
        <!-- Text input-->
        <br>
        <legend>Créer un offre de <?php echo $label;?></legend>
        
        <input type="hidden" name="type" value="<?php echo $id;?>" /> 
        
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">Sujet</label>
            <div class="col-md-4 control-label">
                <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" >  
            </div>
        </div>

        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-4 control-label" for="file">PDF :</label>
            <div class="col-md-4">
<!--                <input id="document" name="document" class="input-file" type="file">-->
                <input type="file" name="file" id="document" class="input-file"  >
            </div>
        </div> 
        <?php if($id == 10){
             ?>
        <div class="form-group">
            <label class="col-md-4 control-label" for="file">Etudiant </label>
        
            <div class="col-md-4">
        <select name="etudiant"  class="form-control input-md" required="">
     <?php foreach ($etudiant as $e){
            ?>
        
                                        <option value="<?php  echo $e->id;?>"><?php  echo $e->nom . " " . $e->prenom;?></option>
     <?php } ?>
                                    </select>
            </div>
        </div> 
        <?php } ?>
        <div class="form-group">
            <div class="form-group col-md-11">
                <input id="evaluationTitleSubmit"type="submit" value="valider" class="btn btn-primary  pull-right">
            </div>
        </div>
    </form>


</div>

</div>