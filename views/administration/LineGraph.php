<html lang="fr">

    <?php
//    $i = 0;
//    $promo = 0;
//    $a = 'a';
//    $data = '';
//
//    for ($i = 0; $i < 10; $i++) {
//        if ($a == 'a') {
//            $data = $data . "'" . $a . "'";
//        } else {
//            $data = $data . "," . "'" . $a . "'";
//        }
//        $v = ord($a);
//        $v++;
//        $a = chr($v);
//    }
//    $data = $data . '';
//    echo $data;
//    ?>
    <!--    <link href="/ancien/c3/c3.css" rel="stylesheet" type="text/css">
    
         Load d3.js and c3.js 
        <script src="http://d3js.org/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/ancien/c3/c3.min.js" type="text/javascript"></script>
        <script src="/ancien/c3/d3.min.js" type="text/javascript"></script>
        <script src="/ancien/c3/d3.js" type="text/javascript"></script>-->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <head>

    </head>

    <body>
        <div class="col-sm-9 col-md-9">
            <div class="well">

                <div>
                    <fieldset>
                        <legend>Statistiques</legend>
                        <div id="graph" style="margin-top: 3em"></div>
                    </fieldset>
                </div>

            </div>
        </div>
    </body>

    <script type="text/javascript" >
        Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'graph',
            // Chart data records -- each entry in this array corresponds to a point
            // on the chart.
            data: <?php echo json_encode($pourcentage); ?>,
            xkey: 'y',
            ykeys: 'a',
            labels: ['Value'],
            parseTime: false,
            smooth: true,
            resize: true

        });
    </script>
</HTML>