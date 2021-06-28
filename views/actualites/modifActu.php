
<div class="col-sm-9 col-md-8">
    <div class="well">
    <?php echo ( $this->session->getNotification()); ?>
    <h1 class="section-title"> Modifier l'actualité</h1> <?php 
foreach ($event as $e){
    $id = $e->id;
    $titre = $e->titre;
    $desc = $e->desc;
    $image = $e->image;
}
?>
    <form id="question-form"class="question form-horizontal" method="post" action="<?php echo BASE_URL . "/actualites/ModifActuAction/" .$id ?>">
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">Titre</label>
            <div class="col-md-4 control-label">
                <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" value="<?php echo $titre; ?>">  
            </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-0">
                <textarea rows="0" name="description" id="description" class="form-control required " ><?php echo $desc; ?></textarea>
            </div>
        </div>

        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-4 control-label" for="document">Image</label>
            <div class="col-md-4">
<!--                <input id="document" name="document" class="input-file" type="file">-->
                <input type="file" name="document" id="document" class="input-file" value="<?php echo $image; ?>">
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
</div>

</div>
</div>

</div>
</div>
