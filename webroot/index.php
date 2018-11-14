<?php

define('DS', DIRECTORY_SEPARATOR );

/*
 * return 2 directories up for the current file
 * Output: C:\xampp\htdocs\mvc
 */ 
define('ROOT', dirname(dirname( __FILE__ )) ) ;

// view path
define('VIEWS_PATH', ROOT.DS.'views');


require_once ( ROOT.DS.'lib'.DS.'init.php');


App::run( $_SERVER['REQUEST_URI']  );
 
/*
$router = new Router( $_SERVER['REQUEST_URI'] );
  
   
 
echo '<pre>';
print_r('Route: '. $router->getRoute(). PHP_EOL );
print_r('Language: '. $router->getLanguage(). PHP_EOL );
print_r('Controller: '. $router->getController(). PHP_EOL );
print_r('Action to be Called: '. $router->getMethodPrefix().$router->getAction(). PHP_EOL );

echo 'Params';

print_r($router->getParams());
 * 
 */
  