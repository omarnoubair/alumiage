<html lang="fr">

    <head>

    </head>

    <body>
        <div class="container">
            <div class="row  col-md-9 col-md-offset-1 custyle ">
                <div class="well">
                <legend>Liste des actualités</legend>
                <table class="table table-striped custab ">
                    <thead>
                        <tr>     
                            <th>Titre</th>
                            <th>Description</th>
                            <th >Action</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($allevent as $event) {
                        ?>
                        <tr>
                            <td style="width:20%"><?php echo $event->titre ?></td>
                            <td style="width:60%"><?php echo $event->desc ?></td>
                            <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/actualites/ModifActu/' . $event->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Modifier</a></td>
                            <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/actualites/DeleteActu/' . $event->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet actualité?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
                        </tr>

                    <?php } ?>   

                </table>
            </div>
            </div>
        </div>
    </body>