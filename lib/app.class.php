<?php

class App {

    protected static $router;
    
   /**
    * 
    * @return type
    */ 
    public static function getRouter()
    {
        return self::$router;
    }
    
    
    public static function run( $uri)
    {
        self::$router = new Router( $uri );
        
        // geting controller, method, params from controller class
        $controler_class = ucfirst(self::$router->getController()).'Controller';
        
        $controler_method = strtolower( self::$router->getMethodPrefix().self::$router->getAction());
        
        
        // calling controller method
        $controller_object = new $controler_class();
        
        if( method_exists($controller_object, $controler_method)) {
            
            // Controller action may return a view path
            
            $view_path = $controller_object->$controler_method();
            
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
            
        } else {
            throw new Exception('Method ' . $controler_method. ' of class ' . $controler_class. ' does not exist');
        }
        
        
        $layout = self::$router->getRoute();
        
        $layout_path = VIEWS_PATH.DS.$layout.'.php';
        
        $layout_view_object = new View( compact('content'), $layout_path);
              
        echo $layout_view_object->render();
    }
            
        
}