<html lang="fr">

<head>

</head>

<body>
    <div class="container" style="margin-top: 0 auto">
    <div class="row  col-md-9 col-md-offset-1 custyle " >
        <div class="well">
        <legend>Mes parcours</legend><br>
    <table id="Qtable" class="table table-striped table-bordered" style="width:99%;margin-left: 0 auto">
                        <thead>
                            <tr>
                                <th style="text-align: center">Entreprise</th>
                                <th style="text-align: center">Pays</th>
                                <th style="text-align: center">Type Contrat</th>
                                <th style="text-align: center">Date Début</th>
                                <th style="text-align: center">Date Fin</th>
                                <th style="text-align: center">Salaire</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">


                            <?php
                            if (!empty($parcours)) {
                                ?>
                                <?php foreach ($parcours as $q) { 
                                    ?>
                                        <td><?php echo $q->nom_ste ?></td>
                                        <td><?php echo $q->pays ?></td>
                                        <td><?php echo $q->label ?></td>
                                        <td><?php echo $q->debut ?></td>
                                        <td><?php echo $q->fin ?></td>
                                        <td><?php echo $q->salaire." €" ?></td>
                                        <td class="text-center"><a href="<?php echo BASE_URL . '/parcour/ModifParcours/' . $q->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                                        <a href="<?php echo BASE_URL . '/parcour/DeleteParcours/' . $q->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet élement?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
               
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                    </tbody>
                </table></div>
    </div>
    </div>
    </body>
    </HTML>