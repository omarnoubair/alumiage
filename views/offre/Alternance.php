<html lang="fr">

<head>

</head>

<body>
    <div class="container">
    <div class="row  col-md-9 col-md-offset-1 custyle ">
        <div class="well">
        
            <h3 class="section-title" style="color: #204d74; margin-left: auto;">Liste des alternances</h3> 
    <table class="table table-striped custab " style="margin-top:0">
    <thead>
        <?php if ($this->session->checkAncien()) { ?>
    <a href="<?php echo BASE_URL."/offres/add/8"?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter une altérnance</a><br>
        <?php } ?>
        <tr>
            <tr>   
                <th>Responsable</th>
                <th>type</th>
                <th>titre</th>
                <th>mission</th>
                <th>Action</th>
        </tr>
    </thead>
    
        <?php
            foreach ($allstage as $stage) {
                
                ?>
                <br>
                <tr>
                    <td><?php echo $stage->mail ?></td>
                    <td><?php echo $stage->type ?></td>
                    <td><?php echo $stage->titre ?></td>
                    <td><a  href ="<?php echo BASE_URL."/offres/detail/" . $stage->id ?>"><?php echo $stage->pdf ?></a></td>
<?php if($stage->uti == $this->session->read('user')->id){
                        ?>
                    <td class="text-center" width="195px">
                        <a href="<?php echo BASE_URL . '/offres/Modif/' . $stage->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                        <a href="<?php echo BASE_URL . '/offres/Delete/' . $stage->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet événement?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                    </td>
            <?php }else{ ?>   
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/offres/detail/' . $stage->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Learn More</a></td>
            <?php } ?>                </tr>

            <?php } ?>   
        
    </table></div>
    </div>
    </div>
    </body>
    </HTML>