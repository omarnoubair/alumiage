
        <?php
        $iduser = $this->session->user("id");  
        $nom = "";
        $mail = "";
        $nom1 = "";
        $mail1 = "";
        $titre = "";
        $doc = "";
        foreach ($showoffre as $t) {
            $nom = $t->nom . "  " . $t->prenom;
            $mail = $t->mail;
        $nom1 = $t->nom1 . "  " . $t->prenom1;
        $mail1 = $t->mail1;
            $titre = $t->titre;
            $doc = $t->file;
        }   
        
        ?>
            
        <div class="col-sm-9 col-md-8">
            <div class="well">
               
                

                <?php
                        echo '<br> <br> <br>';
                    echo '<h3><span style="color:black;">Titre : </span>' . $titre . '</h3><br>';
                    echo "<h4>Veuillez contacter le professeur " . $nom . " en utilisant l'adresse mail : " .$mail. "</h4><br>";
                    echo "<h4>ou l'étudiant  " . $nom1 . " en utilisant l'adresse mail : " .$mail1. "</h4><br>";

                
                ?>
            </div>
        <iframe src="<?php echo BASE_URL . DS . 'docs' . DS . $doc ?>" width="700px" height="600px" />
        </div>