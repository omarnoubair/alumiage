<html lang="fr">

<head>

</head>

<body>
    <div class="container">
    <div class="row  col-md-9 col-md-offset-1 custyle ">
        <div class="well">
        <legend>Liste des étudiants</legend><br>
    <table class="table table-striped custab " style="margin-top: auto">
    <thead>
        <tr>
            <tr>     
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Numero de Telephone</th>
                <th >Action</th>
        </tr>
    </thead>
    
        <?php
            foreach ($StudentList as $prof) {
                ?>
                <tr>
                    <td><?php echo $prof->nom ?></td>
                    <td><?php echo $prof->prenom ?></td>
                    <td><?php echo $prof->mail ?></td>
                    <td><?php echo $prof->tel ?></td>
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/administration/deleteUser/' . $prof->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer ce professeur?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
                </tr>

            <?php } ?>   
    </table>
        </div>
    </body>
    </HTML>