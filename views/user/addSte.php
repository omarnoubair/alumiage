<div class="col-sm-7 col-md-7">
    <div class="well">
        <h3> Ajouter une entreprise </h3>



        <form class="form-horizontal" id="changepswd" method="post" action="<?php echo BASE_URL . "/parcour/AddSteAction/"?>">
          
               
                
                <div class="form-group">
                    <label class="control-label">Nom de l'entreprise</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="nom_ste" name="nom_ste" rel="popover" placeholder="Société">
                    </div>
                </div>
            
            <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="adr" name="adr" rel="popover" placeholder="7 Rue du Meunier">
                    </div>
                </div>
            
            <div class="form-group" style="width: 50%">
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="pays" name="pays" rel="popover" placeholder="Pays">
                    </div>
                </div>
            
            <div class="form-group" style="width: 25%">
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="codep" name="codep" rel="popover" placeholder="Code Postal">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label">Statut de l'entreprise</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="statut" name="statut" rel="popover" placeholder="Ex : (SA, SARL, ..)">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label">Telephone de l'entreprise</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="tel" name="tel" rel="popover" placeholder="Tél">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label">Mail de l'entreprise</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="mail" name="mail" rel="popover" placeholder="mail@entreprise.fr">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label">Site web</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="siteweb" name="siteweb" rel="popover" placeholder="www.exemple.fr">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label">Résponsable</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="responsable_mail" name="responsable_mail" rel="popover" placeholder="responsable@entreprise.fr">
                    </div>
                </div>
            <div class="form-group" style="width: 50%">
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="responsable_tel" name="responsable_tel" rel="popover" placeholder="Tél">
                    </div>
                </div>
                

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls" >
                        <button type="submit" class="btn btn-success" name="changeOk" >Ajouter</button>
                    </div>
                </div>



        </form>

    </div>
</div>
