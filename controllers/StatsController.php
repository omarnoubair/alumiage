<?php

class StatsController extends Controller {

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

    public function AllMembres() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query('SELECT COUNT(*) AS value, `label` AS label  FROM `users`,`labels` WHERE labels.id_label = users.role GROUP BY `role`');
            
            
            $this->view->set("pourcentage", $pourcentage);


            $this->view->render('administration' . DS . 'DonutGraph', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function pourcentagePromo() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query('SELECT COUNT(*) AS value, `promo` AS label  FROM `users` WHERE users.role=3 GROUP BY `promo`');
            
            
            $this->view->set("pourcentage", $pourcentage);


            $this->view->render('administration' . DS . 'DonutGraph', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function CountryByPromo() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query('SELECT count(*) AS value, pays AS label  FROM `users`,parcours WHERE users.id=parcours.id_user AND users.role=3 GROUP BY `pays`');
            
            
            $this->view->set("pourcentage", $pourcentage);


            $this->view->render('administration' . DS . 'DonutGraph', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function SalaryByPromo() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query('SELECT AVG(salaire) AS a, `promo` AS y  FROM `users`, `parcours` WHERE users.id = parcours.id_user GROUP BY `promo`');
            
            
            $this->view->set("pourcentage", $pourcentage);


            $this->view->render('administration' . DS . 'LineGraph', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function SalaryByCountry() {

        if ($this->session->checkAdmin()) {
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query('SELECT AVG(salaire) AS a, `pays` AS y  FROM `users`, `parcours` WHERE users.id = parcours.id_user GROUP BY `pays`');
            
            
            $this->view->set("pourcentage", $pourcentage);


            $this->view->render('administration' . DS . 'BarGraph', true, true);
        } else {
            $this->redirect("error/error403");
        }
    }
    
    public function Personnaliser() {

        if ($this->session->checkAdmin()) {

            $this->view->render('administration' . DS . 'Personnaliser', true, true);
            
        } else {
            $this->redirect("error/error403");
        }
    }

    public function PersonnaliserAction() {

        if ($this->session->checkAdmin()) {
            
            $UserModel = $this->loadModel('stats'); // charger le model
            $pourcentage = $UserModel->query($_POST['sql']);
            $this->view->set("pourcentage", $pourcentage);
            
            if($_POST['type']=='1'){
            $this->view->render('administration' . DS . 'BarGraph', true, true);}
            
            if($_POST['type']=='2'){
            $this->view->render('administration' . DS . 'LineGraph', true, true);}
            
            if($_POST['type']=='3'){
            $this->view->render('administration' . DS . 'DonutGraph', true, true);}
            
        } else {
            $this->redirect("error/error403");
        }
    }
}
?>