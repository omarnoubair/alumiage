<?php

class ActualitesController extends controller {

    public function __construct() {
        parent::__construct();
        $this->view = new view();
    }

    public function createActu() {
        $this->view->render('actualites' . DS . 'createActu', true, true);
    }

    public function AllActu() {

        $enventModel = $this->loadModel("actualites"); // nom  de la classe course
        $allevent = $enventModel->query('SELECT * FROM actualites');
        $this->view->set("allevent", $allevent);
        $this->view->render('actualites' . DS . 'editActu', true, true);
    }

    public function DeleteActu($id) {
        if ($this->session->checkAdmin()) {
            $eventModel = $this->loadModel("actualites");
            $req = "DELETE FROM `ancien`.`actualites` WHERE `actualites`.`id` =" . $id;
            $event = $eventModel->query2($req);
            $this->AllActu();
        } else {
            $this->redirect("error/error403");
        }
    }

    public function detail($id) {
        if ($this->session->checkLogin()) {
            $evenementModel = $this->loadModel("actualites");
            $req = "SELECT * FROM actualites WHERE id = " . $id . ";";
            $actu = $evenementModel->query($req);

            $this->view->set("actu", $actu);
            $this->view->render('actualites' . DS . 'details', true, true);
        } else {

            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function createActuAction() {
        if ($this->session->checkLogin()) {
                $location = WEBROOT. DS.'docs' . DS;
            $evenementModel = $this->loadModel("evenement");
            $name = $_FILES['document']['name'];
            $tmp = $_FILES['document']['tmp_name'];

            move_uploaded_file($tmp, $location . $name);
            $titre = $_POST['titre'];
            $desc2=$_POST['description'];
            $titre=str_replace("'","",$titre);
            $titre=str_replace("\"","",$titre);
            $desc2=str_replace("'","",$desc2);
            $desc2=str_replace("\"","",$desc2);
            
            $evenementModel = $this->loadModel("actualites");
            $req = "INSERT INTO actualites (`id`, `titre`, `desc`, `image`) VALUES (NULL, '" . $titre . "', '" . $desc2 . "', '" . $name . "');";
            $evenementModel->query2($req);
            $this->AllActu();
        } else {

            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function ModifActu($id) {
        if ($this->session->checkLogin()) {
            $eventModel = $this->loadModel('actualites');
            $sql = "SELECT `id`,`titre`,`desc`,`image` FROM `actualites` WHERE id = " . $id;
            $event = $eventModel->query($sql);
            $this->view->set("event", $event);
            $this->view->render('actualites' . DS . 'modifActu', true, true);
        } else {
            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function ModifActuAction($id) {
        if ($this->session->checkLogin()) {
            $eventModel = $this->loadModel('actualites');
            $sql = "UPDATE `actualites` SET `titre`= '" . $_POST['titre'] . "',`desc`='" . $_POST['description'] . "',`image`='" . $_POST['document'] . "' WHERE id = " . $id;
            $event = $eventModel->query2($sql);
            $this->view->set("event", $event);
            $this->AllActu();
        } else {
            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    // prof
}
