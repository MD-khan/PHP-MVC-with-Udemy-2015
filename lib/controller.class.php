<?php

class Controller {
    
    protected $data;
    protected $model;
    protected $params;
    
    /**
     * 
     * @return type
     */
    public function getData()
    {
        return $this->data;
    }
    
    
    /**
     * 
     * @return type
     */
    public function getModel()
    {
        return $this->model;
    }
    
    
    /**
     * 
     * @return type
     */
    public function getParams()
    {
        return $this->params;
    }
    
    public function __construct( $data = array()) 
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }
    
    
    
}
 