<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dispatcher
 *
 * @author Master
 */
class Dispatcher {

    //put your code here
    function    __construct($setup= false) {

        //if $setup = false the app is already installed
        if(!$setup){
         
        $url = isset($_GET['url']) ? explode('/', $_GET['url']) : null;
        //print_r($url); 0 controller, 1 method, autres :paramèttres
           require_once CONTROLLERS . DS . 'ErrorController.php';
        if (empty($url[0])) { // first param url
            require CONTROLLERS . DS . 'IndexController.php';
          
            $controller = new IndexController();
            $controller->index();
        } else {
            
            $controllerName = ucfirst(strtolower($url[0])) . 'Controller';

        

            if (file_exists(CONTROLLERS . DS . $controllerName . '.php')) {
                require_once CONTROLLERS . DS . $controllerName . '.php';
                $controller = new $controllerName;
                if (isset($url[2])) {
                    if (method_exists($controller, $url[1])) {
                        $controller->{$url[1]}($url[2]);
                    } else {
                       $controller = new ErrorController();
                             $controller->error404();
                    }
                } else {
                    if (isset($url[1])) {
                        if (method_exists($controller, $url[1])) {
                          
                            $controller->{$url[1]}();
                        } else {
                           $controller = new ErrorController();
                             $controller->error404();
                        }
                    }else{
                         $controller->index();
                    }
                }
            } else {
             
                $controller = new ErrorController();
                $controller->error404();
            }
        }
    }else{
        require_once CONTROLLERS . DS . 'SetupController.php';
          $controller = new SetupController();
          $url = isset($_GET['url']) ? explode('/', $_GET['url']) : null;
          if (isset($url[1])) {
                        if (method_exists($controller, $url[1])) {
                          
                            $controller->{$url[1]}();
                        } else {
                          
                             $controller->index();
                        }
              }else{
                   $controller->index();
              }
          
         
          
        
    }
    
    }

}

?>
