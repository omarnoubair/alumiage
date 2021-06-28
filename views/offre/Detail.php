
        <?php
        $iduser = $this->session->user("id");  
        $nom = "";
        $mail = "";
        $titre = "";
        $doc = "";
        foreach ($showoffre as $t) {
            $nom = $t->nom . "  " . $t->prenom;
            $mail = $t->mail;
            $titre = $t->titre;
            $doc = $t->docs;
        }   
        
        ?>
            
        <div class="col-sm-9 col-md-8">
            <div class="well">
               
                

                <?php
                        echo '<br> <br> <br>';
                    echo '<h3><span style="color:black;">Titre : </span>' . $titre . '</h3><br>';
                    echo "<h4>Veuillez contacter  " . $nom . " en utilisant l'adresse mail : " .$mail. "</h4><br>";

                
                ?>
            </div>
        <iframe src="<?php echo BASE_URL . DS . 'docs' . DS . $doc ?>" width="700px" height="600px" />
        </div>