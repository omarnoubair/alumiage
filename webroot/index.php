<?php
define('DS', DIRECTORY_SEPARATOR); 
define('WEBROOT', dirname(__FILE__)); 
define('ROOT', dirname(WEBROOT));
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('CONFIGURATION',ROOT.DS.'configuration');
define('CONTROLLERS', ROOT.DS.'controllers');
define('INCLUDES', ROOT.DS.'includes');
define('MODELS', ROOT.DS.'models');
define('LIBS', ROOT.DS.'libs');
define('VIEWS', ROOT.DS.'views');
define('INSTALL',BASE_URL.DS.'install');
define('CSS', BASE_URL.'/'.'webroot'.'/'.'css');
define('IMG', BASE_URL.'/'.'webroot'.'/'.'images');
define('JS', BASE_URL.'/'.'webroot'.'/'.'js');

require LIBS.DS.'Configuration.php';
require LIBS.DS.'Dispatcher.php';
require LIBS.DS.'Controller.php';
require LIBS.DS.'View.php';
require LIBS.DS.'Model.php';
require LIBS.DS.'Session.php';

if(file_exists(ROOT.DS.'configuration'.DS.'conf.ini')){
      $dipatcher = new Dispatcher();
}else{
    $dipatcher = new Dispatcher(true);
}


?>





