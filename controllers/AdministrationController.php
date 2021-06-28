<?php

class AdministrationController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->checkAdmin()) {
            $this->view->render('administration' . DS . 'index', true, true); // index c'est une vue
        } else {
            $this->redirect('');
        }
    }

    public function manageMMA() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('user'); // charger le model
            $MMAList = $UserModel->find(array(
                'fields' => 'users.id, users.role , users.nom ,users.password ,users.prenom , users.mail, users.tel',
                'conditions' => array("users.role" => 2)));
            
            $this->view->set("MMAList", $MMAList);


            $this->view->render('administration' . DS . 'MMAList', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function stats() {

        if ($this->session->checkAdmin()) {
            
            $this->view->render('administration' . DS . 'Stats', true, true);
            
        } else {
            $this->redirect("error/error403");
        }
    }

    public function manageProfs() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('user'); // charger le model
            $ProfesseurList = $UserModel->find(array(
                'fields' => 'users.id, users.role , users.nom ,users.password ,users.prenom , users.mail, users.tel',
                'conditions' => array("users.role" => 1)));
            
            $this->view->set("ProfesseurList", $ProfesseurList);


            $this->view->render('administration' . DS . 'ProfesseurList', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }

    public function ListReports() {
        if ($this->session->checkAdmin()) {
            $ReportModel = $this->loadModel('report'); // charger le model
            $CoursesList = $ReportModel->query("SELECT courses.id as id ,courses.titre as Titre , users.nom as Nom,"
                    . " count(Reports.idcourse ) as nombre FROM `users`,`reports`,`courses` where courses.id ="
                    . " reports.idcourse and courses.idprof = users.id group by Reports.idcourse having nombre>1");
            $this->view->set("CoursesList", $CoursesList);
            $this->view->render('administration' . DS . 'ReportList', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }

    public function addProf() {
        //$this->view->render('administration' . DS . 'addProf', true, true);
        if ($this->session->checkAdmin()) {
            $this->view->render('administration' . DS . 'addProf', true, true);
        } else {
            $this->redirect('');
        }
    }

    public function addProfAction() {
        //print_r($_POST);
        if (isset($_POST['ValiderBtn'])) {
            $last_name = !empty($_POST['NomText']) ? strtolower($_POST['NomText']) : $error[] = true . 'nom';

            $userModel = $this->loadModel('user');
            $first_name = !empty($_POST['PrenomText']) ? strtolower($_POST['PrenomText']) : $error[] = true . 'Fnom';
            $pseudo = !empty($_POST['PseudoText']) ? strtolower($_POST['PseudoText']) : $error[] = true . "pseudo";
            $email = !empty($_POST['EmailText']) ? strtolower($_POST['EmailText']) : $error[] = true . 'noddm';
            $pass = $this->generateRandomString();

            print_r($pass);
            $password = md5($pass); // changer apres 
            $telephone = !empty($_POST['telephoneText']) ? strtolower($_POST['telephoneText']) : $error[] = true . 'nosssm';
            $photo = $_POST['Photo'];
            $checkEmail = $userModel->find(array('fields' => 'users.id', 'conditions' => array("users.mail" => $email)));
            print_r($checkEmail);
            $error[] = !empty($checkEmail) ? true : false;
            print_r($error);
            if (!in_array(true, $error)) {

                $userModel->save(array("id" => NULL, "role" => 2, "pseudo" => $pseudo, "password" => $password, "nom" => $last_name, "prenom" => $first_name, "mail" => $email, "tel" => $telephone, "photo" => $photo));
                $this->sendMail($email, $pass);
                $this->session->setNotification("Le compte est bien créer", "success");
                $this->redirect("administration/manageProfs");
                //$this->view->render('administration' . DS . 'manageProfs', true, true);
            }
        }
        // $this->session->setNotification("Une ou plusieurs erreurs sont survenues lors de la cr�ation de votre compte","danger");
        // $this->redirect("Administration"); 
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function manageStudents() {
        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('user'); // charger le model
            $StudentList = $UserModel->find(array(
                'fields' => 'users.id,users.pseudo, users.role , users.nom ,users.password ,users.prenom , users.mail, users.tel',
                'conditions' => array("users.role" => 4)
            ));
            $this->view->set("StudentList", $StudentList);
            $this->view->render('administration' . DS . 'StudentList', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function manageAnciens() {
        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('user'); // charger le model
            $AnciensList = $UserModel->find(array(
                'fields' => 'users.id,users.pseudo, users.role , users.promo , users.nom ,users.password ,users.prenom , users.mail, users.tel',
                'conditions' => array("users.role" => 3)
            ));
            $this->view->set("AncienList", $AnciensList);
            $this->view->render('administration' . DS . 'AncienList', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }

    public function deleteUser($id) {
        if ($this->session->checkAdmin()) {
            $userModel = $this->loadModel("user");
            $users = $userModel->delete($id);
            $this->view->set("id", $id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("administration/manageStudents");
        } else {
            $this->redirect("error/error403");
        }
    }

    public function deleteProf($id) {
        if ($this->session->checkAdmin()) {
            $userModel = $this->loadModel("user");
            $users = $userModel->delete($id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("administration/manageProfs");
        } else {
            $this->redirect("error/error403");
        }
    }

    public function deleteAncien($id) {
        if ($this->session->checkAdmin()) {
            $userModel = $this->loadModel("user");
            $users = $userModel->delete($id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("administration/manageAncien");
        } else {
            $this->redirect("error/error403");
        }
    }
    public function deleteMMA($id) {
        if ($this->session->checkAdmin()) {
            $userModel = $this->loadModel("user");
            $users = $userModel->delete($id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("administration/manageMMA");
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function deleteCourse($id) {
        if ($this->session->checkAdmin()) {

            $CourseModel = $this->loadModel("course");
            $course = $CourseModel->delete($id);
            $req = "delete from reports where idcourse = " . $id;
            $CourseModel->query($req);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("Administration/ListReports");
        } else {
            $this->redirect("error/error403");
        }
    }

    public function deleteCategorie($id) {
        if ($this->session->checkAdmin()) {
            $CategorieModel = $this->loadModel("categorie");
            $categorie = $CategorieModel->delete($id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("Administration/manageCategories");
        } else {
            $this->redirect("error/error403");
        }
    }

    public function addCategorie() {
        $this->view->render('administration' . DS . 'addCategorie', true, true);
    }

    public function addCategorieAction() {
        if ($this->session->checkAdmin()) {
            $categorieModel = $this->loadModel("categorie");
            $categorie = strtolower($_POST['cat']);

            $categorieModel->save(array("id" => NULL, "categorie" => $categorie));
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect('Administration' . DS . 'manageCategories');
        } else {
            $this->redirect("error/error403");
        }
    }

    public function modCategorie($id) {
        if ($this->session->checkAdmin()) {
            $categorieModel = $this->loadModel("categorie");
            $categories = $categorieModel->query("select * from categories where categories.id =" . $id . "");
            $this->view->set("maCategorie", $categories);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->view->render('administration' . DS . 'ModifCategorie', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }

    public function modCategorieAction() {
        if ($this->session->checkAdmin()) {
            $newCat = $_POST['name'];
            $id = $_POST['id'];
            $req = 'UPDATE categories as c SET c.categorie ="' . $newCat . '" WHERE c.id =' . $id;
            $categorieModel = $this->loadModel("categorie");
            $categorieModel->query2($req);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            //$this->view->render('administration' . DS . 'manageCategories', true, true);
            $this->redirect('Administration' . DS . 'manageCategories');
            echo $req;
        } else {
            $this->redirect("error/error403");
        }
    }

    public function sendMail($to, $pass) {

        $subject = 'Bienvenue sur LearnSharing';

        $message = "<h3>LearnSharing vous souhaite la bienvenue</h3><br>
            <br> Votre inscription dans LearnSharing comme Professeur a bien été enregistrée.<br>
                Pour acceder à votre compte utilisez: <br>
                Email : <bold>" . $to . "</bold> <br>Mot de passe :<bold>" . $pass . "</bold>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <learn2sharing@gmail.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
    }

}
