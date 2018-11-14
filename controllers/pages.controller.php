<?php


class PagesController extends Controller {
    
    
    public function index()
    {
        $this->data['test_content'] = "Here will be pages list";
       
    }
    
    public function view()
    {
        //$params = App::getRoute()->getParams();
       
        $params = App::getRouter()->getParams();
        //var_dump($params) ;      
        if ( isset( $params[0])){
            
            $alias = strtolower($params[0]);
            
            $this->data['content'] = 'Here will be page with '. $alias. ' alias';
            
            //echo 'Here will be page with '. $alias. ' alias';
        }
    }
            

}