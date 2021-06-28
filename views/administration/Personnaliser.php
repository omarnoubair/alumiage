<html lang="fr">
    
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
        <div class="well" >
        <h3> Statistiques </h3>
        <div style="margin-top:3em; margin-left: 5em">
            <form method="post" action="<?php echo BASE_URL . "/stats/PersonnaliserAction/"?>" >
                <h4>Type de graphe </h4><br>
                <input type="radio" name="type" value="1"><img src="<?php echo IMG ."/Bar.png"?>" alt="barre" style="width:100px;height:100px">
                <input type="radio" name="type" value="2"><img src="<?php echo IMG ."/Line.png"?>" alt="ligne" style="width:100px;height:100px">
                <input type="radio" name="type" value="3"><img src="<?php echo IMG ."/Donut.png"?>" alt="donut" style="width:100px;height:100px">
                <br><br><h4>Requête SQL</h4><br>
                <input  name="sql" id="sql" value="" class="form-control" placeholder="SQL Query" type="text" style="width:100%">
                <br><br><input type="submit" value="Valider" class="btn btn-primary  pull-right"><br><br>
                
            </form>
        </div>
       
    </div>
    </div>
    </body>
    </HTML>