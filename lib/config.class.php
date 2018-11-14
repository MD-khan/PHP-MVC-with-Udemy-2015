<?php
class Config {
    
    protected static $settings = array();
    
    /*
     * Get key 
     */
    public static function get( $key )
    {
        return  isset( self::$settings[$key]) ?  self::$settings[$key] : null;        
    }
    
    /**
     * set key and values
     */
    
    public static function set( $key, $value ) 
    {
        self::$settings[$key] = $value;
    }
   
}