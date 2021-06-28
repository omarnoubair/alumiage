<?php

class UserController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($p) {
        if ($this->session->checkLogin()) {
            $userModel = $this->loadModel("actualites"); // nom  de la classe course
            $allactu = $userModel->query('SELECT * FROM actualites ORDER BY id  DESC LIMIT ' . $p * 4 . ',' . 4);
            $allactu2 = $userModel->query('SELECT * FROM `actualites`');
            $this->view->set("allactu", $allactu);
            $this->view->set("allactu2", $allactu2);
            $this->view->render('user' . DS . 'index', true, true);
        } else {
            $this->redirect(''); // stay on the same page
        }
    }

    public function login() {
        if (!$this->session->checkLogin()) {

            $this->view->render('user' . DS . 'login');
        } else {
            $this->view->render('user' . DS . 'index', true, true);
        }
    }

    public function Ancien() {
        $userModel = $this->loadModel("user"); // nom  de la classe course
        $allancien = $userModel->query('SELECT id, nom, prenom, mail FROM users WHERE role = 3');
        $this->view->set("allancien", $allancien);

        $this->view->render('annuaire' . DS . 'ancien', true, true); // index c'est une vue
    }

    public function Professeur() {
        $userModel = $this->loadModel("user"); // nom  de la classe course
        $allprof = $userModel->query('SELECT id, nom, prenom, mail FROM users WHERE role = 1');
        $this->view->set("allprof", $allprof);

        $this->view->render('annuaire' . DS . 'professeur', true, true);
    }

    public function Entreprise() {
        $userModel = $this->loadModel("user"); // nom  de la classe course
        $allentreprise = $userModel->query('SELECT id_ste, nom_ste, pays, adr, mail, responsable_mail FROM entreprise ');
        $this->view->set("allentreprise", $allentreprise);

        $this->view->render('annuaire' . DS . 'entreprise', true, true);
    }

    public function loginAction() {

        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $userModel = $this->loadModel('user');


            $obj = $userModel->findFirst(array(
                'fields' => 'users.id as id, users.pseudo as pseudo,users.password as password,users.role as role',
                'conditions' => array("users.mail" => strtolower($_POST['email']), "users.password" => md5($_POST['password']))
            ));

            if (!empty($obj)) {

                $this->session->write("user", $obj);
                $this->redirect("user/index/0");
            }
        }
        $this->session->setNotification("Nom d'utilisateur ou mot de passe incorrect", "danger");
        //$this->redirect("user/login"); // rediriger vers une autre page de login
        $this->redirect(''); // rester dans la même page
    }

    public function logoutAction() {
        $this->session->delete('user');
        $this->redirect('');
    }

    public function register() {
        if (!$this->session->checkLogin()) {
            $this->view->render('user' . DS . 'register');
        } else {


            $this->view->render('user' . DS . 'index', true, true);
        }
    }

    public function ajaxCheckEmail() {
        $userModel = $this->loadModel('user');
        $result = $userModel->findFirst(array('fields' => 'users.id as id', 'conditions' => array("users.mail" => strtolower($_REQUEST['email']))));
        if (!empty($result)) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function registerAction() {
        print_r($_POST);
        if (isset($_POST['submit'])) {

            $firstname = !empty($_POST['firstname']) ? strtolower($_POST['firstname']) : $error[] = true;
            $lastname = !empty($_POST['lastname']) ? strtolower($_POST['lastname']) : $error[] = true;
            $email = !empty($_POST['email']) ? strtolower($_POST['email']) : $error[] = true;
            $password = !empty($_POST['password']) ? md5($_POST['password']) : $error[] = true;
            $pseudo = !empty($_POST['pseudo']) ? strtolower($_POST['pseudo']) : $error[] = true;
            $role = $_POST['role'];

            $promo = !empty($_POST['promo']) ? $_POST['promo'] : NULL;

            $userModel = $this->loadModel('user');

            $checkEmail = $userModel->findFirst(array('fields' => 'users.id as id', 'conditions' => array("users.mail" => $email)));
            $error[] = !empty($checkEmail) ? true : false; // if chckemail not empty so error = true

            if (!in_array(true, $error) && isset($_POST['nobot'])) {

                $userModel->save(array("id" => NULL, "role" => $role, "pseudo" => $pseudo, "password" => $password, "nom" => $lastname,
                    "prenom" => $firstname, "mail" => $email, "tel" => "", "photo" => "", "promo" => $promo
                ));

                $this->session->setNotification("Votre compte à été bien crée", "success");
                $this->redirect("user/login");
                $to = $email;
                $subject = 'Bienvenu';
                $message = 'Bonjour !';

                mail($to, $subject, $message, null,'maous.marouane@gmail.com');
            }
        }
        $this->session->setNotification("Une ou plusieurs erreurs sont survenues lors de la création de votre compte", "danger");
        $this->redirect('');
    }

    public function monEspace($id) {
        $UserModel = $this->loadModel('user'); // charger le model
        $user = $UserModel->query("select * from users where users.id =" . $id . "");
        $this->view->set("user", $user);
        $this->view->render('user' . DS . 'MySpace', true, true);
    }

    public function profil($id) {
        $UserModel = $this->loadModel('user');
        $ParcoursModel = $this->loadModel('parcour');
        $user = $UserModel->query("select * from users where id =" . $id . "");
        $parcours = $ParcoursModel->query("select * from parcours,labels where parcours.type = labels.id_label AND id_user =" . $id . " ORDER BY debut DESC");
        $this->view->set("user", $user);
        $this->view->set("parcours", $parcours);
        $this->view->render('user' . DS . 'profil', true, true);
    }

    public function monEspaceModif($id) {

        $UserModel = $this->loadModel('user'); // charger le model
        $user = $UserModel->query("select * from users where users.id =" . $id . "");
        $this->view->set("user", $user);
        $this->view->render('user' . DS . 'MySpaceModif', true, true);
    }

    public function monEspaceModifAction($id) {
        if (isset($_POST['submit'])) {
            $role = $_POST['role'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pseudo = $_POST['pseudo'];
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            $promo = $_POST['promo'];

            $location = WEBROOT . DS . 'docs' . DS;
            $name = $_FILES['photo']['name'];
            $tmp = $_FILES['photo']['tmp_name'];

            move_uploaded_file($tmp, $location . $name);

            //$req = 'UPDATE categories as c SET c.categorie ="' . $newCat . '" WHERE c.id =' . $id;
            if ($name == NULL)
                $req = 'UPDATE users SET users.nom ="' . $nom . '" , users.prenom = "' . $prenom . '", users.pseudo ="' . $pseudo . '"  ,users.mail ="' . $mail . '" , users.tel ="' . $tel . '"  ,users.promo ="' . $promo . '" WHERE users.id =' . $id;
            else
                $req = 'UPDATE users SET users.nom ="' . $nom . '" , users.prenom = "' . $prenom . '", users.pseudo ="' . $pseudo . '"  ,users.mail ="' . $mail . '" , users.tel ="' . $tel . '"  ,users.photo ="' . $name . '"  ,users.promo ="' . $promo . '" WHERE users.id =' . $id;
            $UserModel = $this->loadModel("user");
            $UserModel->query2($req);

            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            //$this->view->render('administration' . DS . 'manageCategories', true, true);
            $this->redirect('user/monEspace/' . $id);
            //  echo $req;
        } else
            echo "Erreur post";
    }

    public function ChangePassword($id) {
        $this->view->render('user/changepswd', true, true);
    }

    public function ChangePasswordAction($id) {
        if (isset($_POST['changeOk'])) {
            $pA = md5($_POST['passwordA']);
            $p = $_POST['password'];
            $pC = $_POST['passwordC'];
            //md5
            $UserModel = $this->loadModel("user");
            $obj = $UserModel->findFirst(array(
                'fields' => 'users.id as id,users.password as password',
                'conditions' => array("users.id" => $id, "users.password" => $pA)
            ));
            // echo $obj;
            if (!empty($obj)) {
                if ($p = $pC) {
                    $req = 'UPDATE users SET users.password ="' . md5($p) . '"WHERE users.id =' . $id;
                    $UserModel->query2($req);
                    $this->session->setNotification("Votre mot de passe a été modifié", "success");

                    $this->redirect('user/monEspace/' . $id);
                }
            }
        }
    }

}
