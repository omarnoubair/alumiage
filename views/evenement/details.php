<?php
foreach ($actu as $e) {
    $id = $e->id;
    $titre = $e->titre;
    $desc = $e->desc;
    $image = $e->image;
    $date = $e->date;
}
?>

<div class="col-sm-9 col-md-8">
    <div class="well" style="width:150%;">

        <h1 class="section-title"> <?php echo $titre  ?></h1> 
            <div style="text-align: center;"><img src="<?php echo BASE_URL . DS . 'docs' . DS. $image ?>" alt="<?php echo $image ; ?>" width="800" height="500" >
            </div>
<br/>
<h3>Date <b><?php echo $date;?></b> </h3>

<br/>
<br/>
<br/>
        <?php
        echo $desc ;
        ?>
</div>
    </div>
