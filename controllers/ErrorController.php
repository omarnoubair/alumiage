<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErrorController
 *
 * @author Master
 */
class ErrorController extends Controller {
    //put your code here
    function __construct(){
       
         parent::__construct();
        $this->view = new view();
   
    }
    function error404(){
         $this->view->setTitle("Page Introuvable");
        $this->view->render('errors' . DS . 'error404',$this->session->checkLogin());
        
   
    }
    function error403(){
         $this->view->setTitle("Accès interdit");
        $this->view->render('errors' . DS . 'error403',$this->session->checkLogin());
        
   
    }
}

?>
