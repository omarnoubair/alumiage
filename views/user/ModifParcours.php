<?php 
foreach($parcours as $p){
    
    $idp = $p->id;
    $entreprise = $p->nom_ste;
    $pays = $p->pays;
    $ville = $p->ville;
    $debut = $p->debut;
    $fin = $p->fin;
    $type = $p->type;
    $salaire = $p->salaire;
    $masquer = $p->masque;
    
}
?>


<div class="col-sm-7 col-md-7">
    <div class="well">
        <h3> Modifier le parcours </h3>



        <form class="form-horizontal" id="changepswd" method="post" action="<?php echo BASE_URL . "/parcour/EditparcourAction/" . $idp ?>">
          
                <div class="form-group">
                    <label class="control-label">Entreprise</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="sye" name="ste" rel="popover" value="<?php echo $entreprise ;?>" disabled="true">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Pays</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="pays" name="pays" rel="popover" value="<?php echo $pays ;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Ville</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="ville" name="ville" rel="popover" value="<?php echo $ville ;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Date début</label>
                    <div class="controls">
                        <input id="start" type="date" class="input-xlarge form-control" id="db" name="db" rel="popover" value="<?php echo $debut ;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Date fin</label>
                    <div class="controls">
                        <input id="end" type="date" class="input-xlarge form-control" id="df" name="df" rel="popover" value="<?php echo $fin ;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Type de contrat</label>
                    <div class="controls">
                        <select name="type"  class="form-control input-md" required="" value="<?php echo $type ;?>">
                            <option value="6">CDD</option>
                            <option value="7">CDI</option>
                            <option value="8">Alternance</option>
                            <option value="5">Stage</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Salaire (€)</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="salaire" name="salaire" rel="popover" value="<?php echo $salaire;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Masquer ce parcours</label> &nbsp;&nbsp;&nbsp;
                    <input  type="checkbox" name="masquer"  value="<?php echo $masquer ;?>"><br>
                </div>


                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-success" name="changeOk" >Modifier</button>
                    </div>
                </div>



        </form>

    </div>
</div>
