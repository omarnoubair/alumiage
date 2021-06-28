<?php

class EvenementController extends controller {

    public function __construct() {
        parent::__construct();
        $this->view = new view();
    }

    public function createEvent() {
        $this->view->render('evenement' . DS . 'createevent', true, true);
    }

    public function Allevent() {

        $enventModel = $this->loadModel("evenement"); // nom  de la classe course
        $allevent = $enventModel->query('SELECT * FROM events');
        $this->view->set("allevent", $allevent);
        $this->view->render('evenement' . DS . 'editEvent', true, true);
    }

    public function DeleteEvent($id) {
        if ($this->session->checkAdmin()) {
            $eventModel = $this->loadModel("evenement");
            $req = "DELETE FROM `ancien`.`events` WHERE `events`.`id` =" . $id;
            $event = $eventModel->query2($req);
            $this->Allevent();
        } else {
            $this->redirect("error/error403");
        }
    }
        public function detail($id) {
        if ($this->session->checkLogin()) {
            $evenementModel = $this->loadModel("actualites");
            $req = "SELECT * FROM events WHERE id = " . $id . ";";
            $actu = $evenementModel->query($req);

            $this->view->set("actu", $actu);
            $this->view->render('evenement' . DS . 'details', true, true);
        } else {

            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function all($x){
                if ($this->session->checkLogin()) {
        $userModel = $this->loadModel("evenement"); // nom  de la classe course
        $allactu = $userModel->query('SELECT * FROM events ORDER BY id  DESC LIMIT ' . $x*4 . ',' . 4);            
        $allactu2 = $userModel->query('SELECT * FROM `events`');   
        $this->view->set("allactu", $allactu);              
        $this->view->set("allactu2", $allactu2);       
        $this->view->render('evenement' . DS . 'All', true, true);
        } else {
            $this->redirect(''); 
        }
    }

    public function createEventAction($id) {
        if ($this->session->checkLogin()) {
            $location = WEBROOT. DS. 'docs'  . DS;
            $evenementModel = $this->loadModel("evenement");
            $name = $_FILES['document']['name'];
            $tmp = $_FILES['document']['tmp_name'];
            move_uploaded_file($tmp, $location.$name);
            $req = "INSERT INTO events (`id`, `titre`, `date`, `desc`, `image`, `id_user` ) VALUES (NULL, '" . $_POST['titre'] . "', '" . stripslashes($_POST['date']) . "', '" . $_POST['description'] . "', '" . $name . "',".$id." );";
            $evenementModel->query2($req);
            $this->Allevent();
        } else {

            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function ModifEvent($id) {
        if ($this->session->checkLogin()) {
            $eventModel = $this->loadModel('evenement');
            $sql= "SELECT `id`,`titre`,`desc`,`date`,`image` FROM `events` WHERE id = " . $id ;
            $event = $eventModel->query($sql);
            $this->view->set("event", $event);
            $this->view->render('evenement' . DS . 'modifevent', true, true);
        } else {
            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }
    
    public function ModifEventAction($id) {
        if ($this->session->checkLogin()) {
            $eventModel = $this->loadModel('evenement');
            $sql= "UPDATE `events` SET `titre`= '".$_POST['titre']."',`date`='".$_POST['date']."',`desc`='".$_POST['description']."',`image`='".$_POST['document']."' WHERE id = " . $id ;
            $event = $eventModel->query2($sql);
            $this->view->set("event", $event);
            $this->Allevent();
        } else {
            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }





    // prof




}
