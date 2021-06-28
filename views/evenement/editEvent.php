<html lang="fr">

<head>

</head>

<body>
    <div class="container" >
    <div class="row  col-md-9 col-md-offset-1 custyle ">
        <div class="well">
        <legend>Liste des évenements</legend>
    <table class="table table-striped custab " style="margin-top: 0em">
    <thead>
        <tr>
            <tr>     
                <th>Titre</th>
                <th>Date</th>
                <th>Description</th>
                <th >Action</th>
        </tr>
    </thead>
    
        <?php
            foreach ($allevent as $event) {
                ?>
                <tr>
                    <td style="width:15%"><?php echo $event->titre ?></td>
                    <td style="width:15%"><?php echo $event->date ?></td>
                    <td style="width:50%"><?php echo $event->desc ?></td>
                    <?php if($event->id_user == $this->session->read('user')->id){
                        ?>
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/evenement/ModifEvent/' . $event->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Modifier</a></td>
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/evenement/DeleteEvent/' . $event->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet événement?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
               
            <?php }else{ ?>   
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/evenement/detail/' . $event->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Learn More</a></td>
            <?php } ?>
                </tr>

            <?php } ?>   
        
    </table></div>
    </div>
    </div>
    </body>