<?php

class SetupController extends Controller {
  
    public function __construct() {
        parent::__construct();
        $this->view = new view();
    }
    public function index() {
        if(!file_exists(ROOT.DS.'configuration'.DS.'conf.ini')){
       // echo ("test");
         $this->view->render('setup' . DS . 'index',false,false,true);
        
        }else{
            $this->redirect("error/error404");
        }
    }
     public function install() {
        if(!file_exists(ROOT.DS.'configuration'.DS.'conf.ini')){
        
          $this->view->render('setup' . DS . 'install',false,false,true);
        
        }else{
            $this->redirect("error/error404");
        }
    }
    public function installAction() {
        if(!file_exists(ROOT.DS.'configuration'.DS.'conf.ini')){
            
        if(empty($_POST["base"])){
            $error=true;
        }
         if(empty($_POST["user"])){
             $error=true;
        }
         if(empty($_POST["host"])){
             $error=true;
        }
        if(empty($_POST["adminPass"])){
             $error=true;
        }
         if(empty($_POST["adminUser"])){
             $error=true;
        }
            
        if(isset($error)){
           $this->session->setNotification("Veuillez remplir tous les champs","warning");
            $this->redirect("setup/install");
        }
          
        try {
            $pdo = new PDO(
                'mysql:host='.$_POST['host'].';dbname='.$_POST['base'].';',
                $_POST['user'],
                $_POST['pass'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
$database = array(
                'database' => array(
                    'host' => $_POST['host'],
                    'user' => $_POST['user'],
                    'password' => $_POST['pass'],
                    'base' => $_POST['base'],
                  
                ));
               

$s = $this->write_ini_file($database, ROOT.DS.'configuration'.DS.'conf.ini', true,true);
            //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$this->createTables($pdo,true);
  Model::$connection=$pdo;
$userModel = $this->loadModel("user");


/*populating the table*/
//creating admin
$sql='INSERT INTO `users` (`id`, `role`, `pseudo`, `password`, `nom`, `prenom`, `mail`, `tel`, `photo`) VALUES(1,0,"admin","'.md5($_POST['adminPass']).'","admin","admin","'.$_POST['adminUser'].'","","")';

$userModel->query($sql);
 
   $this->session->setNotification("L'installation a été effectuée avec succès<br>Veuillez vous connecter à votre compte","success");
         $this->redirect("user/index/0");  
            
        } catch (PDOException $e) {
            $this->session->setNotification("Impossible de se connecter à la base de données.<br>Veuillez vérifier que la base existe et que les informations saisie sont valide","warning");
               $this->redirect("setup/install");     
            }
      
        
        }else{
            $this->redirect("error/error404");
        }
        
    }
   private function write_ini_file($assoc_arr, $path, $has_sections=FALSE,$innerCall=false) { 
       if($innerCall){
    $content = ""; 
    if ($has_sections) { 
        foreach ($assoc_arr as $key=>$elem) { 
            $content .= "[".$key."]\n"; 
            foreach ($elem as $key2=>$elem2) { 
                if(is_array($elem2)) 
                { 
                    for($i=0;$i<count($elem2);$i++) 
                    { 
                        $content .= $key2."[] = \"".$elem2[$i]."\"\n"; 
                    } 
                } 
                else if($elem2=="") $content .= $key2." = \n"; 
                else $content .= $key2." = \"".$elem2."\"\n"; 
            } 
        } 
    } 
    else { 
        foreach ($assoc_arr as $key=>$elem) { 
            if(is_array($elem)) 
            { 
                for($i=0;$i<count($elem);$i++) 
                { 
                    $content .= $key."[] = \"".$elem[$i]."\"\n"; 
                } 
            } 
            else if($elem=="") $content .= $key." = \n"; 
            else $content .= $key." = \"".$elem."\"\n"; 
        } 
    } 

    if (!$handle = fopen($path, 'w')) { 
        return false; 
    }

    $success = fwrite($handle, $content);
    fclose($handle); 

    return $success; 
       }else{
            $this->redirect("error/error404");
       }
}

private function createTables($pdo,$innerCall=false){
    if($innerCall){
    $sql="

CREATE TABLE IF NOT EXISTS `actualites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_ste` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ste` varchar(100) DEFAULT NULL,
  `adr` varchar(100) DEFAULT NULL,
  `codep` int(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `siteweb` varchar(100) DEFAULT NULL,
  `responsable_mail` varchar(100) DEFAULT NULL,
  `responsable_tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `labels` (
  `id_label` int(11) NOT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `labels` (`id_label`, `label`) VALUES
(0, 'Admins'),
(1, 'Professeurs'),
(2, 'MMA'),
(3, 'Anciens'),
(4, 'Etudiants'),
(5, 'Stage'),
(6, 'CDD'),
(7, 'CDI'),
(8, 'Alternance'),
(9, 'Emploi');

CREATE TABLE IF NOT EXISTS `offres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `mission` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `salaire` int(11) NOT NULL,
  `entreprise` int(11) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `masque` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `sujet` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `promo` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
 
    try {
        $pdo->exec($sql);
       return true;
    }catch (PDOException $e) {
            return false;
 }
 
    }else{
         $this->redirect("error/error404");
    }
}





}
