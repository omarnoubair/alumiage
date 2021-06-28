<?php
// chaque methode de sous controlleur represente une vue dans la plupart de temps
class Controller {
    protected $session;
    protected $view;
    public function __construct() {
        $this->session = new Session(); 
        $this->view = new View();
    }

  

    function redirect($url) {

        header("Location:" . BASE_URL . "/" . $url);
        die();
    }

    public function loadModel($name) {

        $file = MODELS . DS . ucfirst(strtolower($name)) . 'Model.php';
        //echo $file . '<br>';
        require_once($file);
        $model = $name . 'Model';
        //echo $model . '<br>';
        return new $model();
    }

}

