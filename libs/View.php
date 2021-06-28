<?php

class View {

    private $title;
    private $vars;
    private $session;

    function __construct() {
        $this->session = new Session();
    }
    //render (créer la vue): param1: nom de vue, param2 : verifier si user est connecté ou non, param3 : menu déroulant
    //param4 : no include des fichier header
    public function render($viewName, $loged = false, $includeSideBar = false, $noIncludes = false) {
        if (isset($this->vars)) {
            extract($this->vars);
        }
        if (!$noIncludes) {
            require INCLUDES . DS . 'header.php';
        }
        if (!$loged) {
            if (!$noIncludes) {
                require INCLUDES . DS . 'default-navbar.php';
            }
        } else {
            if (!$noIncludes) {
                require INCLUDES . DS . 'user-navbar.php';
            }
            if ($includeSideBar) {

                require INCLUDES . DS . 'user-sidebar.php';
            }
        }
        require VIEWS . DS . $viewName . '.php';
        if (!$noIncludes) {
            require INCLUDES . DS . 'footer.php';
        }
    }

    public function renderView($viewName){
        if (isset($this->vars)) {
            extract($this->vars);
        }
        require VIEWS . DS . $viewName . '.php';
    }
    
    public function set($key, $value = null) {
        if (is_array($key)) {
            $this->vars = $key;
        } else {
            $this->vars[$key] = $value;
        }
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

}

?>
