<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">

        <link href="<?php echo CSS . '/mycss.css'?>" rel="stylesheet" type="text/css"/>
        <link href="../../webroot/css/mycss.css" rel="stylesheet" type="text/css"/>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        

    </head>
    <body>
        
        
        
        <div class="container">
    <div class="row  col-md-9 col-md-offset-1 custyle ">
            <h3>Liste des Professeurs</h3>
            <div class="row  col-md-8 col-md-offset-2 custyle " style="margin-left: 3em;margin-top: auto;"><br>
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h2 class="panel-title">Professeur</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter">
                                <span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <table class="table" >
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
                                <th><input type="text" class="form-control" placeholder="E-mail" disabled></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allprof as $t) {
                                ?>
                                <tr>
                                    <td>
                        <a class="" href="<?php echo BASE_URL . '/course/showCourseStudent/' . $t->id ?>"><?php
                                        echo $t->nom . " " . $t->prenom;
                                        ?>
                                    </a>
                                    </td>
                                    <td>
                                        <?php echo $t->mail; ?>
                                    </td>
                                    
                                </tr>
                                
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div></div>
        <script type="text/javascript">
            /*
             Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
             */
            $(document).ready(function () {
                $('.filterable .btn-filter').click(function () {
                    var $panel = $(this).parents('.filterable'),
                            $filters = $panel.find('.filters input'),
                            $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function (e) {
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9')
                        return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                            inputContent = $input.val().toLowerCase(),
                            $panel = $input.parents('.filterable'),
                            column = $panel.find('.filters th').index($input.parents('th')),
                            $table = $panel.find('.table'),
                            $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function () {
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
                    }
                });
            });
        </script>
    </body>
</html>
