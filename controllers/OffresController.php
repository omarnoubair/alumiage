<?php

class OffresController extends controller {

    public function __construct() {
        parent::__construct();
        $this->view = new view();
    }

    public function select($id) {
        $OffresModel = $this->loadModel('offres'); // charger le model
        $allstage = $OffresModel->query('SELECT off.id as id,off.titre as titre, u.id as uti ,u.mail as mail , off.mission as pdf, lab.label as type FROM users as u, labels as lab, offres as off  WHERE off.type = lab.id_label and off.id_user = u.id and off.type = ' . $id);
        $this->view->set("allstage", $allstage);
        if ($id == 9) {
            $this->view->render('offre' . DS . 'Emploi', true, true);
        }
        if ($id == 8) {
            $this->view->render('offre' . DS . 'Alternance', true, true);
        }
        if ($id == 5) {
            $this->view->render('offre' . DS . 'Stage', true, true);
        }
    }

    public function add($id) {

        $OffresModel = $this->loadModel('offres'); // charger le model
        $type = $OffresModel->query('SELECT * FROM labels WHERE id_label = ' . $id);
        $etudiant = $OffresModel->query('SELECT * FROM users WHERE role = 4');
        $this->view->set("type", $type);
        $this->view->set("etudiant", $etudiant);
        $this->view->render('offre' . DS . 'Form', true, true);
    }
   public function addp() {

        $OffresModel = $this->loadModel('offres'); // charger le model
        $etudiant = $OffresModel->query('SELECT * FROM users WHERE role = 4');
        $this->view->set("etudiant", $etudiant);
        $this->view->render('offre' . DS . 'Formp', true, true);
    }
    public function Modif($id) {
        
    }

    public function Delete($id) {
        $OffresModel = $this->loadModel('offres'); // charger le model
        $type = $OffresModel->query('SELECT * FROM offres WHERE id = ' . $id);
        $ty;
        foreach ($type as $t ){
            $ty = $t->type;
        }
        $OffresModel->query('DELETE FROM offres WHERE id = ' . $id);
         $this->select($type);
        
    }
 

    public function detail($id) {
        $OffresModel = $this->loadModel('offres'); // charger le model
        $showoffre = $OffresModel->query('SELECT off.titre as titre, u.nom as nom ,u.prenom as prenom ,u.mail as mail , off.mission as docs, lab.label as type FROM users as u, labels as lab, offres as off  WHERE off.type = lab.id_label and off.id_user = u.id and off.id = ' . $id);
        $this->view->set("showoffre", $showoffre);
        
        $this->view->render('offre' . DS . 'Detail', true, true);
    }
           public function projet() {
        $OffresModel = $this->loadModel('offres'); // charger le model
        $allstage = $OffresModel->query('SELECT stud.mail as mailst,stud.nom as nom1,stud.prenom as prenom1, prof.mail as mail,prof.id as uti,prof.nom as nom,prof.prenom as prenom, p.desc as file,p.sujet as sujet,p.id as id from projets as p, users as prof, users as stud where prof.id = p.id_prof and stud.id = p.id_etudiant ');
        $this->view->set("allstage", $allstage);
            $this->view->render('offre' . DS . 'Projet', true, true);
        
    }
    public function detailp() {
        $OffresModel = $this->loadModel('offres'); // charger le model
        $showoffre = $OffresModel->query('SELECT stud.mail as mailst,stud.nom as nom1,stud.prenom as prenom1, prof.mail as mail,prof.nom as nom,prof.prenom as prenom, p.desc as file, p.sujet as sujet from projets as p, users as prof, users as stud where prof.id = p.id_prof and stud.id = p.id_etudiant and p.id = 10' );
        $this->view->set("showoffre", $showoffre);
        
        $this->view->render('offre' . DS . 'Detailp', true, true);
    }

    public function addaction($id) {
        $titre = $_POST['titre'];
        $type = $_POST['type'];

        $location = WEBROOT . DS . 'docs' . DS;
        $name = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        move_uploaded_file($tmp, $location . $name);
        $OffresModel = $this->loadModel('offres'); // charger le model
        $req = 'INSERT INTO `offres`(`id`, `id_user`, `type`, `titre`, `mission`) VALUES (NULL,' . $id . ' ,' . $type . ', "' . $titre . '", "' . $name . '");';
        
        $OffresModel = $OffresModel->query2($req);
         $this->select($type);
    }
        public function addactionp($id) {
        $titre = $_POST['titre'];
        $std = $_POST['std'];

        $location = WEBROOT . DS . 'docs' . DS;
        $name = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        move_uploaded_file($tmp, $location . $name);
        $OffresModel = $this->loadModel('offres'); // charger le model
        $req = 'INSERT INTO `projets`(`id`, `id_prof`, `id_etudiant`, `desc`, `sujet`) VALUES (NULL,' . $id . ' ,' . $std . ', "' . $titre . '", "' . $name . '");';
        
        $OffresModel = $OffresModel->query2($req);
         $this->projet();
    }

}
