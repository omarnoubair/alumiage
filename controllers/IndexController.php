
<?php

class IndexController extends Controller {
   
     public function __construct()
        {
        parent::__construct();
        //$this->view = new view();
       }
    
    public function index() {
        
        if(!$this->session->checkAdmin()){
        $this->view->setTitle("Learn Sharing");
     
        $this->view->render('home' . DS . 'index');
          }else{
              //echo "admin";
             $this->redirect('user/index');
          }
      
    }

}