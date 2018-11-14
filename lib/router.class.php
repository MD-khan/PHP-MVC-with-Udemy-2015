<?php

class Router {
    
    protected $uri;
    
    protected $controller;
    
    protected $action;
    
    protected $params;
    
    protected $route;
    
    protected $method_prefix;
    
    protected $language;


    /**
    * @return mixed 
    */
    public function getUri()
    {
        return $this->uri;
    }
    
    
    /**
    * @return mixed 
    */
    public function getController()
    {
        return $this->controller;
    }
    
    /**
     * @return mixed 
    */
    public function getAction()
    {
        return $this->action;
    }
    
         
    /**
   * @return mixed 
   */
    public function getParams()
    {
        return $this->params;
    }
    
    
    /**
     * 
     * @return  Description
     */
    
    public function getRoute()
    {
        return $this->route;
    }
    
    /**
     * 
     * @param type $uri
     */
    
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }
    
    
    /**
     * 
     * @param type $uri
     */
    
    public function getLanguage()
    {
        return $this->language;
    }
            
        
    
    function __construct( $uri )
    {
        $this->uri = urldecode( trim( $uri, '/') );
        
        // Get Default
        $routes = Config::get('routes');
        
        $this->route = Config::get( 'default_route' );        
        $this->method_prefix = isset( $routes[$this->route] ) ? $routes[$this->route] : '';        
        $this->language = Config::get( 'default_language' );
        $this->controller = Config::get( 'default_controller' );
        $this->action  = Config::get('default_action');
        
        
        $uri_parts = explode('?', $this->uri );
        
        // Get Path like /lng/controller/action/param1/param2/.../.../
        $path = $uri_parts[0];
        
        $path_parts = explode('/', $path );
                
        /*
         * echo '<pre>';
         *    print_r($path_parts);
         * Out put
         * Array (
                [0] => mvc
                [1] => controller
                [2] => action
                [3] => param1
                 [4] => param2
                )
         */
        
        if ( count( $path_parts)){
            
            
             array_shift($path_parts); // remove mvc
            
            //Get route or language at first element
            if (in_array(strtolower(current($path_parts)), array_keys( $routes ))){
                $this->route = strtolower( current($path_parts));
                $this->method_prefix = isset( $routes[$this->route] ) ? $routes[$this->route] : '';
                 array_shift($path_parts); // remove mvc
                            
            } else if(in_array(strtolower(current($path_parts)), Config::get('languages'))){
              // default language English
                $this->language = strtolower(current( $path_parts));
                array_shift($path_parts);
            }
            
            //Get Controller - next element of array
            if (current( $path_parts)){
                $this->controller = strtolower(current($path_parts));
                array_shift( $path_parts);
            }
            
            // Get Action
            if(current( $path_parts)){
                $this->action = strtolower( current( $path_parts));
                array_shift($path_parts);
            }
            
            // Get params
            $this->params = $path_parts;
        }
    }
}