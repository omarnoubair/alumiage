<html lang="fr">

<head>

</head>

<body>
    <div class="container">
    <div class="row  col-md-9 col-md-offset-1 custyle ">
        <div class="well">
            <h3 class="section-title" style="color: #204d74; margin-left: auto;">Liste des projets</h3> 
    <table class="table table-striped custab " style="margin-top:0">
    <thead>
       <tr>
            <tr>   
                <th>Responsable</th>
                <th>Réalisateur</th>
                <th>Sujet</th>
                <th>Document</th>
        </tr>
    </thead>
    
        <?php
            foreach ($allstage as $stage) {
                
                ?>
                <br>
                <tr>
                    <td><?php echo $stage->nom . " " . $stage->prenom ?></td>
                    <td><?php echo $stage->nom1 . " " . $stage->prenom1 ?></td>
                    <td><a  href ="<?php echo BASE_URL."/offres/detailp/" . $stage->id ?>"><?php echo $stage->sujet ?></a></td>
                    <td><?php echo $stage->file ?></td>
<?php if($stage->uti == $this->session->read('user')->id){
                        ?>
                    <td class="text-center" width="30px">
                        <a href="<?php echo BASE_URL . '/offres/Modifp/' . $stage->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                        <a href="<?php echo BASE_URL . '/offres/Deletep/' . $stage->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet événement?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                    </td>
               
            <?php }else{ ?>   
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/offre/detail/' . $stage->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Learn More</a></td>
            <?php } ?>                </tr>
                </tr>

            <?php } ?>   
        
    </table></div>
    </div>
    </div>
    </body>
    </HTML>