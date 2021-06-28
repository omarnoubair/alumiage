<div class="col-sm-7 col-md-7">
    <div class="well">
        <h3> Ajouter un parcours </h3>



        <form class="form-horizontal" id="changepswd" method="post" action="<?php echo BASE_URL . "/parcour/AddparcourAction/" . $this->session->read('user')->id ?>">
          
                <div class="form-group">
                    <label class="control-label">Entreprise</label>
                    <div class="controls">
                        <select name="ste"  class="form-control input-md" required="">
                            <?php foreach ($parcours as $p){ ?>
                            <option value="<?php echo $p->id_ste ?>"><?php echo $p->nom_ste ?></option>
                            <?php } ?>
                        </select>
                        <br><a href="<?php echo BASE_URL."/parcour/addSte"?>" class="btn btn-primary btn-xs pull-right"><b>+</b>Ajouter </a><br>
                    </div>
                </div>
            
            <div class="form-group">
                    <label class="control-label">Pays</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="pays" name="pays" rel="popover">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Ville</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge form-control" id="ville" name="ville" rel="popover">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Date début</label>
                    <div class="controls">
                        <input id="start" type="date" class="input-xlarge form-control" id="db" name="db" rel="popover">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Date fin</label>
                    <div class="controls">
                        <input id="end" type="date" class="input-xlarge form-control" id="df" name="df" rel="popover">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Type de contrat</label>
                    <div class="controls">
                        <select name="type"  class="form-control input-md" required="">
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
                        <input type="text" class="input-xlarge form-control" id="salaire" name="salaire" rel="popover">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Masquer ce parcours</label> &nbsp;&nbsp;&nbsp;
                    <input  type="checkbox" name="masquer"><br>
                </div>


                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-success" name="changeOk" >Ajouter</button>
                    </div>
                </div>



        </form>

    </div>
</div>
